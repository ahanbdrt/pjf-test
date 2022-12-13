<?php
class Jadwal extends CI_Controller
{
    public function index()
    {
        $data['jadwal'] = $this->db->get("jadwal_test");
        $this->load->view("partials/header");
        $this->load->view("partials/sidebar");
        $this->load->view("admin/jadwal",$data);
        $this->load->view("partials/footer");
    }
}