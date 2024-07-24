<?php
namespace Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
// use Modules\Dashboard\Models\User_m;
use Modules\Dashboard\Models\Dashboard_m;
use CodeIgniter\HTTP\Response;

class Dashboard_c extends BaseController
{
    public function index()
    {        
        $session = service('session');        
        $noKP = $session->get('s_KP');
        $nok = $session->get('s_NoK');
        $nama_user = $session->get('s_Nama');
        $ptj_user = $session->get('s_Ptj');
        $jenis_user = $session->get('s_JenisPengguna');
        
        $userModel = new Dashboard_m();
        $data['userlist'] = $userModel->inteam_get_user($nok);
        
        return view('Dashboard/view_layout3', $data);
    }
}