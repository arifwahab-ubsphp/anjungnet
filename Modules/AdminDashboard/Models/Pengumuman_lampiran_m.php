<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Pengumuman_lampiran_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $primaryKey = 'lampiran_id'; // Assuming the primary key is 'id'
    protected $table = 'pengumuman_lampiran';
    protected $allowedFields = ['lampiran_id', 'lampiran_nama', 'lampiran_url', 'pengumuman_id', 'lampiran_created', 'lampiran_updated'];
    
    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

    public function saveAttachment($data)
    {   
        return $this->insert($data);
    }
}
