<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\User_m;
use Modules\AdminDashboard\Models\Home_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Home_c extends BaseController
{
    public function index()
    {
        $nok = "18163";
        $userModel = new User_m();
        $data['userlist'] = $userModel->inteam_get_user($nok);

        $anjungProfile = new Home_m();
        $data['profile'] = $anjungProfile->getUserProfile($nok);
        return view('AdminDashboard/index', $data);
    }
}