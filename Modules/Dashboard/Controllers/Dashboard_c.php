<?php
namespace Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
// use Modules\Dashboard\Models\User_m;
use Modules\Dashboard\Models\Dashboard_m;
use CodeIgniter\HTTP\Response;
use Modules\AdminDashboard\Models\Menu_m;
use Modules\AdminDashboard\Models\SSO_m;

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
        $data['foto'] = $userModel->get_foto($nok,$noKP);

        $anjungMenu = new Menu_m();
        $data['parentList'] = $anjungMenu->getQuickAccessMenus();
        $data['leftMenuList'] = $anjungMenu->getLeftMenuItems();

        foreach ($data['parentList'] as $menu) {
            $menu->breadcrumbPath = $anjungMenu->getBreadcrumbPath($menu->id);
        }
        foreach ($data['leftMenuList'] as $menu) {
            $menu->breadcrumbPath = $anjungMenu->getBreadcrumbPath($menu->id);
        }

        $data['menuChildren'] = [];
        foreach (array_merge($data['parentList'], $data['leftMenuList']) as $menu) {
            $data['menuChildren'][$menu->id] = $anjungMenu->getChildrenDashboard($menu->id);
        }
        
        foreach ($data['menuChildren'] as $parentId => $children) {
            foreach ($children as $childMenu) {
                $this->processChildMenu($childMenu, $anjungMenu);
            }
        }

        $anjungSSO = new SSO_m();
        $data['ssoList'] = $anjungSSO->findAll();
        
        return view('Dashboard/view_layout3', $data);
    }

    private function processChildMenu($menu, $anjungMenu)
    {
        $menu->breadcrumbPath = $anjungMenu->getBreadcrumbPath($menu->id);
        $menu->childrenn = $anjungMenu->getChildrenDashboard($menu->id);

        foreach ($menu->childrenn as &$childMenu) {
            $this->processChildMenu($childMenu, $anjungMenu);
        }
    }
}