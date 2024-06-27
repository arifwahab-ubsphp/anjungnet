<?php 
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class Home_m extends Model
{
    protected $DBGroup = 'anjungnet';
    protected $table = 'users';
    protected $primaryKey = 'NoKP';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    
    // protected $allowedFields = ['userid', 'fname', 'nok', 'nokp', 'email', 'ptj', 'role', 'userstat'];

    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
    }

    public function getAll()
    {
        $builder = $this->anjungDB->table('users');        
        return $query = $builder->get();            
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
