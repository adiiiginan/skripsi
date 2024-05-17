<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Login_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Dosen_model');
        $this->load->model('Status_model');
        $this->load->model('Matakuliah_model');
        $this->load->model('Kelas_model');
        $this->load->model('Kuesioner_model');
        $this->load->model('Semester_model');
        $this->load->model('Akademik_model');
        $this->load->model('Dimensi_model');
        $this->load->model('Jabatan_model');
    }

    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view("template/header", $data);
        $this->load->view("template/topbar", $data);
        $this->load->view('admin/index', $data);
        $this->load->view("template/footer", $data);
    }

    public function role()
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['usertype'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['usertype'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
    }

    //  Dosen 
    public function dosen()
    {
        $data['title'] = 'List Dosen';
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Dosen_model->getDosen();
        $data['dosen'] = $this->Dosen_model->getJabatan();
        $data['jab'] = $this->Jabatan_model->getJabatan();

        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view('admin/Dosen/dosen', $data);
        $this->load->view("template/footer", $data);
    }

    public function tbhDosen()
    {
        $this->form_validation->set_rules('nidn', 'nidn', 'required|numeric');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jafung', 'jafung', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('telp', 'telp');

        if ($this->form_validation->run() == false) {
            redirect('admin/dosen');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            gagal menambahkan data!
          </div>');
        } else {
            $this->Dosen_model->Add();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berhasil menambahkan data!
          </div>');
            redirect('admin/dosen');
        }
    }

    public function hapusDosen($nidn)
    {
        $this->Dosen_model->deleteDosen($nidn);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        berhasil menghapus data!
      </div>');
        redirect('admin/dosen');
    }
    // Mahasiswa 

    public function mahasiswa()
    {
        $data['title'] = 'List Mahasiswa';
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['mhs'] = $this->Mahasiswa_model->getMHS();


        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view("admin/Mahasiswa/index", $data);
        $this->load->view("template/footer", $data);
    }


    // Matakuliah Master 

    public function masterMK()
    {
        $data['title'] = 'Matakuliah Master';
        $data['admin'] = $this->Matakuliah_model->getmaster();
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view('admin/Matkul/index', $data);
        $this->load->view("template/footer", $data);
    }

    public function tbhmaster()
    {

        $this->load->model('matakuliah_model');
        $kode_matakuliah = $this->matakuliah_model->genKode();
        $data['kode'] = $kode_matakuliah;
        $this->load->view('admin/tbhmaster', $data);
    }




    // Kelas 

    public function klsMTK()
    {

        $data['title'] = 'Kelas Matakuliah ';
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['matakuliah'] = $this->Matakuliah_model->getMK();
        $data['master'] = $this->Matakuliah_model->getmaster();
        $data['akademik'] = $this->Matakuliah_model->getthn();
        $data['admin'] = $this->Matakuliah_model->getkls();
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view("template/header", $data);
        $this->load->view("template/topbar", $data);
        $this->load->view("admin/Kelas/index", $data);
        $this->load->view("template/footer", $data);
    }

    //Tahun Akademik

    public function akademik()
    {
        $data['title'] = 'Tahun Ajaran';
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->Matakuliah_model->getthn();
        $data['akademi'] = $this->Akademik_model->getthn();
        $data['thn'] = $this->Matakuliah_model->thn();

        // var_dump($data['thn'][0]);

        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view('admin/akademik', $data);
        $this->load->view("template/footer", $data);
    }


    //Kuesioner 

    public function Kuesioner()
    {
        $data['page'] = 'tambah kuesioner';
        $data['title'] = 'Kuesioner';

        $query1 = "SELECT km.*, m.*, d.*, a.*
        FROM (master_matakuliah m 
        INNER JOIN kelas_matakuliah km ON m.idmk = km.idmk)
        INNER JOIN dosen d ON km.iddsn = d.iddsn
        INNER JOIN akademik a on km.akademik = a.id_akademik ";

        $data['survei'] = $this->Kuesioner_model->getAllSurveiMatakuliah();
        $data['status'] = $this->Status_model->getstat();
        $data['kelas'] = $this->db->query($query1)->result_array();
        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view("admin/Kuesioner/index", $data);
        $this->load->view("template/footer", $data);
    }
    public function tbhKuesioner()
    {
        $idkm = $this->input->post('idkm', TRUE);
        $mulai = $this->input->post('mulai', TRUE);
        $selesai = $this->input->post('selesai', TRUE);
        $this->Kuesioner_model->AddKuesioner($idkm, $mulai, $selesai);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil menambahkan jadwal kuesioner!
      </div>');

        redirect('admin/Kuesioner/index');
    }

    //pertanyaan 

    public function aspekMK()
    {


        $data['page'] = 'aspekMatakuliah';
        $data['title'] = 'Pertanyaan Kuesioner';
        $data['dosen'] = $this->Dosen_model->getDosen();
        $data['soal'] = $this->Kuesioner_model->getSoalMK();
        $data['indikator'] = $this->Dimensi_model->getDimensi();
        $data['akademi'] = $this->Akademik_model->getthn();


        $data['user'] = $this->db->get_where('users', ['username' =>
        $this->session->userdata('username')])->row_array();


        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view("admin/Pertanyaan/index", $data);
        $this->load->view("template/footer", $data);
    }

    public function tbhPertanyaanMK()
    {
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('iddimensi', 'Dimensi', 'required');


        if ($this->form_validation->run()) {
            $pertanyaan = $this->input->post('pertanyaan'); // Menggunakan 'pertanyaan[]' untuk mendapatkan array dari input form
            $dimensi = $this->input->post('iddimensi'); // Menggunakan 'iddimensi[]' untuk mendapatkan array dari input form
            $akademi = $this->input->post('id_akademik');
            $relasi = array('pertanyaan' => $pertanyaan, 'iddimensi' => $dimensi, 'idakademik' => $akademi);

            $data = array_merge($relasi);
            if ($this->Dimensi_model->insert_relasi($data) == TRUE) {
                $this->session->set_flashdata('flash', 'Ditambahkan');
                redirect('admin/aspekMK');
            }
        } else {
            $this->session->set_flashdata('flash', 'GAGAL');
            redirect('admin/aspekMK');
        }
    }


    public function hapusAspek($id)
    {
        $this->Kuesioner_model->deleteAspek($id);
        $this->Dimensi_model->deleteAspek($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/aspekMK');
    }
}
