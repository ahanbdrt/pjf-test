<?php 
class Pelamar_model extends CI_Model
{
    public function tampil_pelamar()
    {
        return $this->db->where("role",'pelamar')->join("jadwal_test","jadwal_test.id = user.tgl_test")->get('user');
    }
    public function insert($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}