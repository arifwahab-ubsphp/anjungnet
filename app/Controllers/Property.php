<?php

namespace App\Controllers;

use App\Models\Property_m;

class Property extends BaseController
{
    public function index()
    { 
        $propertyModel = new Property_m();
        $data['properties'] = $propertyModel->findAll();
        return view('property/index', $data);
    }

    // ...
}