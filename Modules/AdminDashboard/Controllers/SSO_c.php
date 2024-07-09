<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\SSO_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class SSO_c extends BaseController
{
    public function index()
    {
        $anjungSSO = new SSO_m();
        $data['ssoList'] = $anjungSSO->findAll();
        return view('AdminDashboard/SSO/index', $data);
    }


    public function create()
    {
        return view('AdminDashboard/SSO/create_sso');
    }

    public function ssoStore()
    {
        $anjungSSO = new SSO_m();
        $data = [
            'app_name' => $this->request->getPost('app_name'),
            'form_name' => $this->request->getPost('form_name'),
            'login_url' => $this->request->getPost('login_url'),
            'login_action_url' => $this->request->getPost('login_action_url'),
            'submit_type' => $this->request->getPost('submit_type'),
            'app_status' => $this->request->getPost('app_status')
        ];
        $anjungSSO->save($data);
        return redirect()->to(base_url('admin-dashboard/sso'))->with('status', 'Single Sign On Added Successfully');
    }

    public function ssoEdit($id)
    {
        $anjungSSO = new SSO_m();
        $data['sso'] = $anjungSSO->find($id);
        return view('AdminDashboard/SSO/edit_sso', $data);
    }

    public function ssoUpdate($id)
    {
        $anjungSSO = new SSO_m();
        $data = [
            'app_name' => $this->request->getPost('app_name'),
            'form_name' => $this->request->getPost('form_name'),
            'login_url' => $this->request->getPost('login_url'),
            'login_action_url' => $this->request->getPost('login_action_url'),
            'submit_type' => $this->request->getPost('submit_type'),
            'app_status' => $this->request->getPost('app_status')
        ];
        $anjungSSO->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/sso'))->with('status', 'Single Sign On Updated Successfully');
    }

    public function ssoDelete($id)
    {
        $anjungSSO = new SSO_m();
        $anjungSSO->delete($id);
        return redirect()->to(base_url('admin-dashboard/sso'))->with('status', 'Single Sign On Deleted Successfully');
    }
}