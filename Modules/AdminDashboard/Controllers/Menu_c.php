<?php
namespace Modules\AdminDashboard\Controllers;

use App\Controllers\BaseController;
use Modules\AdminDashboard\Models\Property_m;
use Modules\AdminDashboard\Models\User_m;
use App\Libraries\MpdfLibrary;
use CodeIgniter\HTTP\Response;

class Menu_c extends BaseController{

    public function index()
    {
        $propertyModel = new Property_m();
        $data['properties'] = $propertyModel->findAll();
        return view('property/index', $data);
    }

}