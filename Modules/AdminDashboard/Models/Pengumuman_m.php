<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Pengumuman_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $primaryKey = 'pengumuman_nama';
    protected $table = 'pengumuman';
    protected $allowedFields = [
        'pengumuman_nama', 
        'pengumuman_text', 
        'pengumuman_viewer', 
        'pengumuman_updateby', 
        'pengumuman_ptj', 
        'pengumuman_created', 
        'pengumuman_mailstate'
    ];
    
    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

    public function getNews()
    {
        $builder = $this->anjungDB->table('pengumuman a'); 
        $builder->join('kategori_pengumuman b', 'a.pengumuman_viewer = b.cat_news_id', 'left');               
        $query = $builder->get();
        return $query->getResult();         
    }

    public function getCatNews(){
        $builder = $this->anjungDB->table('kategori_pengumuman');        
        $query = $builder->get();
        return $query->getResult();
    }

    public function save_news($data)
    {             
        return $this->ignore(true)->insert($data);
    }

    public function getUserProfile($nok)
    {
        $builder = $this->anjungDB->table('users a');        
        $builder->join('roles b', 'a.role = b.roleid', 'left');        
        $builder->where('a.NoK', $nok);        

        $query = $builder->get();
        return $query->getResult();
    }
}