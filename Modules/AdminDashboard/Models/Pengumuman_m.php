<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Pengumuman_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_pengumuman';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'pengumuman_name', 'pengumuman_group_by', 'pengumuman_update_by', 'pengumuman_mail_status', 'pengumuman_date_created', 'pengumuman_date_updated',
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

}