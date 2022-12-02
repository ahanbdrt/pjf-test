<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->load->view("partials/header");
        $this->load->view("partials/sidebar");
        $this->load->view('admin/dashboard');
        $this->load->view("partials/footer");
    }
}