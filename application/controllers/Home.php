<?php 
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') == 'admin') {
            $redirect = base_url('dashboard');
            echo "<script>window.alert('anda tidak bisa mengakses halaman ini!'); window.location='$redirect'</script>";
        }elseif($this->session->userdata('role') != 'pelamar')
        {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
    Anda Belum Login!
    </div><br>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $this->load->view("partials/header");
        $this->load->view("partials/top-navbar");
        $this->load->view('home');
        $this->load->view("partials/footer");
    }
}