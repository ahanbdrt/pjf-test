<?php
class Person_organization_fit extends CI_Controller
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
        $data['pof'] = $this->person_organization_fit_model->tampil_pof();
        $this->load->view("partials/header");
        $this->load->view("partials/sidebar");
        $this->load->view("admin/person-organization-fit",$data);
        $this->load->view("partials/footer");
    }
public function input_pof(){
        $pertanyaan = $this->input->post('pertanyaan');
        $baris = $this->person_organization_fit_model->tampil_pof();
        $id = $baris->num_rows()+1;

        $data=array(
            'id_pof' => $id,
            'isi_pof'=> $pertanyaan
        );
        $this->db->trans_start();
        $this->person_organization_fit_model->tambah($data,'person-organization-fit');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal', 'Pertanyaan gagal ditambahkan!');
        }else{
            $this->session->set_flashdata('sukses', 'Pertanyaan berhasil ditambahkan!');
        }

        redirect('person_organization_fit');
    }

    public function edit(){
        $pertanyaan = $this->input->post('pertanyaan');
        $id = $this->input->post('id_pof');

        $data=array('isi_pof' =>$pertanyaan);
        $where=array('id_pof'=>$id);

        $this->db->trans_start();
        $this->person_organization_fit_model->update($where,$data,'person-organization-fit');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Pertanyaan gagal diedit!');
        }else{
            $this->session->set_flashdata('sukses','Pertanyaan berhasil diedit!');
        }
        redirect('person_organization_fit');
    }

    public function hapus($id){
        $where = array('id_pof' => $id);
        $this->db->trans_start();
        $this->person_organization_fit_model->hapus($where,'person-organization-fit');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal', 'Pertanyaan gagal dihapus!');
        }else{
            $this->session->set_flashdata('sukses', 'Pertanyaan berhasil dihapus!');
        }
        redirect('person_organization_fit');
    }
} 