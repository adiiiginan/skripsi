<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_model
{
    function login($username, $pass)
    {
        // $this->db->where('username',$username);
        // $this->db->where('password',$pass);
        // return $result = $this->db->get('users',1);

        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\"  AND password = \"{$pass}\"";

        $result = $this->db->query($query)->result_array();

        return $result;
    }


    function add()
    {
        $data1 = [
            "username" => $this->input->post('npm', true),
            "password" => md5($this->input->post('password', true)),
            "usertype" => 3
        ];
        $this->db->insert('users', $data1);

        $data2 = [
            "npm" => $this->input->post('npm', true),
            "nama" => $this->input->post('nama', true),
            "gender" => $this->input->post('gender', true),
            "angkatan" => $this->input->post('angkatan', true),
            "kelas" => $this->input->post('kelas', true),
            "konsentrasi" => $this->input->post('konsentrasi', true),
            "email" => $this->input->post('email', true),
            "telp" => $this->input->post('telp', true)
        ];
        $this->db->insert('mahasiswa', $data2);
    }


    function is_role()
    {
        return $this->session->userdata('usertype');
    }
}
