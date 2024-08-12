<?php

namespace Modules\AdminDashboard\Controllers;

use Modules\AdminDashboard\Models\File_m;
use App\Controllers\BaseController;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class File_c extends BaseController
{
    public function index()
    {
        $anjungFile = new File_m();
        $data['parentList'] = $anjungFile->findAll();

        // echo '<pre>';
        // print_r($data['parentList']);
        // echo '</pre>';
        
        return view('AdminDashboard/File/index', $data);
    }

    public function fileupdateStatus($id, $status)
    {
        $anjungSSO = new File_m();
        $data = [
            'status_file' => $status
        ];
        $anjungSSO->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/file'))->with('status', 'Status Updated Successfully');
    }

    public function fileStore()
    {
        $anjungFile = new File_m();
        $userId = session()->get('s_NoK');

        $data = [
            'nama_file' => $this->request->getPost('nama-file'),
            'jenis_file' => $this->request->getPost('jenis-file'),
            'status_file' => $this->request->getPost('status-file'),
            'created_by' => $userId,
        ];

        $jenisFile = $this->request->getPost('jenis-file');
        if ($jenisFile === 'Upload') {
            $data['uploaded_file'] = $this->request->getPost('upload-option');
        }

        $anjungFile->save($data);

        return redirect()->to(base_url('admin-dashboard/file'))->with('status', 'Parent File Added Successfully');
    }

    public function fileItemIndex($id)
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
    
        return view('AdminDashboard/File/file_item', $data);
    }
    
    public function fileitemupdateStatus($id, $parent, $status)
    {
        $anjungSSO = new File_m();
        $data = [
            'status_file' => $status
        ];
        $anjungSSO->update($id, $data);
        return redirect()->to(base_url('admin-dashboard/file-item/'.$parent))->with('status', 'Status Updated Successfully');
    }


    public function fileItemStoreIndex()
    {
        $anjungFile = new File_m();
        $userId = session()->get('s_NoK');
    
        // Load the encryption service
        $encrypter = \Config\Services::encrypter();
    
        // Initialize validation rules
        $validationRules = [
            'jenis-file' => 'required',
            'status-file' => 'required',
        ];
    
        // Add file upload rules if "Upload" option is selected
        if ($this->request->getPost('jenis-file') === 'Upload') {
            $validationRules['upload-option'] = [
                'label' => 'Upload File',
                'rules' => [
                    'uploaded[upload-option]',
                    'ext_in[upload-option,pdf,xls,xlsx,doc,docx]',
                    'max_size[upload-option,2048]', // 2MB max size
                ],
            ];
        }
    
        if (!$this->validate($validationRules)) {
            $validationErrors = $this->validator->getErrors();
            return redirect()->back()->withInput()->with('error', 'File type uploaded is not allowed or exceeds the maximum size. ' . json_encode($validationErrors));
        }
    
        $data = [
            'parent' => $this->request->getPost('id-file'),
            'nama_file' => $this->request->getPost('nama-file'),
            'jenis_file' => $this->request->getPost('jenis-file'),
            'status_file' => $this->request->getPost('status-file'),
            'created_by' => $userId,
        ];
    
        $jenisFile = $this->request->getPost('jenis-file');
        if ($jenisFile === 'Upload') {
            $uploadedFile = $this->request->getFile('upload-option');
            if ($uploadedFile->isValid() && !$uploadedFile->hasMoved()) {
                $originalFileName = $uploadedFile->getName();
                $uploadedFile->move('./uploaded', $originalFileName);
                // Encrypt the original filename
                $encryptedFileName = base64_encode($encrypter->encrypt($originalFileName));
                $data['uploaded_file'] = $encryptedFileName;
            } else {
                return redirect()->back()->withInput()->with('error', 'There was a problem with the file upload.');
            }
        }
    
        $anjungFile->save($data);
    
        $fileId = $this->request->getPost('id-file');
    
        return redirect()->to(base_url("admin-dashboard/file-item/$fileId"))->with('status', 'Sub File Added Successfully');
    }
    
    public function deleteFile($id)
    {
        $anjungFile = new File_m();
        $anjungFile->delete($id);
        return redirect()->to(base_url('admin-dashboard/file'))->with('status', 'File Deleted Successfully');
    }

    public function fileItemDelete($id, $parentId)
    {
        $anjungFile = new File_m();
        $anjungFile->delete($id);
        return redirect()->to(base_url('admin-dashboard/file-item/'.$parentId))->with('status', 'Sub File Deleted Successfully');
    }
    
    
    
}