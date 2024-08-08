<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class File_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_files';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'nama_file', 'jenis_file', 'parent', 'status_file', 'uploaded_file', 'created_by', 'updated_by'
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

    // Get all list from column parent that exist in column id
    public function getChildren($id)
    {
        return $this->anjungDB->table('anj_files')->where('parent', $id)->get()->getResult();
    }

}