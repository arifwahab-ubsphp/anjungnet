<?php

namespace Modules\AdminDashboard\Controllers;

use Modules\AdminDashboard\Models\Menu_m;
use Modules\AdminDashboard\Models\SSO_m;
use App\Controllers\BaseController;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Menu_c extends BaseController
{
    public function index()
    {
        $anjungMenu = new Menu_m();
        $data['parentList'] = $anjungMenu->findAll();

        $anjungSSO = new SSO_m();
        $data['ssoList'] = $anjungSSO->findAll();
        
        return view('AdminDashboard/Menu/index', $data);
    }

    public function menuStore()
    {
        $anjungSSO = new Menu_m();
        $userId = session()->get('s_NoK');

        $data = [
            'nama_menu' => $this->request->getPost('nama-menu'),
            'perincian_menu' => $this->request->getPost('perincian-menu'),
            'jenis_menu' => $this->request->getPost('jenis-menu'),
            'position_menu' => $this->request->getPost('position-menu'),
            'susunan' => $this->request->getPost('susunan'),
            'aras' => $this->request->getPost('aras'),
            'warna_menu' => $this->request->getPost('warna-menu'),
            'status_menu' => $this->request->getPost('status-menu'),
            'created_by' => $userId,
        ];

        $jenisMenu = $this->request->getPost('jenis-menu');
        if ($jenisMenu === 'SSO') {
            $data['url_menu'] = $this->request->getPost('sso-option');
        } elseif ($jenisMenu === 'Pages') {
            $data['url_menu'] = $this->request->getPost('pages-input');
        } elseif ($jenisMenu === 'Custom') {
            $data['url_menu'] = $this->request->getPost('custom-input');
        }

        $anjungSSO->save($data);

        return redirect()->to(base_url('admin-dashboard/menu'))->with('status', 'Parent Menu Added Successfully');
    }

    public function menuItemIndex($id)
    {
        $anjungMenu = new Menu_m();
        $data['singleList'] = $anjungMenu->find($id);
        
        $data['allList'] = $anjungMenu->getChildren($id);

        $anjungSSO = new SSO_m();
        $data['ssoList'] = $anjungSSO->findAll();
        
        return view('AdminDashboard/Menu/menu_item', $data);
    }

    public function menuItemStoreIndex()
    {
        $anjungSSO = new Menu_m();
        $userId = session()->get('s_NoK');

        $data = [
            'parent' => $this->request->getPost('id-menu'),
            'nama_menu' => $this->request->getPost('nama-menu'),
            'perincian_menu' => $this->request->getPost('perincian-menu'),
            'jenis_menu' => $this->request->getPost('jenis-menu'),
            'position_menu' => $this->request->getPost('position-menu'),
            'susunan' => $this->request->getPost('susunan'),
            'aras' => $this->request->getPost('aras'),
            'warna_menu' => $this->request->getPost('warna-menu'),
            'status_menu' => $this->request->getPost('status-menu'),
            'created_by' => $userId,
        ];

        $jenisMenu = $this->request->getPost('jenis-menu');
        if ($jenisMenu === 'SSO') {
            $data['url_menu'] = $this->request->getPost('sso-option');
        } elseif ($jenisMenu === 'Pages') {
            $data['url_menu'] = $this->request->getPost('pages-input');
        } elseif ($jenisMenu === 'Custom') {
            $data['url_menu'] = $this->request->getPost('custom-input');
        }

        $anjungSSO->save($data);

        return redirect()->to(base_url('admin-dashboard/menu'))->with('status', 'Sub Menu Added Successfully');
    }
}