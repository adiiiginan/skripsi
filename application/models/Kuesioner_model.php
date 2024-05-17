<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getAllSurveiMatakuliah()
    {
        return $this->db->get('survei_matakuliah')->result_array();
    }
    public function getKuesionerAktif()
    {
        // Mendapatkan tanggal hari ini
        $tanggal_hari_ini = date('Y-m-d'); // Format tanggal YYYY-MM-DD

        // Mengambil data kuesioner yang aktif berdasarkan kode survey
        $this->db->select('tgl_selesai');
        $this->db->where('status', '1');
        $this->db->where('tgl_mulai', $tanggal_hari_ini);
        $query = $this->db->get('survei_matakuliah');

        return $query->result_array();
    }

    public function addKuesioner($idkm, $mulai, $selesai)
    {
        $this->db->trans_start();
        $kodesurvey = $this->genKode();
        //INSERT TO PACKAGE
        $data = [
            'kodesurvey' => $kodesurvey,
            'tgl_mulai' => date_format(date_create($mulai), 'Y-m-d'),
            'tgl_selesai' => date_format(date_create($selesai), 'Y-m-d'),
            'status' => '1'
        ];

        $this->db->insert('survei_matakuliah', $data);
        //GET ID PACKAGE
        $package_id = $this->db->insert_id();
        $result = array();
        foreach ($idkm as $key => $val) {
            $result[] = array(
                'id_survei_matakuliah'      => $package_id,
                'idkm'      => $_POST['idkm'][$key]
            );
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('survei_matakuliah_tmp', $result);
        $this->db->trans_complete();
    }

    public function deleteKuesionerMK($id)
    {
        $this->db->trans_start();
        $this->db->delete('survei_matakuliah', array('id_survei_matakuliah' => $id));
        $this->db->delete('survei_matakuliah_tmp', array('id_survei_matakuliah' => $id));
        // $this->db->delete('aksi_matakuliah', array('id_survei_matakuliah' => $id));
        $this->db->trans_complete();
    }


    //------------------------------------------------------------- pertanyaan

    public function getSoalMK()
    {
        return $this->db->get('soal_matakuliah')->result_array();
    }

    public function addPertanyaanMK($pertanyaan)
    {
        $this->db->trans_start();

        $result = array();
        foreach ($pertanyaan as $key => $val) {
            $result[] = array(
                'pertanyaan'      => $_POST['pertanyaan'][$key]
            );
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('soal_matakuliah', $result);
        $this->db->trans_complete();
    }

    public function deleteAspek($id)
    {
        $this->db->trans_start();
        $this->db->delete('soal_matakuliah', array('id_soal_aspek' => $id));
        $this->db->trans_complete();
    }

    //------------------------------------------survei matakuliah

    public function getSurveiMK()
    {
        $username = $this->session->userdata('username');
        return $this->db->query('SELECT t1.id_survei_matakuliah,t1.tgl_mulai, t1.tgl_selesai,t1.idkm,t1.idmk, 
        t1.iddsn, t1.kelas, t1.nama, t1.matakuliah
        FROM (SELECT * FROM v_s_matakuliah where v_s_matakuliah.username="' . $username . '") 
        t1 LEFT JOIN 
        (SELECT v_s_matakuliah.id_survei_matakuliah,v_s_matakuliah.tgl_mulai, v_s_matakuliah.tgl_selesai,v_s_matakuliah.idkm,v_s_matakuliah.idmk,
        v_s_matakuliah.iddsn, v_s_matakuliah.nama, v_s_matakuliah.kelas, v_s_matakuliah.matakuliah 
        FROM v_s_matakuliah, aksi_matakuliah
        WHERE 
        aksi_matakuliah.id_survei_matakuliah=v_s_matakuliah.id_survei_matakuliah AND aksi_matakuliah.idkm = v_s_matakuliah.idkm  AND 
        aksi_matakuliah.username="' . $username . '") t2 ON (t1.id_survei_matakuliah=t2.id_survei_matakuliah AND 
        t1.idkm = t2.idkm ) where t2.idkm  IS NULL')->result_array();
        // $id_kelas=$this->session->userdata('id_kelas');
        // $nipd=$this->session->userdata('nipd');
        // $this->db->select('*');
        // $this->db->from('v_s_guru');
        // $this->db->where('id_kelas',$id_kelas); 
        // $this->db->where('id_guru NOT IN(select id_guru from aksi_guru where nipd='.$nipd.')'); 
        // $query = $this->db->get(); 
        // return $query->result_array();  
        // return $this->db->get_where('v_s_guru', ['id_kelas'=> $this->session->userdata('id_kelas')])->result_array();
    }

    public function getThisMK($idsm, $idkm)
    {
        // return $this->db->get_where('v_s_matakuliah', ['id_survei_matakuliah' => $idsm, 'idkm' => $idkm, 'username' => $this->session->userdata('username')])->result_array();
        return $this->db->get_where('v_s_matakuliah', ['id_survei_matakuliah' => $idsm, 'idkm' => $idkm, 'username' => $this->session->userdata('username')])->row_array();
    }

    public function addAksiMK($data, $performance, $importance, $saran, $data_main, $data_detail)
    {

        $this->db->trans_start();

        // INSERT TO TABLE aksi_matakuliah
        $this->db->insert('aksi_matakuliah', $data);
        // GET ID INSERTED RECORD
        $aksi_matakuliah_id = $this->db->insert_id();

        // INSERT INTO TABLE aksi_matakuliah_tmp
        $detail_data = array();
        foreach ($performance as $key => $value) {
            $detail_data[] = array(
                'id_aksi_matakuliah' => $aksi_matakuliah_id,
                'performance' => $value,
                'importance' => $importance[$key]
            );
        }
        $this->db->insert_batch('aksi_matakuliah_tmp', $detail_data);

        // INSERT INTO TABLE masukan_matakuliah
        if (!empty($saran)) {
            $saran_data = array();
            foreach ($saran as $key => $value) {
                $saran_data[] = array(
                    'id_aksi_matakuliah' => $aksi_matakuliah_id,
                    'saran' => $value
                );
            }
            $this->db->insert_batch('masukan_matakuliah', $saran_data);
        }

        $this->db->trans_complete();
    }




    //========================================================dashboard Admin
    public function getJumlahKuesionerMK()
    {
        // return $this->db->query('SELECT count(DISTINCT(v_a_guru.id_survei_guru)) as jumlah,v_a_guru.id_survei_guru, sum(v_a_guru.responden)as responden,sum(v_a_guru.sangat_baik)as SB,sum(v_a_guru.baik) as B, sum(v_a_guru.cukup) as c, sum(v_a_guru.buruk) as k FROM `v_a_guru`')->result_array();
        return $this->db->query('SELECT COUNT(DISTINCT(aksi_matakuliah.id_survei_matakuliah)) AS total, COUNT(DISTINCT(aksi_matakuliah.username)) AS responden,((SUM(v_a_matakuliah.sangat_baik+v_a_matakuliah.baik))/(SUM(v_a_matakuliah.sangat_baik+v_a_matakuliah.baik+v_a_matakuliah.cukup+v_a_matakuliah.buruk))*100) as kepuasan FROM aksi_matakuliah LEFT JOIN v_a_matakuliah ON aksi_matakuliah.id_survei_matakuliah=v_a_matakuliah.id_survei_matakuliah')->result_array();
        // $this->db->select('count(id_kuesioner) as jumlah');
        // $this->db->from('kuesioner');
        // $query = $this->db->get(); 
        // return $query->result_array();  
    }

    public function getThisSurveiMK($id)
    {
        return $this->db->get_where('survei_matakuliah', ['id_survei_matakuliah' => $id])->result_array();
    }

    public function getDetailSurveiMK($id)
    {
        return $this->db->query('SELECT v_a_matakuliah.id_survei_matakuliah, v_a_matakuliah.idkm, kelas_matakuliah.idmk, kelas_matakuliah.kelas, v_a_matakuliah.responden,
         v_a_matakuliah.sangat_baik, v_a_matakuliah.baik, v_a_matakuliah.cukup, v_a_matakuliah.buruk, 
         ((v_a_matakuliah.sangat_baik * 4) + (v_a_matakuliah.baik * 3) + (v_a_matakuliah.cukup*2) + (v_a_matakuliah.buruk*1)) 
         AS Skor_matakuliah, (SUM(CASE WHEN soal_matakuliah.id_soal_aspek THEN 1 ELSE 0 END) * v_a_matakuliah.responden * 4) 
         AS Skor_maks, master_matakuliah.matakuliah FROM v_a_matakuliah, soal_matakuliah, kelas_matakuliah, master_matakuliah 
         WHERE v_a_matakuliah.idkm=kelas_matakuliah.idkm AND master_matakuliah.idmk = kelas_matakuliah.idmk
         AND v_a_matakuliah.id_survei_matakuliah="' . $id . '" GROUP BY v_a_matakuliah.id_survei_matakuliah, v_a_matakuliah.idkm')
            ->result_array();
        // return $this->db->query('SELECT v_a_guru.id_survei_guru, v_a_guru.id_guru, guru.nama, v_a_guru.responden, v_a_guru.sangat_baik, v_a_guru.baik, v_a_guru.cukup, v_a_guru.buruk, ((v_a_guru.sangat_baik * 4) + (v_a_guru.baik * 3) + (v_a_guru.cukup*2) + (v_a_guru.buruk*1)) AS Skor_guru, (SUM(CASE WHEN soal_guru.id_soal_aspek THEN 1 ELSE 0 END) * v_a_guru.responden * 4) AS Skor_maks,(CASE WHEN v_a_guru.id_guru IN(SELECT masukan_guru.id_guru FROM masukan_guru,v_a_guru WHERE masukan_guru.id_survei_guru=v_a_guru.id_survei_guru AND masukan_guru.id_guru=v_a_guru.id_guru AND masukan_guru.id_survei_guru="'.$id.'") THEN (SELECT masukan_guru.komentar FROM masukan_guru, v_a_guru WHERE masukan_guru.id_survei_guru=v_a_guru.id_survei_guru AND masukan_guru.id_guru=v_a_guru.id_guru AND masukan_guru.id_survei_guru="'.$id.'") ELSE "-" end) as komen FROM v_a_guru, soal_guru, guru WHERE v_a_guru.id_guru=guru.id_guru AND v_a_guru.id_survei_guru="'.$id.'" GROUP BY v_a_guru.id_survei_guru, v_a_guru.id_guru')->result_array();

    }

    public function getKomenMK($id)
    {
        return $this->db->query('SELECT masukan_matakuliah.id_masukan_matakuliah, masukan_matakuliah.username, masukan_matakuliah.id_survei_matakuliah,
        masukan_matakuliah.idkm, kelas_matakuliah.idmk, masukan_matakuliah.tgl_komen, masukan_matakuliah.komentar, master_matakuliah.matakuliah
        FROM masukan_matakuliah, kelas_matakuliah, master_matakuliah
        WHERE masukan_matakuliah.idkm = kelas_matakuliah.idkm AND master_matakuliah.idmk = kelas_matakuliah.idmk
        AND id_survei_matakuliah="' . $id . '" ORDER BY kelas_matakuliah.idmk')
            ->result_array();
    }

    public function chart_database($idkm)
    {
        return $this->db->query("SELECT * FROM v_a_matakuliah WHERE idkm = $idkm ")->result();
        // return $this->db->get('v_a_matakuliah')->result();
        // echo $idkm;exit;
        // print_r($this->db->query("SELECT * FROM v_a_matakuliah WHERE idkm = $idkm")->result());
    }



    public function genKode()
    {

        $this->db->select_max('kodesurvey', 'max_kode');
        $this->db->from('survei_matakuliah');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $max_kode = $row->max_kode;
            }
            $max_kode = (int) substr($max_kode, 1, 3);
            $max_kode++;
            $kodes = 'S' . sprintf("%03s", $max_kode);
        } else {
            $kodes = 'S001';
        }
        return $kodes;
    }
}
