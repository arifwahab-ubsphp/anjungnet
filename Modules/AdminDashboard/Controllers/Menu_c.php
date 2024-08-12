<?php

namespace Modules\AdminDashboard\Controllers;

use Modules\AdminDashboard\Models\Menu_m;
use Modules\AdminDashboard\Models\SSO_m;
use Modules\AdminDashboard\Models\Page_m;
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

        $anjungPage = new Page_m();
        $data['pageList'] = $anjungPage->findAll();
        
        return view('AdminDashboard/Menu/index', $data);
    }

    public function menuupdateStatus($id, $status)
    {
        $anjungMenu = new Menu_m();
        $data = [
            'status_menu' => $status
        ];
        $anjungMenu->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/menu'))->with('status', 'Status Updated Successfully');
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

    public function menuDelete($id)
    {
        $anjungMenu = new Menu_m();
        $anjungMenu->delete($id);
        return redirect()->to(base_url('admin-dashboard/menu'))->with('status', 'Parent Menu Deleted Successfully');
    }

    public function menuItemIndex($id)
    {
        $anjungMenu = new Menu_m();
        
        $currentMenu = $anjungMenu->find($id);
        $data['currentMenu'] = $currentMenu;
        
        // Initialize breadcrumb array
        $breadcrumbs = [];
        
        // Add current menu to breadcrumbs
        if ($currentMenu) {
            $breadcrumbs[] = $currentMenu;
            
            // Fetch parent menu items recursively
            $parentId = $currentMenu->parent; // Use parent ID to fetch parent menus
            while ($parentId) {
                $parentMenu = $anjungMenu->find($parentId);
                if ($parentMenu) {
                    // Add parent menu to breadcrumbs if not already present
                    if (!in_array($parentMenu, $breadcrumbs, true)) {
                        array_unshift($breadcrumbs, $parentMenu); // Insert at the beginning
                    }
                    $parentId = $parentMenu->parent; // Get next parent ID
                } else {
                    break;
                }
            }
        }
        
        $data['breadcrumbs'] = $breadcrumbs;
    
        $data['singleList'] = $anjungMenu->find($id);
        
        // Fetch submenus of the current menu
        $data['allList'] = $anjungMenu->getChildren($id);
    
        $anjungSSO = new SSO_m();
        $data['ssoList'] = $anjungSSO->findAll();

        $anjungPage = new Page_m();
        $data['pageList'] = $anjungPage->findAll();
        
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

        $menuId = $this->request->getPost('id-menu');

        return redirect()->to(base_url("admin-dashboard/menu-item/$menuId"))->with('status', 'Sub Menu Added Successfully');
    }

    public function menuItemDelete($id, $parentId)
    {
        $anjungMenu = new Menu_m();
        $anjungMenu->delete($id);
        return redirect()->to(base_url('admin-dashboard/menu-item/'. $parentId))->with('status', 'Sub Menu Deleted Successfully');
    }

    public function menuitemupdateStatus($id, $parent, $status)
    {
        $anjungMenu = new Menu_m();
        $data = [
            'status_menu' => $status
        ];
        $anjungMenu->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/menu-item/'.$parent))->with('status', 'Status Updated Successfully');
    }
}