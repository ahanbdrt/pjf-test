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
        $data["tgl_test"] = $this->db->get('jadwal_test');
        $data['pelamar'] = $this->pelamar_model->tampil_pelamar();
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('admin/pelamar',$data);
        $this->load->view('partials/footer');
    }
    public function daftar(){
        $fullname = $this->input->post('fullname');
        $tgl_test = $this->input->post('tgl_test');
        $email = $this->input->post('email');
        $tgl = $this->db->where('id',$tgl_test)->get('jadwal_test');
        foreach($tgl->result() as $t){
            $mulai = $t->mulai;
            $selesai = $t->selesai;
        }
        $password = $this->input->post('password');
        $passwordr = $this->input->post('passwordr');
        $query = $this->db->where('role','pelamar')->order_by("user_id", "DESC")->limit(1)->get('user');
        foreach($query->result() as $q){
            $noU = $q->username;
        }
        if(!isset($noU)){
            $noU = 0;
        }
        $bln = date("m");
        $thn = date("y");
        $blnU= sprintf("%02d",(int) substr($noU,3,2));
        $thnU= sprintf("%02d",(int) substr($noU,5,2));

        if($bln==$blnU && $thn==$thnU){
            $noUrut = (int) substr($noU,0,3);
        }else{
            $noUrut = 0;
        }
        $urut = (int) $noUrut+1;
        $urutan = sprintf("%03d",$urut).$bln.$thn;
            $data=array(
                'username' => $urutan,
                'email'    => $email,
                'password' => md5($passwordr),
                'fullname' => $fullname,
                'tgl_test'   => $tgl_test,
                'role'     => 'pelamar'
            );
            $this->db->trans_start();
            $this->db->insert('user',$data);
            $this->db->trans_complete();
            if($this->db->trans_status()===FALSE){
                $this->session->set_flashdata('gagal', 'Pendaftaran gagal!');
            }else{
                $this->session->set_flashdata('berhasil', 'Pendaftaran akun <b>'.$fullname.'</b> berhasil<br>dengan No. urut <b>'.$urutan.'</b><br> dan Tanggal tes<br><b>'.$mulai.'</b> s/d<b> '.$selesai.'</b><br><b>Mohon untuk dicatat!</b>');
            }
            redirect('pelamar');
    }
    public function edit(){
        $user_id = $this->input->post('user_id');
        $fullname = $this->input->post('fullname');
        $tgl_test = $this->input->post('tgl_test');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array('user_id'=>$user_id);
        if ($password!="") {
            $data = array(
                'fullname' => $fullname,
                'tgl_test' => $tgl_test,
                'email' => $email,
                'password'=>md5($password)
            );
        }else{
            $data = array(
                'fullname' => $fullname,
                'tgl_test' => $tgl_test,
                'email' => $email,
            );

        }
            $this->db->trans_start();
            $this->db->where($where);
            $this->db->update('user',$data);
            $this->db->trans_complete();
            if($this->db->trans_status()===FALSE){
                $this->session->set_flashdata('gagal', 'Data pelamar gagal di edit!');
            }else{
                $this->session->set_flashdata('sukses', 'Data pelamar berhasil di edit!');
            }
            redirect('pelamar');
    }
    public function hapus($uid){
        $where = array('user_id'=>$uid);
        $this->db->trans_start();
        $this->pelamar_model->hapus($where,'user');
        $this->db->trans_complete();
        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal', 'Data pelamar gagal di hapus!');
        }else{
            $this->session->set_flashdata('sukses', 'Data pelamar berhasil di hapus!');
        }
        redirect('pelamar');

    }
}