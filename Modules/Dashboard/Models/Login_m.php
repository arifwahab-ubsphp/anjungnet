<?php 
namespace Modules\Dashboard\Models;

use CodeIgniter\Model;

class Login_m extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'userid';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [];  // Define the fields that are allowed to be inserted or updated.

    protected $useTimestamps = false;
    protected $createdField  = 'data_created';
    protected $updatedField  = 'data_updated';
    

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $inteamDB;
    protected $anjungDB;

    public function __construct()
    {
        parent::__construct();
        $this->anjungDB = \Config\Database::connect('anjungnet');
        $this->inteamDB = \Config\Database::connect('inteam');        
    }
    
    public function authUser($nokp)
    {
        $builder = $this->anjungDB->table('users');
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        return $query->getResult(); 
    }

    public function getUserRole($nokp)
    {
        $builder = $this->anjungDB->table('user_roles');
        $builder->where('usrroles_nokp', $nokp);
        // $builder->where('usrroles_roleid', $roleid);
        $query   = $builder->get();  // Produces: SELECT * FROM mytable
        return $query->getResult(); 
    }    

    public function updateUser($parm_id, $data)
    {
        return $this->update($parm_id, $data);
    }

    public function authInteam($nok)
    {        
        $builder = $this->inteamDB->table('peribadi');
        $builder->select('peribadi.NoK as nok,
             peribadi.NoKP as nokp,  
             peribadi.Panggil, 
             peribadi.Nama as nama,  
             perkhidmatan.GelaranJawatan as gelaranjawatan, 
             perkhidmatan.Email as emel, 
             perkhidmatan.KodProgram as kodprogram, 
             REPLACE(REPLACE(perkhidmatan.TelPejabat,"-",""), " ", "") as telpejabat, 
             REPLACE(REPLACE(perkhidmatan.FaksPejabat,"-",""), " ", "") as fakspejabat,
             perkhidmatan.kodjawpengurusan, 
             REPLACE(REPLACE(perkhidmatan.TelBimbit,"-",""), " ", "") as telbimbit,
             ja_pusat.KodPusat as kodptj,
             ja_pusat.KodPusatSispen as kodpusat,
             ja_pusat.NPusat as ptj, 
             ja_stesen.NStesen1 as namastesen,
             ja_stesen.KodStesen as kodstesen,     
             kodgelaran.gelaran,        
             (select ja_gelar_pengurusan.namajawpengurusan from ja_gelar_pengurusan where status = 1 
             and ja_gelar_pengurusan.NoK = perkhidmatan.NoK LIMIT 1) as namajawpengurusan')
         ->join('perkhidmatan', 'perkhidmatan.NoK = peribadi.NoK', 'inner')
         ->join('ja_pusat', 'perkhidmatan.KodTempatKerja = ja_pusat.KodPusatSispen', 'inner')
         ->join('ja_stesen', 'perkhidmatan.SubTempatKerja = ja_stesen.KodStesen', 'inner')
         ->join('kodgelaran', 'kodgelaran.kodgelaran = peribadi.panggil', 'left')
         ->where('peribadi.NoK', $nok);

        $query = $builder->get();

        if ($query->getNumRows() >= 1)
        {
            // return $query->getRow();
            return $query->getResult(); 
        }
        else
        {
            return false;
        }
    }

    public function _update_user($noKP,$data)
    {        
        $builder = $this->anjungDB->table('users');   
        $builder->where('nokp', $noKP);
        $query = $builder->update($data);

		return $query;
	}
}