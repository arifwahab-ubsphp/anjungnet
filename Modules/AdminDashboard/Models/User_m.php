<?php
namespace Modules\AdminDashboard\Models;

use CodeIgniter\Model;

class User_m extends Model
{
    protected $DBGroup = 'inteam';
    protected $table = 'users';
    protected $primaryKey = 'NoKP';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['userid', 'fname', 'nok', 'nokp', 'email', 'ptj', 'role', 'userstat'];

    protected $inteamDB;

    public function __construct()
    {
        parent::__construct();
        $this->inteamDB = \Config\Database::connect('inteam');
    }

    public function selectAll()
    {
        return $this->findAll();
    }

    public function selectAllWithJoin()
    {
        return $this->db->table($this->table)
            ->select('*')
            ->join('role', 'user_login.user_role = role.role_id', 'left')
            ->where('user_status', 'AKTIF')
            ->orderBy('user_id', 'asc')
            ->get()
            ->getResult();
    }

    public function simpan_user($parm_data, $nok)
    {
        $query = $this->db->table($this->table)->where('user_nok', $nok)->get();
        $semak_nok = $query->getNumRows();

        if ($semak_nok !== 0) {
            return false;
        }

        $insertQuery = $this->db->table($this->table)->insert($parm_data);
        return $insertQuery ? true : false;
    }

    public function hapus_user($id)
    {
        return $this->db->table($this->table)->delete(['user_id' => $id]);
    }

    public function get_user($id)
    {
        return $this->db->table($this->table)->where('user_id', $id)->get()->getResult();
    }

    public function count_user_bynok($nok)
    {
        return $this->db->table($this->table)->where('user_nok', $nok)->countAllResults();
    }

    public function get_role_list()
    {
        return $this->db->table('role')
            ->select('role_id, role_desc')
            ->get()
            ->getResult();
    }

    public function get_role_desc($role_id)
    {
        $query = $this->db->table('role')
            ->select('role_id, role_desc')
            ->where('role_id', $role_id)
            ->get();

        return $query->getNumRows() >= 1 ? $query->getResult() : [];
    }

