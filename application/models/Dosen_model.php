<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_model
{

    function add()
    {
        $data1 = [
            "username" => $this->input->post('nidn', true),
            "password" => md5($this->input->post('nidn', true)),
            "usertype" => 2
        ];
        $this->db->insert('users', $data1);

        $data2 = [
            "nidn" => $this->input->post('nidn', true),
            "nama" => $this->input->post('nama', true),
            "jafung" => $this->input->post('jafung', true),
            "email" => $this->input->post('email', true),
            "telp" => $this->input->post('telp', true),
        ];
        $this->db->insert('dosen', $data2);
    }

    function getDosen()
    {
        return $this->db->get_where('dosen', ['iddsn'])->result_array();
    }

    function getJabatan()
    {
        return $this->db->get('Jabatan')->result();
    }

    function deleteDosen($nidn)
    {
        $this->db->delete('dosen', ['nidn' => $nidn]);
        $this->db->delete('users', ['username' => $nidn]);
    }

    function deletepeserta($idkm, $npm)
    {
        $this->db->where('idkm', $idkm);
        $this->db->where('username', $npm);
        $this->db->delete('matakuliah_mhs');
        return $this->db->affected_rows() > 0;
    }

    public function updateProfile($data, $nidn, $nama, $jafung, $email, $telp)
    {
        $data = array(
            'nidn' => $nidn,
            'nama' => $nama,
            'jafung' => $jafung,
            'email' => $email,
            'telp' => $telp
        );

        $this->db->where('nidn', $nidn);
        $this->db->update('dosen', $data);
    }
}
