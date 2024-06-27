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
        $nok = "18163";
        $userModel = new Dashboard_m();
        $data['userlist'] = $userModel->inteam_get_user($nok);
        
        return view('Dashboard/view_layout3', $data);
    }
}