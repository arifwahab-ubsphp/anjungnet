<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\Banner_Item_m;
use Modules\AdminDashboard\Models\Banner_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Banner_c extends BaseController
{
     // Data
     protected $data;

    public function banner()
    {
        $anjungBanner = new Banner_m();
        $data['banner'] = $anjungBanner->findAll();

        $anjungBannerItem = new Banner_Item_m();
        $data['bannerItem'] = $anjungBannerItem->findAll();
        return view('AdminDashboard/Banner/index', $data);
    }


    public function create()
    {
        return view('AdminDashboard/Banner/create_banner');
    }
    public function bannerStore()
    {
        $anjungBanner = new Banner_m();
        $data = [
            'banner_title' => $this->request->getPost('title'),
            'banner_description' => $this->request->getPost('description'),
            'banner_approve' => $this->request->getPost('approved'),
            'banner_publish' => $this->request->getPost('published')
        ];
        $anjungBanner->save($data);
        return redirect()->to(base_url('admin-dashboard/banner'))->with('status', 'Banner Added Successfully');
    }

    public function bannerEdit($id)
    {
        $anjungBanner = new Banner_m();
        $data['banner'] = $anjungBanner->find($id);
        return view('AdminDashboard/Banner/edit_banner', $data);

    }

    public function bannerUpdate($id)
    {
        $anjungBanner = new Banner_m();
        $data = [
            'banner_title' => $this->request->getPost('title'),
            'banner_description' => $this->request->getPost('description'),
            'banner_approve' => $this->request->getPost('approved'),
            'banner_publish' => $this->request->getPost('published')
        ];
        $anjungBanner->update($id, $data);
        // return redirect()->to(base_url('admin-dashboard/banner'))->with('status', 'Banner Updated Successfully');
        return redirect()->to(base_url('admin-dashboard/banner/edit/' . $id))->with('status', 'Banner Updated Successfully');

    }

    public function bannerDelete($id)
    {
        $anjungBanner = new Banner_m();
        $anjungBanner->delete($id);
        return redirect()->to(base_url('admin-dashboard/banner'))->with('status', 'Banner Deleted Successfully');
    }
}