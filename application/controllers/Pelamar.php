<?php
class Pelamar extends CI_Controller
{
    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('admin/pelamar');
        $this->load->view('partials/footer');
    }
}