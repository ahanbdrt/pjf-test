<?php
class Jawaban_model extends CI_Model
{
    public function tampil_jawaban()
    {
        $this->db->select("*");
        $this->db->from("jawaban");
        $this->db->join("faktor", "jawaban.faktor = faktor.id_faktor");
        $this->db->join("user", "jawaban.pelamar = user.user_id");
        return $this->db->get();
    }
    public function insert($data,$table)
    {
        $this->db->insert($table,$data);
    }
    public function update($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}