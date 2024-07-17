<?php
namespace Modules\AdminDashboard\Controllers;
use Modules\AdminDashboard\Models\Menu_m;
use App\Controllers\BaseController;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Menu_c extends BaseController{

    public function index()
    {
        $anjungMenu = new Menu_m();
        $data['parentList'] = $anjungMenu->findAll();
        return view('AdminDashboard/Menu/index', $data);
    }

    public function menuStore()
    {
        $anjungSSO = new Menu_m();
        $data = [
            'nama_menu' => $this->request->getPost('nama-menu'),
            'url_menu' => $this->request->getPost('url-menu'),
            'susunan' => $this->request->getPost('susunan'),
        ];
        $anjungSSO->save($data);
        return redirect()->to(base_url('admin-dashboard/menu'))->with('status', 'Parent Menu Added Successfully');
    }




}