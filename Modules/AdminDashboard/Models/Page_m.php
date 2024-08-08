<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Page_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_page';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'page_title', 'page_description', 'page_content', 'page_approve', 'page_publish'
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

}