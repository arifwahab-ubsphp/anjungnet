<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\User_m;
use Modules\AdminDashboard\Models\Home_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Home_c extends BaseController
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
        return view('AdminDashboard/index', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('');
    }
}