    public function kemaskini_user($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['user_id' => $id]);
    }

    public function record_count($search = '')
    {
        $builder = $this->db->table($this->table)
            ->join('role', 'user_login.user_role = role.role_id', 'left');

        if ($search != '') {
            $builder->groupStart()
                ->like('user_jenis', $search)
                ->orLike('user_name', $search)
                ->orLike('user_access', $search)
                ->orLike('role.role_desc', $search)
                ->groupEnd();
        }

        return $builder->countAllResults();
    }

    public function selectAllWithLimit($limit, $record_start, $search = '')
    {
        $builder = $this->db->table($this->table)
            ->join('role', 'user_login.user_role = role.role_id', 'left')
            ->limit($limit, $record_start);

        if ($search != '') {
            $builder->groupStart()
                ->like('user_jenis', $search)
                ->orLike('user_name', $search)
                ->orLike('user_access', $search)
                ->orLike('role.role_desc', $search)
                ->groupEnd();
        }

        return $builder->get()->getResult();
    }

    public function cari_user($carian)
    {
        return $this->db->table($this->table)->where('user_jenis', $carian)->get()->getResult();
    }

    public function cari_user_bynokp($nokp)
    {
        return $this->db->table($this->table)->where('user_kp', $nokp)->get()->getResult();
    }

    public function inteam_get_staflist()
    {
        return $this->db->table('peribadi a')
            ->select('a.NoK, a.Nama, a.NoKP, a.Email, b.KodTempatKerja, c.NPusat, c.KodPusat')
            ->join('perkhidmatan b', 'a.NoK = b.NoK', 'left')
            ->join('ja_pusat c', 'c.KodPusatSispen = b.KodTempatKerja', 'left')
            ->where('b.Kategori', '1')
            ->orderBy('a.Nama', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_get_stesenlist()
    {
        return $this->db->table('ja_stesen')
            ->select('NStesen1, KodStesen')
            ->where('status', '1')
            ->orderBy('NStesen1', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_get_ptjlist()
    {
        return $this->db->table('ja_pusat')
            ->select('KodPusatSispen, KodPusat, NPusat')
            ->where('stat', '1')
            ->orderBy('KodPusat', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_get_ptjlist_report_all()
    {
        return $this->db->table('ja_pusat')
            ->where('stat', '1')
            ->whereNotIn('KodPusat', ['IA', 'IN', 'GL'])
            ->orderBy('KodPusat', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_get_stesenbykod($kodstesen)
    {
        return $this->db->table('ja_stesen')
            ->select('NStesen1, KodStesen')
            ->where('status', '1')
            ->where('KodStesen', $kodstesen)
            ->orderBy('NStesen1', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_get_ptjbykod($kodptj)
    {
        return $this->db->table('ja_pusat')
            ->select('KodPusatSispen, KodPusat, NPusat')
            ->where('stat', '1')
            ->groupStart()
                ->where('KodPusatSispen', $kodptj)
                ->orWhere('KodPusat', $kodptj)
            ->groupEnd()
            ->orderBy('NPusat', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_get_user($nok)
    {
        $builder = $this->inteamDB->table('peribadi a');
        $builder->select('a.NoK, e.Panggil, a.Nama, a.NoKP, b.Email, b.KodTempatKerja, c.NPusat, c.KodPusat, d.NStesen, d.NStesen1, d.NStesen15, d.Alamat1_Lokasi, d.Alamat2_Lokasi, d.Poskod_Lokasi, d.Bandar_Lokasi, d.KodStesen, d.Negeri');
        $builder->join('perkhidmatan b', 'a.NoK = b.NoK', 'left');
        $builder->join('ja_pusat c', 'c.KodPusatSispen = b.KodTempatKerja', 'left');
        $builder->join('ja_stesen d', 'd.KodStesen= b.SubTempatKerja', 'left');
        $builder->join('ja_panggilan e', 'a.Panggil = e.Id', 'left');
        $builder->where('b.Kategori', '1');
        $builder->where('c.stat', '1');
        $builder->where('d.status', '1');
        $builder->where('b.KodTempatKerja', $nok);
        $builder->orLike('a.NoK', $nok);
        $builder->orderBy('a.Nama', 'asc');

        $query = $builder->get();
        return $query->getResult();
    }

    public function inteam_cari_userptj($keyword, $ptj)
    {
        return $this->db->table('peribadi a')
            ->select('a.NoK, a.Nama, a.NoKP, b.Email, b.KodTempatKerja, c.NPusat, c.KodPusat')
            ->join('perkhidmatan b', 'a.NoK = b.NoK', 'left')
            ->join('ja_pusat c', 'c.KodPusatSispen = b.KodTempatKerja', 'left')
            ->where('b.Kategori', '1')
            ->where('b.KodTempatKerja', $ptj)
            ->groupStart()
                ->like('a.Nama', $keyword)
                ->orLike('a.NoK', $keyword)
                ->orLike('a.NoKP', $keyword)
            ->groupEnd()
            ->orderBy('a.Nama', 'asc')
            ->get()
            ->getResult();
    }

    public function inteam_cari_user($keyword)
    {
        return $this->db->table('peribadi a')
            ->select('a.NoK, a.Nama, a.NoKP, b.Email, b.KodTempatKerja, c.NPusat, c.KodPusat')
            ->join('perkhidmatan b', 'a.NoK = b.NoK', 'left')
            ->join('ja_pusat c', 'c.KodPusatSispen = b.KodTempatKerja', 'left')
            ->where('b.Kategori', '1')
            ->groupStart()
                ->like('a.Nama', $keyword)
                ->orLike('a.NoK', $keyword)
                ->orLike('a.NoKP', $keyword)
            ->groupEnd()
            ->orderBy('a.Nama', 'asc')
            ->get()
            ->getResult();
    }

    public function get_peribadi($nokp)
    {
        return $this->db->table('peribadi')
            ->select('*')
            ->where('NoKP', $nokp)
            ->get()
            ->getResult();
    }

    public function get_senarai_ptj()
    {
        return $this->db->table('ja_pusat')
            ->select('KodPusatSispen, KodPusat, NPusat')
            ->where('stat', '1')
            ->orderBy('NPusat', 'asc')
            ->get()
            ->getResult();
    }

    public function get_peribadi_carian($nokp)
    {
        return $this->db->table('peribadi')
            ->select('*')
            ->where('NoKP', $nokp)
            ->get()
            ->getResult();
    }
}
