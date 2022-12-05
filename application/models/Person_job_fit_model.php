<?php 
class Person_job_fit_model extends CI_Model
{
    public function tampil_pjf(){
        return $this->db->get('person-job-fit');
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