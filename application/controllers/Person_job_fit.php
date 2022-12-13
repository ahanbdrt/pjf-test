<?php
class Person_job_fit extends CI_Controller
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

    public function index(){
        $data['pjf'] = $this->person_job_fit_model->tampil_pjf();
        $this->load->view("partials/header");
        $this->load->view("partials/sidebar");
        $this->load->view("admin/person-job-fit",$data);
        $this->load->view("partials/footer");
    }

    public function input_pjf(){
        $pertanyaan = $this->input->post('pertanyaan');
        $baris = $this->person_job_fit_model->tampil_pjf();
        $id = $baris->num_rows()+1;

        $data=array(
            'id_pjf' => $id,
            'isi_pjf'=> $pertanyaan
        );
        if($pertanyaan != null){
        $this->db->trans_start();
        $this->person_job_fit_model->tambah($data,'person-job-fit');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE && $pertanyaan == ""){
            $this->session->set_flashdata('gagal', 'Pertanyaan gagal ditambahkan!');
        }else{
            $this->session->set_flashdata('sukses', 'Pertanyaan berhasil ditambahkan!');
        }
    }else{
        $this->session->set_flashdata('peringatan', 'Mohon untuk melengkapi pertanyaan!');
    }

        redirect('person_job_fit');
    }

    public function edit(){
        $pertanyaan = $this->input->post('pertanyaan');
        $id = $this->input->post('id_pjf');

        $data=array('isi_pjf' =>$pertanyaan);
        $where=array('id_pjf'=>$id);

        if($pertanyaan != null){
        $this->db->trans_start();
        $this->person_job_fit_model->update($where,$data,'person-job-fit');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Pertanyaan gagal diedit!');
        }else{
            $this->session->set_flashdata('sukses','Pertanyaan berhasil diedit!');
        }
    }else{
        $this->session->set_flashdata('peringatan', 'Mohon untuk melengkapi pertanyaan!');
    }
        redirect('person_job_fit');
    }

    public function hapus($id){
        $where = array('id_pjf' => $id);
        $this->db->trans_start();
        $this->person_job_fit_model->hapus($where,'person-job-fit');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal', 'Pertanyaan gagal dihapus!');
        }else{
            $this->session->set_flashdata('sukses', 'Pertanyaan berhasil dihapus!');
        }
        redirect('person_job_fit');
    }
} 