<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Banner_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_banner';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'banner_title', 'banner_description', 'banner_approve', 'banner_publish'
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

}