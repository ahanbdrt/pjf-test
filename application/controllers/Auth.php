<?php
class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'username harus di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'password harus di isi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/header');
            $this->load->view('login');            
        } else {
            $auth = $this->auth_model->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Username atau Password Anda Salah!
</div>');
                redirect('auth/login');
            } else {

                $this->session->set_userdata('fullname', $auth->fullname);
                $this->session->set_userdata('user_id', $auth->user_id);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('tgl_test', $auth->tgl_test);
                $this->session->set_userdata('role', $auth->role);
                switch ($auth->role) {
                    case 'admin':
                        redirect('dashboard');
                        break;
                    case 'pelamar':
                        redirect('home');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function register(){
        $data["tgl_test"] = $this->db->get('jadwal_test');
        $this->load->view('partials/header');
        $this->load->view('register',$data);
    }

    public function daftar(){
        $fullname = $this->input->post('fullname');
        $tgl_test = $this->input->post('tgl_test');
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

        if ($password == $passwordr){
            $data=array(
                'username' => $urutan,
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
                $this->session->set_flashdata('sukses', 'Pendaftaran akun <b>'.$fullname.'</b> berhasil<br>dengan No. urut <b>'.$urutan.'</b><br> dan Tgl tes<br><b>'.$mulai.'</b> s/d<b> '.$selesai.'</b><br><b>Mohon untuk dicatat!</b>');
            }
        }else{
            $this->session->set_flashdata('error', 'password tidak cocok!');
        }
            redirect('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Anda Berhasil Logout
</div>');
        redirect('auth/login');
    }
}