<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Menu_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_menu';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'nama_menu', 'url_menu', 'parent', 'icon', 'susunan', 'aras'
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

}