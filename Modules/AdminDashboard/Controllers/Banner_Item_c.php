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
     public function updateStatus($id, $parentID, $status)
     {
         $anjungBanner = new Banner_Item_m();
         $data = [
             'item_publish' => $status
         ];
         $anjungBanner->update($id, $data);
         return redirect()->to(base_url('admin-dashboard/banner-item/' . $parentID))->with('status', 'Banner Updated Successfully');
     }
     
     public function bannerItemStore()
     {
         // Validate form inputs
         $validationRules = [
             'title' => 'required',
             'image' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[image]',
                    'is_image[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[image,100]',
                    'max_dims[image,1024,768]',
                ],
            ],
             // Add more validation rules as needed
         ];
     
       
     
         $anjungBanner = new Banner_Item_m();
         $data = [
             'id_anj_banner' => $this->request->getPost('id_anj_banner'),
             'item_title' => $this->request->getPost('title'),
             'item_description' => $this->request->getPost('description'),
             'item_start_publish' => $this->request->getPost('publish_start_date'),
             'item_end_publish' => $this->request->getPost('publish_end_date'),
             'item_approve' => $this->request->getPost('approved'),
             'item_publish' => $this->request->getPost('published')
         ];
         
       if (!$this->validate($validationRules)) {
             // If validation fails, reload the form with validation errors
             return redirect()->to(base_url('admin-dashboard/banner-item/create/'.$data['id_anj_banner']))
                 ->withInput()
                 ->with('error', 'File type uploaded is not allowed');
         }
         
         // Handle file upload (move file to desired location)
         $image = $this->request->getFile('image');
         if ($image->isValid() && !$image->hasMoved()) {
             $imageName = $image->getRandomName();
             $image->move('./uploaded', $imageName); // Adjust upload directory
             $data['item_image'] = $imageName; // Save image name to database field
         } else {
             // If the image is not valid or has already moved, handle the error
             return redirect()->to(base_url('admin-dashboard/banner-item/'.$data['id_anj_banner']))
                 ->withInput()
                 ->with('error', 'There was a problem with the file upload.');
         }
     
         $insertedId = $anjungBanner->insert($data); // Assuming you have an insert method in your model
     
         // Redirect back to the form with the banner item ID
         return redirect()->to(base_url('admin-dashboard/banner-item/'.$data['id_anj_banner']))->with('status', 'Banner Item Added Successfully');
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
        return redirect()->to(base_url('admin-dashboard/banner-item/edit/' . $id))->with('status', 'Banner Updated Successfully');
    }

    public function bannerItemDelete($id, $id_anj_banner)
    {
        $anjungBanner = new Banner_Item_m();
        $anjungBanner->delete($id);
        return redirect()->to(base_url('admin-dashboard/banner-item/' . $id_anj_banner))->with('status', 'Banner Item Deleted Successfully');
    }
}