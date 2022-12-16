<?php
class Jadwal_model extends CI_Model 
{
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