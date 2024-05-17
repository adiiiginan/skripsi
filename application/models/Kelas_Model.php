<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kelas_model extends CI_model
{
    public function getAll()
    {
        return $this->db->get('kelas')->result_array();
    }


    public function add()
    {
        $data = [
            "kelas" => $this->input->post('kelas', true),
            "jurusan" => $this->input->post('jurusan', true),
            "sub" => $this->input->post('jumlah', true)
        ];

        $this->db->insert('kelas', $data);
    }

    public function delete($id)
    {
        $this->db->trans_start();
        $this->db->delete('kelas', ['id_kelas' => $id]);
        $this->db->delete('kuesioner_tmp', ['id_kelas' => $id]);
        $this->db->trans_complete();
    }
}
