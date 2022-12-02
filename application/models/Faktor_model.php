<?php
class Faktor_model extends CI_Model
{
    public function tampil_faktor()
    {
        return $this->db->get('faktor');
    }
}