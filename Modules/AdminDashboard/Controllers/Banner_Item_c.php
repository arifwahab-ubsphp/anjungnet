<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\Banner_m;
use Modules\AdminDashboard\Models\Banner_Item_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Banner_Item_c extends BaseController
{
     // Data
     protected $data;

     public function index($id_anjung_banner)
     {
         $anjungBanner = new Banner_Item_m();
         $data['bannerItem'] = $anjungBanner->getByBannerId($id_anjung_banner);
         $data['bannerTitle'] = $anjungBanner->getBannerTitleById($id_anjung_banner);

         $anjungBannerParent = new Banner_m();
         $data['bannerId'] = $anjungBannerParent->find($id_anjung_banner);
         return view('AdminDashboard/BannerItem/index', $data);
     }
     
    
     public function create($id_anjung_banner)
     {
        $anjungBannerParent = new Banner_m();
        $data['bannerId'] = $anjungBannerParent->find($id_anjung_banner);
         return view('AdminDashboard/BannerItem/create_banner_item', $data);
     }
     
    public function bannerItemStore()
    {
        $anjungBanner = new Banner_Item_m();
        $data = [
            'id_anj_banner' => $this->request->getPost('id_anj_banner'),
            'item_title' => $this->request->getPost('title'),
            'item_description' => $this->request->getPost('description'),
            'item_approve' => $this->request->getPost('approved'),
            'item_publish' => $this->request->getPost('published')
        ];
        $anjungBanner->save($data);
        return redirect()->to(base_url('admin-dashboard/banner'))->with('status', 'Banner Item Added Successfully');
    }

    public function bannerItemEdit($id)
    {
        $anjungBanner = new Banner_Item_m();
        $data['banner'] = $anjungBanner->find($id);
        return view('AdminDashboard/BannerItem/edit_banner', $data);
    }

    public function bannerItemUpdate($id)
    {
        $anjungBanner = new Banner_Item_m();
        $data = [
            'item_title' => $this->request->getPost('title'),
            'item_description' => $this->request->getPost('description'),
            'item_approve' => $this->request->getPost('approved'),
            'item_publish' => $this->request->getPost('published')
        ];
        $anjungBanner->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/banner'))->with('status', 'Banner Updated Successfully');
    }

    public function bannerItemDelete($id)
    {
        $anjungBanner = new Banner_Item_m();
        $anjungBanner->delete($id);
        return redirect()->to(base_url('admin-dashboard/banner'))->with('status', 'Banner Item Deleted Successfully');
    }
}