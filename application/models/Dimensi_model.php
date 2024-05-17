<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dimensi_model extends CI_model
{

    function getDimensi()
    {
        return $this->db->get('Dimensi')->result();
    }


    public function insert_relasi($data)
    {
        $this->db->insert('soal_matakuliah', $data);
        return TRUE;
    }

    public function deleteAspek($id)
    {
        $this->db->trans_start();
        $this->db->delete('soal_matakuliah', array('id_soal_aspek' => $id));
        $this->db->trans_complete();
    }
}
