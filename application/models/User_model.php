<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{

    public function getuser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row();
    }


    public function getRole()
    {
        $query = "SELECT users .*, user_role . usertype
                  FROM users JOIN user_role
                  ON users . usertype = user_role . id 
                  ";
        return $this->db->query($query)->result_array();
    }

    public function updatePassword($username, $newPassword)
    {
        $data = array(
            'password' => md5($newPassword)
        );

        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

    public function getUserby($npm)
    {
        $this->db->where('npm', $npm);
        return $this->db->get('mahasiswa')->row();
    }


    public function newpass($new, $username)
    {
        $newpass = $new;
        $this->db->set('password', $newpass);
        $this->db->where('username', $username);
        return $this->db->update('users');
    }
}
