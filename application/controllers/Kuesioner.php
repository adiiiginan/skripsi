<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');
        $this->load->model('Dosen_model');
        $this->load->model('Matakuliah_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Kuesioner_model');


        if ($this->Login_model->is_role() == 2) {
            redirect("login/blocked");
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";
        $data['title'] = 'Kuesioner Matakuliah';
        $data['sMK'] = $this->Kuesioner_model->getSurveiMK();
        $data['tgl'] = $this->Kuesioner_model->getKuesionerAktif();
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Matakuliah_model->getkls();

        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view("Kuesioner/index", $data);
        $this->load->view("template/footer", $data);
    }

    public function formSurvei($idsm, $idkm)
    {
        // $uri_segments= "siswa/surveiGuru";
        // $uri = base_url().$uri_segments;
        // if($this->kuesioner_model->aksiGuru($idg)){
        //     echo "<script>javascript:alert('Anda Sudah Mengisi Survei Ini '); window.location = '".$uri."'</script>";
        // }
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";
        $data['detail_soal'] = $this->Kuesioner_model->getThisMK($idsm, $idkm)[0];

        $data['title'] = 'Kuesioner Matakuliah';

        $data['user'] = $this->db->query($query)->result_array();
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['page'] = 'surveiGuru';
        // $data['id_kuesioner']=$idk;
        // $data['id_guru']=$idg;
        $data['detail'] = $this->Kuesioner_model->getThisMK($idsm, $idkm);
        $data['soal'] = $this->Kuesioner_model->getSoalMK();
        // return json_encode($this->Kuesioner_model->getThisMK($idsm, $idkm));
        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view("kuesioner/formSurvey", $data);
        $this->load->view("template/footer", $data);
        // var_dump($data["user"][0]);


    }

    public function aksiMK()
    {
        // Mengambil data dari form
        $username = $this->session->userdata('username');
        $date = date('Y-m-d H:i:s');
        $kuesioner = $this->input->post('id_survei', TRUE);
        $idkm = $this->input->post('idkm', TRUE);
        $performance = $this->input->post('performance', TRUE);
        $importance = $this->input->post('importance', TRUE);
        $saran = $this->input->post('saran', TRUE);

        // Memuat model Kuesioner_model
        $this->load->model('Kuesioner_model');

        // Mengambil id_survei_matakuliah dari tabel survei_matakuliah
        $id_survei_matakuliah = $this->Kuesioner_model->getAllSurveiMatakuliah();

        // Menyiapkan data utama untuk disimpan di tabel aksi_matakuliah
        $data_main = array(
            'username' => $username,
            'tgl_isi' => $date,
            'id_survei_matakuliah' => $id_survei_matakuliah,
            'idkm' => $idkm
        );

        // Panggil fungsi untuk menyimpan data ke dalam tabel aksi_matakuliah
        $this->Kuesioner_model->addAksiMK($data_main, $performance, $importance, $saran);
    }
}
