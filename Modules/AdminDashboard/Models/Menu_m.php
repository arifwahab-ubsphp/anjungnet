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
        'nama_menu', 'perincian_menu','jenis_menu', 'url_menu', 'position_menu', 'parent', 'icon', 'susunan', 'aras', 'warna_menu', 'status_menu', 'created_by', 'updated_by'
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
        return $this->anjungDB->table('anj_menu')->where('parent', $id)->get()->getResult();
    }

    public function getQuickAccessMenus()
    {
        return $this->where('position_menu', 'Quick Access')->orderBy('susunan', 'ASC')->findAll();
    }

    public function getLeftMenuItems()
    {
        return $this->where('position_menu', 'Menu Kiri')->orderBy('susunan', 'ASC')->findAll();
    }

}