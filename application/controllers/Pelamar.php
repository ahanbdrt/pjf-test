<?php
class Pelamar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('role') == 'pelamar'){
            $redirect = base_url('home');
            echo "<script>window.alert('anda tidak bisa mengakses halaman ini!'); window.location='$redirect'</script>";
        }
        elseif ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/login');
        }
    }
    
    public function index()
    {
        $data['pelamar'] = $this->pelamar_model->tampil_pelamar();
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('admin/pelamar',$data);
        $this->load->view('partials/footer');
    }
}