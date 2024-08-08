<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\File_m;
use Modules\AdminDashboard\Models\Page_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Page_c extends BaseController
{
     // Data
     protected $data;

    public function index()
    {
        $anjungPage = new Page_m();
        $data['page'] = $anjungPage->findAll();

        return view('AdminDashboard/Page/index', $data);
    }


    public function create()
    {
        $anjungFile = new File_m();
        $data['parentList'] = $anjungFile->findAll();
        return view('AdminDashboard/Page/create_page', $data);
    }
    public function pageStore()
    {
        $anjungPage = new Page_m();
        $data = [
            'page_title' => $this->request->getPost('title'),
            'page_description' => $this->request->getPost('description'),
            'page_content' => $this->request->getPost('content'),
            'page_approve' => $this->request->getPost('approved'),
            'page_publish' => $this->request->getPost('published')
        ];
        $anjungPage->save($data);
        return redirect()->to(base_url('admin-dashboard/page'))->with('status', 'Pages Added Successfully');
    }

    public function pageEdit($id)
    {
        $anjungPage = new Page_m();
        $data['page'] = $anjungPage->find($id);
        return view('AdminDashboard/Page/edit_page', $data);
    }

    public function pageUpdate($id)
    {
        $anjungPage = new Page_m();
        $data = [
            'page_title' => $this->request->getPost('title'),
            'page_description' => $this->request->getPost('description'),
            'page_content' => $this->request->getPost('content'),
            'page_approve' => $this->request->getPost('approved'),
            'page_publish' => $this->request->getPost('published')
        ];
        $anjungPage->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/page'))->with('status', 'Pages Updated Successfully');
    }

    public function pageDelete($id)
    {
        $anjungPage = new Page_m();
        $anjungPage->delete($id);
        return redirect()->to(base_url('admin-dashboard/page'))->with('status', 'Pages Deleted Successfully');
    }

    public function getSubFolders($parentId)
    {
        $anjungFile = new File_m();
        $subFolders = $anjungFile->where('parent', $parentId)->findAll();
    
        // Load the encryption library
        $encrypter = \Config\Services::encrypter();
    
        // Decrypt uploaded_file
        foreach ($subFolders as &$subFolder) {
            if ($subFolder->jenis_file === 'Upload') {
                $subFolder->decrypted_file = $encrypter->decrypt(base64_decode($subFolder->uploaded_file));
            } else {
                $subFolder->decrypted_file = '-';
            }
        }
    
        return $this->response->setJSON(['subFolders' => $subFolders]);
    }
    
    public function resource()
    {
        $anjungPage = new Page_m();
        $data['page'] = $anjungPage->findAll();

        $anjungFile = new File_m();
        $data['parentList'] = $anjungFile->findAll();

        return view('AdminDashboard/Page/resourceIndex', $data);
    }

    public function resourcefileItemIndex($id)
    {
        $anjungFile = new File_m();
        
        $currentFile = $anjungFile->find($id);
        $data['currentFile'] = $currentFile;
        
        // Initialize breadcrumb array
        $breadcrumbs = [];
        
        // Add current menu to breadcrumbs
        if ($currentFile) {
            $breadcrumbs[] = $currentFile;
            
            // Fetch parent menu items recursively
            $parentId = $currentFile->parent; // Use parent ID to fetch parent menus
            while ($parentId) {
                $parentFile = $anjungFile->find($parentId);
                if ($parentFile) {
                    // Add parent menu to breadcrumbs if not already present
                    if (!in_array($parentFile, $breadcrumbs, true)) {
                        array_unshift($breadcrumbs, $parentFile); // Insert at the beginning
                    }
                    $parentId = $parentFile->parent; // Get next parent ID
                } else {
                    break;
                }
            }
        }
        
        $data['breadcrumbs'] = $breadcrumbs;
    
        $data['singleList'] = $anjungFile->find($id);
        
        // Fetch submenus of the current menu
        $data['allList'] = $anjungFile->getChildren($id);
    
        return view('AdminDashboard/page/resource_file_item', $data);
    }

    public function blog($id)
    {
        $anjungPage = new Page_m();
        $data['blog'] = $anjungPage->find($id);

        return view('AdminDashboard/Page/blog', $data);
    }


}