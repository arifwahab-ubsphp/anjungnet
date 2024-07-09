<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class SSO_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_sso';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'app_name', 'form_name', 'login_url', 'login_action_url', 'submit_type', 'app_status'
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

}