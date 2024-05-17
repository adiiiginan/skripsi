<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah_model extends CI_model
{

    function add()
    {
        $data = [
            "kode_matakuliah" => $this->input->post('kode_matakuliah', true),
            "matakuliah" => $this->input->post('matakuliah', true),
        ];
        $this->db->insert('master_matakuliah', $data);
    }

    function addmk()
    {
        $data = [
            "idmk" => $this->input->post('idmk', true),
            "iddsn" => $this->input->post('iddsn', true),
        ];
        $this->db->insert('matakuliah', $data);
    }

    function addthn()
    {
        $data = [
            "tahun" => $this->input->post('tahun', true),
            "semester" => $this->input->post('semester', true),
        ];
        $this->db->insert('akademik', $data);
    }

    function addkls()
    {
        $data = [
            "idmk" => $this->input->post('idmk', true),
            "iddsn" => $this->input->post('iddsn', true),
            "kelas" => $this->input->post('kelas', true),
            "akademik" => $this->input->post('akademik', true),
        ];
        $this->db->insert('kelas_matakuliah', $data);
    }


    function getkls()
    {
        return $this->db->get_where('v_kelas_matakuliah')->result_array();
    }

    function getdetailkls($idkm)
    {
        return $this->db->get_where('v_kelas_matakuliah', ['idkm' => $idkm])->result_array();
    }

    function deletekls($idkm)
    {
        $this->db->delete('kelas_matakuliah', ['idkm' => $idkm]);
    }

    function thn()
    {
        $query = "SELECT YEAR(CURRENT_DATE) AS tahun UNION ALL SELECT YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 1 YEAR)) AS tahun 
      UNION ALL SELECT YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 2 YEAR)) AS tahun
      UNION ALL SELECT YEAR(DATE_SUB(CURRENT_DATE, INTERVAL 3 YEAR)) AS tahun ORDER BY tahun DESC";

        $result = $this->db->query($query)->result_array();

        return $result;
    }


    function getthn()
    {
        return $this->db->get_where('akademik')->result_array();
    }

    function deletethn($idthn)
    {
        $this->db->delete('akademik', ['id_akademik' => $idthn]);
    }

    function getMK()
    {
        return $this->db->get_where('v_matakuliah')->result_array();
    }

    function getmaster()
    {
        return $this->db->get_where('master_matakuliah')->result_array();
    }


    function deleteM($idmk)
    {
        $this->db->delete('master_matakuliah', ['idmk' => $idmk]);
    }

    public function MKExists($idmk, $iddsn)
    {
        $this->db->where('idmk', $idmk);
        $this->db->where('iddsn', $iddsn);
        $query = $this->db->get('kelas_matakuliah');
        return $query->num_rows() > 0;
    }

    public function KMExists($idmk, $iddsn, $kelas, $akademik)
    {
        $this->db->where('idmk', $idmk);
        $this->db->where('iddsn', $iddsn);
        $this->db->where('kelas', $kelas);
        $this->db->where('akademik', $akademik);
        $query = $this->db->get('kelas_matakuliah');
        return $query->num_rows() > 0;
    }

    public function AKAExists($tahun, $semester)
    {
        $this->db->where('tahun', $tahun);
        $this->db->where('semester', $semester);
        $query = $this->db->get('akademik');
        return $query->num_rows() > 0;
    }

    public function genKode()
    {

        $this->db->select_max('kode_matakuliah', 'max_kode');
        $this->db->from('master_matakuliah');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $max_kode = $row->max_kode;
            }
            $max_kode = (int) substr($max_kode, 1, 3);
            $max_kode++;
            $kode_matakuliah = 'M' . sprintf("%03s", $max_kode);
        } else {
            $kode_matakuliah = 'M001';
        }
        return $kode_matakuliah;
    }
}
