<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    function getMHS()
    {
        return $this->db->get_where('mahasiswa')->result_array();
    }

    public function deleteMHS($npm)
    {
        $this->db->delete('mahasiswa', ['npm' => $npm]);
        $this->db->delete('users', ['username' => $npm]);
        $this->db->delete('matakuliah_mhs', ['username' => $npm]);
    }


    public function getnpm()
    {
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  
        where email = 'andrianmuhamad52@gmail.com'";
        return $this->db->query($query)->result_array();
    }

    function Addkls($idkm, $username)
    {
        $this->db->trans_start();
        $result = array();
        foreach ($idkm as $key => $val) {
            $result[] = array(
                'username'      => $username,
                'idkm'      => $_POST['idkm'][$key]
            );
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('matakuliah_mhs', $result);
        $this->db->trans_complete();
    }

    function deletekls($id)
    {
        $this->db->delete('matakuliah_mhs', ['id' => $id]);
    }

    public function updateProfile($data, $npm, $nama, $gender, $kelas, $angkatan, $konsentrasi, $email, $telp)
    {
        $data = array(
            'npm' => $npm,
            'nama' => $nama,
            'gender' => $gender,
            'angkatan' => $angkatan,
            'kelas' => $kelas,
            'konsentrasi' => $konsentrasi,
            'email' => $email,
            'telp' => $telp
        );

        $this->db->where('npm', $npm);
        $this->db->update('mahasiswa', $data);
    }
}
