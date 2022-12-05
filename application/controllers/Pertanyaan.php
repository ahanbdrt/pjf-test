<?php
class Pertanyaan extends CI_Controller
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
    
    public function pertanyaan_big5(){
        $data['big5'] = $this->pertanyaan_model->tampil_big_five();
        $data['faktor'] = $this->faktor_model->tampil_faktor();
        $this->load->view("partials/header");
        $this->load->view("partials/sidebar");
        $this->load->view('admin/pertanyaan_big5',$data);
        $this->load->view("partials/footer");
    }
    
    public function input_pertanyaan_big5()
    {
        $pertanyaan = $this->input->post('pertanyaan');
        $kategori =  $this->input->post('kategori');
        $faktor =  $this->input->post('faktor');
        $jumlah = $this->db->get('big_five');
        $id = $jumlah->num_rows() + 1;

        $data=array(
            'id_soal'=>$id,
            'isi_soal'=>$pertanyaan,
            'kategori'=>$kategori,
            'faktor'=>$faktor,
            'jenis'=>'big5'
        );

        $this->db->trans_start();
        $this->pertanyaan_model->tambah($data,'big_five');
        $this->db->trans_complete();

        if($this->db->trans_status() === FALSE){
            $this->session->set_flashdata('gagal','Pertanyaan big five gagal ditambah!');
        }else{
            $this->session->set_flashdata('sukses','Pertanyaan big five berhasil ditambah!');
        }
        redirect('pertanyaan/pertanyaan_big5');
    }

    public function edit_pertanyaan_big5()
    {
        $pertanyaan = $this->input->post('pertanyaan');
        $kategori =  $this->input->post('kategori');
        $faktor =  $this->input->post('faktor');
        $id_soal =  $this->input->post('id_soal');

        $data=array(
            "isi_soal" => $pertanyaan,
            "kategori" => $kategori,
            "faktor"   => $faktor,
        );
        $where=array(
            "id_soal"=>$id_soal
        );
        $this->pertanyaan_model->update($where,$data,'big_five');
        redirect("pertanyaan/pertanyaan_big5");
    }

    public function hapus_pertanyaan($id)
    {
        $where=array('id_soal'=>$id);
        $this->db->trans_start();
        $this->pertanyaan_model->hapus($where,'big_five');
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE)
        {
            $this->session->set_flashdata('gagal','Pertanyaan gagal dihapus!');
        }else{
            $this->session->set_flashdata('sukses','Pertanyaan berhasil dihapus!');
        }
        redirect('pertanyaan/pertanyaan_big5');
    }
}