<?php 
namespace Modules\Dashboard\Models;

use CodeIgniter\Model;

class Login_m extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'userid';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'data_created';
    protected $updatedField  = 'data_updated';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function _auth_user($nokp){

    	$builder = $this->db->table('users');
    	$builder->where('nokp',$nokp);    	
        $query = $builder->get();    	
        return $query->getResult();
    }

    public function _update_user($parm_id, $data)
    {
        $builder = $this->db->table('users');
        $builder->where('userid', $parm_id)
                ->update($data);
        return true;
    }

}