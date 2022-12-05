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
        $this->load->view('partials/header');
        $this->load->view('register');
    }

    public function daftar(){
        $username = $this->input->post('username');
        $fullname = $this->input->post('fullname');
        $password = $this->input->post('password');
        $passwordr = $this->input->post('passwordr');
        $cek = $this->db->where('username',$username)->get('user');

            $data=array(
                'username' => $username,
                'password' => md5($passwordr),
                'fullname' => $fullname,
                'status'   => 'belum isi',
                'role'     => 'pelamar'
            );
            $this->db->insert('user',$data);
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