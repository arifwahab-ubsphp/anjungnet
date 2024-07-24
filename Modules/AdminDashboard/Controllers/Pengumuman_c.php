<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\User_m;
use Modules\AdminDashboard\Models\Home_m;
use Modules\AdminDashboard\Models\Pengumuman_m;
use Modules\AdminDashboard\Models\Pengumuman_lampiran_m;

use CodeIgniter\HTTP\Response;

class Pengumuman_c extends BaseController
{
    private function checkSession()
    {
        $session = service('session');
        $nok = $session->get('s_NoK');

        if (empty($nok)) {
            $session->set('redirect_url', current_url()); // Store the current URL in the session
            return redirect()->to('login');
        }
        return $nok;
    }

    public function index()
    {
        $nok = $this->checkSession();
        if ($nok instanceof Response) {
            return $nok; // Redirect to login if no session or session expired
        }

        $userModel = new User_m();
        $data['userlist'] = $userModel->inteam_get_user($nok);

        $anjungProfile = new Home_m();
        $data['profile'] = $anjungProfile->getUserProfile($nok);

        $news = new Pengumuman_m();
        $data['news_list'] = $news->getNews();

        return view('AdminDashboard/Pengumuman/list_view', $data);
    }

    public function view_form()
    {
        $nok = $this->checkSession();
        if ($nok instanceof Response) {
            return $nok; // Redirect to login if no session or session expired
        }

        $news = new Pengumuman_m();
        $data['news_cat'] = $news->getCatNews();
        return view('AdminDashboard/Pengumuman/form_view', $data);
    }

    public function save_news()
    {
        $session = service('session');
        $nok = $this->checkSession();
        $nama = $session->get('s_Nama');
        $ptj = $session->get('s_Ptj');

        if ($nok instanceof Response) {
            return $nok; // Redirect to login if no session or session expired
        }

        // Initialize validation object
        $validation = \Config\Services::validation();
        $validation->setRules([
            'txt_namanews' => [
                'label' => 'Nama',
                'rules' => 'required'
            ],
            'txt_message' => [
                'label' => 'Message',
                'rules' => 'required'
            ],
            'cat_news' => [
                'label' => 'Kategori Pengumuman',
                'rules' => 'required'
            ],
            // 'attachments.*' => [
            //     'label' => 'Attachments',
            //     'rules' => 'uploaded[attachments.*]|max_size[attachments.*,4096]|ext_in[attachments.*,jpg,jpeg,png,pdf]'
            //     // 'rules' => 'uploaded[attachments.*]'
            // ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, return to the form with error messages
            $session->setFlashdata('error', $validation->getErrors());
            // dd($this->request->getFiles());
            return redirect()->to('admin-dashboard/news_form')->withInput();
        }

        $a_news = $this->request->getPost('txt_namanews', FILTER_SANITIZE_STRING);
        $b_news = $this->request->getPost('txt_message', FILTER_SANITIZE_STRING);
        $c_news = $this->request->getPost('cat_news', FILTER_SANITIZE_STRING);

        // Ensure all data is sanitized properly
        $nama_news = htmlspecialchars($a_news, ENT_QUOTES, 'UTF-8');
        $mesej_news = htmlspecialchars($b_news, ENT_QUOTES, 'UTF-8');
        $kat_news = htmlspecialchars($c_news, ENT_QUOTES, 'UTF-8');

        // Check if sanitized data is empty and set detailed error messages
        $errorMessages = [];
        if (empty($nama_news)) {
            $errorMessages['txt_namanews'] = 'Nama Pengumuman is required and cannot be empty.';
        }
        if (empty($mesej_news)) {
            $errorMessages['txt_message'] = 'Message is required and cannot be empty.';
        }
        if (empty($kat_news)) {
            $errorMessages['cat_news'] = 'Kategori Pengumuman is required and cannot be empty.';
        }

        if (!empty($errorMessages)) {
            $session->setFlashdata('error', $errorMessages);
            return redirect()->to('admin-dashboard/news_form')->withInput();
        }

        $btn_submit = $this->request->getPost('btn_submit');
        $btn_draf = $this->request->getPost('btn_draf');

        $querySave = new Pengumuman_m();
        $attachmentSave = new Pengumuman_lampiran_m();

        $data = [
            'pengumuman_nama' => $nama_news,
            'pengumuman_text' => $mesej_news,
            'pengumuman_viewer' => $kat_news,
            'pengumuman_updateby' => $nama,
            'pengumuman_ptj' => $ptj,
            'pengumuman_created' => date('Y-m-d H:i:s'),
            'pengumuman_mailstate' => "None"
        ];

        $returnID = $querySave->insert($data);

        if ($returnID) {
            // Process and save attachments
            $files = $this->request->getFiles();
            
            if ($files) {
                foreach ($files['attachments'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $newName = $file->getRandomName();
                        $file->move(WRITEPATH . 'uploads/news_attachments', $newName);

                        // Save attachment details to the database
                        $attachmentData = [
                            'pengumuman_id' => $returnID,
                            'lampiran_nama' => $file->getClientName(),
                            'lampiran_url' => WRITEPATH . 'uploads/news_attachments/' . $newName,
                            'lampiran_created' => date('Y-m-d H:i:s')
                        ];
                        $attachmentSave->saveAttachment($attachmentData);
                    }
                    else{
                        echo "File upload error: " . $file->getErrorString();
                        dd($this->request->getFiles());
                        
                    }
                }
            }

            if ($btn_draf) {
                $session->setFlashdata('Mesej', "Pengumuman berjaya disimpan");
            } elseif ($btn_submit) {
                $session->setFlashdata('Mesej', "Pengumuman berjaya disimpan dan dihantar sebagai email");
            }
            return redirect()->to('admin-dashboard/news_list');
        } else {
            $session->setFlashdata('error', "Pengumuman tidak berjaya disimpan");
            return redirect()->to('admin-dashboard/news_form')->withInput();
        }
    }





}
