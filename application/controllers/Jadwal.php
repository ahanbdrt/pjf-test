<?php
class Jadwal extends CI_Controller
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
        $data['jadwal'] = $this->db->get("jadwal_test");
        $this->load->view("partials/header");
        $this->load->view("partials/sidebar");
        $this->load->view("admin/jadwal_test",$data);
        $this->load->view("partials/footer");
    }

    public function tambah(){
        $tgl_mulai = substr($this->input->post('mulai'),0,10);
        $wktu_mulai = substr($this->input->post('mulai'),11,5);
        $tgl_selesai = substr($this->input->post('selesai'),0,10);
        $wktu_selesai = substr($this->input->post('selesai'),11,5);

        $mulai = $tgl_mulai.' '.$wktu_mulai.':00';
        $selesai = $tgl_selesai.' '.$wktu_selesai.':00';
               
        $data=array(
            'mulai' => $mulai,
            'selesai'=> $selesai,
        );
        $this->db->trans_start();
        $this->jadwal_model->insert($data,'jadwal_test');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Jadwal gagal di tambah!');
        }else{
            $this->session->set_flashdata('sukses', 'Jadwal berhasil di tambah!');
        }
        redirect('jadwal');
    }

    public function edit(){
        $tgl_mulai = substr($this->input->post('mulai'),0,10);
        $wktu_mulai = substr($this->input->post('mulai'),11,5);
        $tgl_selesai = substr($this->input->post('selesai'),0,10);
        $wktu_selesai = substr($this->input->post('selesai'),11,5);
        $id = $this->input->post('id');

        $mulai = $tgl_mulai.' '.$wktu_mulai.':00';
        $selesai = $tgl_selesai.' '.$wktu_selesai.':00';

        $data = array(
            'mulai' => $mulai,
            'selesai' => $selesai,
        );
        $where = array('id'=>$id);

        $this->db->trans_start();
        $this->jadwal_model->update($where,$data,'jadwal_test');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Jadwal gagal di edit!');
        }else{
            $this->session->set_flashdata('sukses', 'Jadwal berhasil di edit!');
        }
        redirect('jadwal');
    }

    public function hapus($id){
        $where=array('id'=>$id);
        $this->db->trans_start();
        $this->jadwal_model->hapus($where,'jadwal_test');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Jadwal gagal di hapus!');
        }else{
            $this->session->set_flashdata('sukses', 'Jadwal berhasil di hapus!');
        }
        redirect('jadwal');
    }
}