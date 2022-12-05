<?php 
class Pertanyaan_model extends CI_Model
{
    public function tampil_big_five()
    {
        return $this->db->join('faktor','faktor.id_faktor = big_five.faktor')->get('big_five');
    }
    public function jawab($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function tambah($data,$table)
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