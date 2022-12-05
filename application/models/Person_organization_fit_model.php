<?php 
class Person_organization_fit_model extends CI_Model
{
    public function tampil_pof(){
        return $this->db->get('person-organization-fit');
    }

    public function tambah($data,$table){
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