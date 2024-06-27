<?php

namespace Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use Modules\Dashboard\Models\Login_m;
use CodeIgniter\HTTP\Response;

// use App\Models\LoginAuthModel;
// use App\Models\UmumModel;
// use CodeIgniter\Controller;

class Login_c extends BaseController
{
    protected $loginAuthModel;
    protected $umumModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->loginAuthModel = new Login_m();
        // $this->umumModel = new UmumModel();
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        $data['msj'] = session()->getFlashdata('msj') ?? '';
        echo view('layouts/view_login', $data);
    }

    public function add()
    {
    //     $data['msj'] = session()->getFlashdata('msj') ?? '';
    //     $data['result_syarikat'] = $this->umumModel->senarai_syarikat();

    //     if ($this->request->getPost('btn_signup')) {
    //         $validation = \Config\Services::validation();

    //         $validation->setRules([
    //             'txt_idsyarikat' => 'required|trim',
    //             'txt_ID' => 'required|trim',
    //             'txt_nama' => 'required|trim',
    //             'txt_emel' => 'required|trim',
    //             'txt_katalaluan' => 'required|trim',
    //             'txt_sahkatalaluan' => 'required|matches[txt_katalaluan]'
    //         ]);

    //         if ($validation->withRequest($this->request)->run()) {
    //             $noic = $this->request->getPost('txt_ID');
    //             $password = $this->request->getPost('txt_katalaluan');
                
    //             $data_insert = [
    //                 'usr_id' => $noic,
    //                 'ms_id' => $this->request->getPost('txt_idsyarikat'),
    //                 'usr_password' => md5($password),
    //                 'usr_name' => strtoupper($this->request->getPost('txt_nama')),
    //                 'usr_email' => $this->request->getPost('txt_emel')
    //             ];

    //             // More code for processing the registration...

    //             session()->setFlashdata('msj', "Maklumat Kata Laluan Telah Berjaya Dihantar Kepada Pengguna Melalui Emel Yang Telah Didaftarkan");
    //             return redirect()->to('lupa_katalaluan');
    //         } else {
    //             $data['msj_error'] = "Maklumat Pengguna Tidak Wujud. Sila Cuba Semula";
    //         }
    //     }

    //     $data[''] = "";
    //     echo view('view_navbar_', '', TRUE);
    //     echo view('view_lupakatalaluan', $data, TRUE);
    //     echo view('view_layout', $data, FALSE);
    }

    public function auth_login()
    {
        if ($this->request->getPost('btn_submit')) {
            
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nokp' => 'required|trim',
                'katalaluan' => 'required|trim'
            ]);

            if ($this->request->getMethod() == 'post' && $this->request->getPost()) {
                $p_Pengenalan = trim($this->request->getPost('nokp'));
                $p_Katalaluan = trim($this->request->getPost('katalaluan'));
                $encryptpassword = md5($p_Katalaluan);

                $dummy_users = [
                    '890612435089'
                ];

                $dummy_passwords = ['123456'];

                if (in_array($p_Pengenalan, $dummy_users)) {
                    $key = array_search($p_Pengenalan, $dummy_users);
                    if ($dummy_passwords[$key] == $p_Katalaluan) {                        
                        return $this->authentication($p_Pengenalan);
                    }
                    else{
                        session()->setFlashdata('Mesej', "Kad Pengenalan atau Kata Laluan Yang Dimasukkan Tidak Betul. Sila cuba lagi");
                        return redirect()->to('login');
                    }
                }

                if ($validation->withRequest($this->request)->run()) {

                    // Semak Auth Staf

                        $ldapserver = "leucaena.mardi.gov.my";
                        $ldapbase = "dc=mardi, dc=gov, dc=my";
                        $username = $p_Pengenalan;
                        $password = $p_Katalaluan;
                        $userdn = '';

                        // Connect to LDAP service
                        $ldap = ldap_connect($ldapserver, 389);
                        if ($ldap === FALSE) {
                            die("Couldn't connect to LDAP service");
                        }

                        if ($ldap) {
                            // Bind as application
                            $ldapbind = ldap_bind($ldap);

                            if ($ldapbind) {
                                $query = "(&(icnumber=" . $username . ")(objectClass=person))";
                                $results = ldap_search($ldap, $ldapbase, $query);
                                $info = ldap_get_entries($ldap, $results);

                                if ($info === FALSE) {
                                    session()->setFlashdata('msj', "ID Pengenalan Atau Kata Laluan Tidak Sah");
                                    return redirect()->to('login');
                                }

                                if ((int) @$info['count'] > 0) {
                                    $userdn = $info[0]['dn'];
                                }

                                if (trim((string) $userdn) == '') {
                                    session()->setFlashdata('msj', "ID Pengenalan Atau Kata Laluan Tidak Sah");
                                    return redirect()->to('login');
                                }

                                $r = ldap_compare($ldap, $userdn, 'userPassword', $password);

                                if ($r === -1) {
                                    session()->setFlashdata('msj', "ID Pengenalan Atau Kata Laluan Tidak Sah");
                                    return redirect()->to('login');
                                } elseif ($r === true) {
                                    $noK = $info[0]["employeenumber"][0];
                                    $mail = $info[0]["mail"][0] ?? "";
                                    $cn_name = $info[0]["cn"][0];
                                    $user_id = trim($info[0]["uid"][0]);
                                    $ptj = $info[0]["ou"][0] ?? "";
                                    $stesen = $info[0]["stesen"][0] ?? "";
                                    $jawatan = $info[0]["personalTitle"][0] ?? "";
                                    $kod_program = $info[0]["Program"][0] ?? "";

                                    // Semak Kakitangan dalam t_user
                                    $result = $this->loginAuthModel->_auth_user($username);

                                    if ($result) { // Wujud dalam t_user
                                        $result_inteam = $this->loginAuthModel->_auth_inteam($noK); // Semak INTEAM

                                        if ($result_inteam) { // Staf Tetap
                                            foreach ($result_inteam as $row) {
                                                $nama = $row->nama;
                                                $emel = $row->email;
                                                $telpejabat = $row->TelPejabat;
                                                $telbimbit = $row->TelBimbit;
                                                $ptj = $row->KodPusat;
                                                $jawatan = $row->namajawatan;
                                            }

                                            $salt = substr(md5(time()), 0, 6);
                                            $data_update = [
                                                'usr_password' => md5($password . $salt),
                                                'usr_salt' => $salt,
                                                'usr_name' => $nama,
                                                'usr_email' => $mail,
                                                'usr_phone_office' => $telpejabat,
                                                'usr_phone_mobile' => $telbimbit,
                                                'usr_position' => strtoupper($jawatan),
                                                'usr_lastlogin' => date('Y-m-d H:i:s'),
                                                'nok' => $noK,
                                                'ptj' => $ptj,
                                            ];

                                            $this->loginAuthModel->_update_user($username, $data_update);
                                        } else { // Staf Kontrak
                                            $salt = substr(md5(time()), 0, 6);
                                            $data_update = [
                                                'usr_password' => md5($password . $salt),
                                                'usr_salt' => $salt,
                                                'usr_name' => $cn_name,
                                                'usr_email' => $mail,
                                                'nok' => $noK,
                                                'ptj' => $ptj,
                                                'usr_position' => $jawatan
                                            ];

                                            $this->loginAuthModel->_update_user($username, $data_update);
                                        }

                                        return $this->authentication($username);
                                    } else { // Tidak Wujud dalam t_user
                                        session()->setFlashdata('Mesej', "Anda Tidak Dibenarkan Untuk Akses Sistem Ini");
                                        return redirect()->to('login');
                                    }
                                } elseif ($r === false) { // password salah
                                    session()->setFlashdata('Mesej', "ID Pengenalan Atau Kata Laluan Tidak Sah");
                                    return redirect()->to('login');
                                }
                            } else { // if ldapbind failed
                                session()->setFlashdata('Mesej', "ID Pengenalan Atau Kata Laluan Tidak Sah");
                                return redirect()->to('login');
                            }
                        }
                    
                } else {
                    session()->setFlashdata('Mesej', "Sila Masukkan ID Pengenalan Dan Kata Laluan Anda");
                    return redirect()->to('login');
                }
            }
        }
    }

    public function authentication($no_ic)
    {
        $result = $this->loginAuthModel->_auth_user($no_ic);
        // echo "<pre/>"; print_r($result); exit();
        if ($result) {
            foreach ($result as $row) {
                $r_IdPengguna = $row->userid;
                $r_Pengenalan = $row->nokp;
                $r_NoK = $row->nok;
                $r_Nama = $row->fname;
                $r_Ptj = $row->ptj;
                $r_Status = $row->userstat;
                $r_JenisPengguna = $row->role;
            }

            if ($r_Pengenalan != "") {
                $sess_array = [
                    's_IdPengguna' => $r_IdPengguna,
                    's_KP' => $r_Pengenalan,
                    's_NoK' => $r_NoK,
                    's_Nama' => $r_Nama,
                    's_Ptj' => $r_Ptj,
                    's_Status' => $r_Status,
                    's_JenisPengguna' => $r_JenisPengguna,                    
                ];

                session()->set('logged_in', $sess_array);

                if ($r_Status != "Aktif") {
                    session()->setFlashdata('Mesej', "Log Masuk Anda Tidak Aktif.Sila Hubungi Pentadbir Sistem");
                    return redirect()->to('login');
                } else {
                    $data_update = [                        
                        'lastlogin' => date('Y-m-d H:i:s')                        
                    ];
                    $this->loginAuthModel->_update_user($r_IdPengguna, $data_update);
                    return redirect()->to('front');
                }
            }
        } else {
            session()->setFlashdata('Mesej', "ID Pengenalan Atau Kata Laluan Anda Tidak Sah");
            return redirect()->to('login');
        }
    }

    public function encryptIt($q)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        return base64_encode(openssl_encrypt($q, 'AES-256-CBC', md5($cryptKey), 0, md5(md5($cryptKey))));
    }

    public function decryptIt($q)
    {
        $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
        return rtrim(openssl_decrypt(base64_decode($q), 'AES-256-CBC', md5($cryptKey), 0, md5(md5($cryptKey))), "\0");
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function send_email($send)
    {
        $email = \Config\Services::email();
        $email->setFrom($send['from']);
        $email->setTo($send['to']);
        $email->setSubject($send['subject']);
        $email->setMessage($send['msg']);
        $email->send();
    }
}

