<?php
class auth_model extends CI_Model
{
    public function cek_login()
    {
        $username = set_value('username');
        $password = md5(set_value('password'));

        // $result = $this->db->where('username', $username)->where('password', $password)->limit(1)->get('user');
        $result = $this->db->query("SELECT * FROM user where username='$username' and password='$password' and (status = 'admin' or status = 'belum isi') limit 1");
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
