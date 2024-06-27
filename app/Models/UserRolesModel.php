<?php

namespace Modules\User\Models;

use CodeIgniter\Model;

class UserRolesModel extends Model
{
   protected $DBGroup          = 'default';
   protected $table            = 'user_roles';
   protected $primaryKey       = 'user_id';
   protected $useAutoIncrement = false;
   protected $returnType       = 'object';
   protected $useSoftDeletes   = false;
   protected $protectFields    = true;
   protected $allowedFields    = ['user_id', 'role_id'];
   protected $useTimestamps = false;
   protected $dateFormat    = 'datetime';
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';
   protected $deletedField  = 'deleted_at';

   // Validation
   protected $validationRules      = [];
   protected $validationMessages   = [];
   protected $skipValidation       = false;
   protected $cleanValidationRules = true;

   // Callbacks
   protected $allowCallbacks = true;
   protected $beforeInsert   = [];
   protected $afterInsert    = [];
   protected $beforeUpdate   = [];
   protected $afterUpdate    = [];
   protected $beforeFind     = [];
   protected $afterFind      = [];
   protected $beforeDelete   = [];
   protected $afterDelete    = [];
}
