<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Banner_Item_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'anj_banner_item';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    protected $allowedFields = [
        'id_anj_banner', 'item_title', 'item_description', 'item_image', 'item_link', 'item_datatype', 'item_caption', 'item_start_publish', 'item_end_publish', 'item_approve', 'item_publish'
    ];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

    public function getByBannerId($id_anjung_banner)
    {
        return $this->where('id_anj_banner', $id_anjung_banner)->findAll();
    }

    public function getBannerTitleById($id_anjung_banner)
    {
        $builder = $this->anjungDB->table('anj_banner');
        $builder->select('id, banner_title');
        $builder->where('id', $id_anjung_banner);
        $query = $builder->get();
        return $query->getRow();
    }

}