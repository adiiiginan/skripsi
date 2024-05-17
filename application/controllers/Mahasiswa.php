<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');
        $this->load->model('Dosen_model');
        $this->load->model('Matakuliah_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('User_model');

        if ($this->Login_model->is_role() != 3) {
            redirect("login/blocked");
        }
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";

        $query1 = "SELECT mm.*, km.*, u.*, m.*, d.*, a.*
        FROM (master_matakuliah m 
              INNER JOIN kelas_matakuliah km ON m.idmk = km.idmk)
              INNER JOIN dosen d ON km.iddsn = d.iddsn
              INNER JOIN matakuliah_mhs mm on km.idkm = mm.idkm
              INNER JOIN akademik a on km.akademik = a.id_akademik
              INNER JOIN users u ON mm.username = u.username WHERE u.username = \"{$username}\" ";

        $data['title'] = 'Matakuliah';
        $data['page'] = 'E-Feedback';
        $data['user'] = $this->db->query($query)->result_array();
        $data['admin'] = $this->db->query($query1)->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMHS();
        // $data['dosen'] = $this->Dosen_model->getDosen();
        // $data['admin'] = $this->Matakuliah_model->getMK();
        // $data['admin'] = $this->Matakuliah_model->getkls();
        // var_dump($data["user"][0]);

        $this->load->view("template/header");
        $this->load->view("template/topbar", $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view("template/footer", $data);
    }

    public function profile()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";

        $data['title'] = 'Profile';
        $data['page'] = 'E-Feedback';
        $data['user'] = $this->db->query($query)->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMHS();


        // var_dump($data["user"][0]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarMHS', $data);
        $this->load->view('mahasiswa/profile', $data);
        $this->load->view('templates/footer');
    }

    public function tbhMTK()
    {
        $username = $this->session->userdata('username');
        $idkm = $this->input->post('idkm', TRUE);
        $this->Mahasiswa_model->addkls($idkm, $username);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            berhasil menambahkan data!
            </div>');
        redirect('mahasiswa/index');
    }
    public function listmk()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";

        $query1 = "SELECT km.*, m.*, d.*, a.*
        FROM (master_matakuliah m 
        INNER JOIN kelas_matakuliah km ON m.idmk = km.idmk)
        INNER JOIN dosen d ON km.iddsn = d.iddsn
        INNER JOIN akademik a on km.akademik = a.id_akademik ";

        $data['title'] = 'Matakuliah';
        $data['page'] = 'E-Feedback';
        $data['user'] = $this->db->query($query)->result_array();
        $data['kelas'] = $this->db->query($query1)->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMHS();
        // $data['admin'] = $this->Matakuliah_model->getkls();


        // var_dump($adm);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarMHS', $data);
        $this->load->view('mahasiswa/list_matakuliah', $data);
        $this->load->view('templates/footer');
    }

    public function hapuskls($id)
    {
        $this->Mahasiswa_model->deletekls($id);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        berhasil menghapus data!
      </div>');
        redirect('mahasiswa/index');
    }

    public function ubahpassword()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";

        $data['title'] = 'Profile';
        $data['page'] = 'E-Feedback';
        $data['user'] = $this->db->query($query)->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMHS();


        // var_dump($data["user"][0]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarMHS', $data);
        $this->load->view('mahasiswa/ubah_password', $data);
        $this->load->view('templates/footer');
    }

    public function changepass()
    {
        // PHPMailer object

        // Form Validation
        $this->form_validation->set_rules(
            'curpassword',
            'Current Password',
            'required',
            array('required' => 'Current Password tidak boleh kosong !')
        );
        $this->form_validation->set_rules('newpassword', 'New Password', 'required', array('required' => 'New Password tidak boleh kosong !'));
        $this->form_validation->set_rules('repassword', 'Retype Password', 'required|matches[newpassword]', array('required' => 'Retype Password tidak boleh kosong !', 'matches[password]' => 'Retype Password tidak sesuai !'));

        if ($this->form_validation->run() == true) {
            $username = $this->input->post('username');
            $data = $this->User_model->getUser($username);
            // $username = $this->input->post('username');
            $data1 = $this->User_model->getUserby($npm);
            $new = $this->input->post('newpassword');
            $old = md5($this->input->post('curpassword'));
            $this->User_model->newpass($new, $username);
            if (password_verify($old, $data->password)) {
                $response = false;
                $mail = new PHPMailer();

                // SMTP configuration
                $mail->isSMTP();
                $mail->Host     = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jejaka.outdoor@gmail.com'; // user email anda
                $mail->Password = 'tnfazckuwsqlyerx'; // diisi dengan App Password yang sudah di generate
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;

                $mail->setFrom('jejaka.outdoor@gmail.com', 'Jejaka Outdoor Rent'); // user email anda
                $mail->addReplyTo('jejaka.outdoor@gmail.com', ''); //user email anda

                // Email subject
                $mail->Subject = 'New Password | Jejaka Outdoor'; //subject email

                // Add a recipient
                $mail->addAddress($data1->email); //email tujuan pengiriman email

                // Set email format to HTML
                $mail->isHTML(true);

                // Email body content
                $mailContent = "<p><b>Password berhasil diubah!</b><br>Jangan beri tahu kepada siapapun Password Anda!. <br> Silahkan Login Kembali dengan Password baru Anda!</p>
                    <br>
                    <p>Terimakasih. <b>"; // isi email
                $mail->Body = $mailContent;

                // Send email
                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    $this->session->set_flashdata('msg', 'Perubahan Password Berhasil!');
                    $username = $data->npm;
                    $this->User_model->newpass($new, $username);
                }
            } else {
                $this->session->set_flashdata('msg', '<p style="color: red;">Current Password Tidak Sesuai !</p>');
            }
        } else {
            $this->session->set_flashdata('msg', '<p style="color: red;">Terdapat Kekeliruan Pengisian Form!</p>');
        }
        redirect($this->agent->referrer());
    }

    public function ubahpass()
    {
        // Validasi inputan (misalnya, pastikan password baru memenuhi persyaratan tertentu)
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            // Tampilkan kembali halaman change_password.php dengan pesan kesalahan validasi
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
             gagal mengganti password !
          </div>');
            redirect('mahasiswa/ubahpassword');
        } else {
            // Ambil data pengguna saat ini dari sesi (Anda dapat mengubah ini sesuai kebutuhan)
            $username = $this->session->userdata('username');

            // Ambil password baru dari inputan form
            $newPassword = $this->input->post('new_password');

            // Memperbarui password pengguna
            $this->User_model->updatePassword($username, $newPassword);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
            berhasil mengganti password !
          </div>');
            redirect('mahasiswa/ubahpassword');
            // Tampilkan pesan berhasil atau arahkan ke halaman lain
            // (Anda dapat mengubah ini sesuai kebutuhan)
        }
    }

    public function ubahprofile()
    {
        // Validasi inputan (misalnya, pastikan password baru memenuhi persyaratan tertentu)
        $this->form_validation->set_rules('npm', 'npm', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('gender', 'gender');
        $this->form_validation->set_rules('angkatan', 'angkatan');
        $this->form_validation->set_rules('konsentrasi', 'konsentrasi');
        $this->form_validation->set_rules('telp', 'telp', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            // Tampilkan kembali halaman change_password.php dengan pesan kesalahan validasi
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            gagal merubah profile !
          </div>');
            redirect('mahasiswa/ubahprof');
        } else {
            // Ambil data pengguna saat ini dari sesi (Anda dapat mengubah ini sesuai kebutuhan)
            $username = $this->session->userdata('username');
            $query = "SELECT u.*, m.*
            FROM users u 
            LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";

            $data['user'] = $this->db->query($query)->result_array();

            // Ambil password baru dari inputan form
            $npm = $this->input->post('npm');
            $nama = $this->input->post('nama');
            $gender = $this->input->post('gender');
            $angkatan = $this->input->post('angkatan');
            $kelas = $this->input->post('kelas');
            $konsentrasi = $this->input->post('konsentrasi');
            $email = $this->input->post('email');
            $telp = $this->input->post('telp');

            // Memperbarui password pengguna
            $this->Mahasiswa_model->updateprofile($data, $npm, $nama, $gender, $kelas, $angkatan, $konsentrasi, $email, $telp);
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
            berhasil merubah profile !
          </div>');
            redirect('mahasiswa/ubahprof');
            // Tampilkan pesan berhasil atau arahkan ke halaman lain
            // (Anda dapat mengubah ini sesuai kebutuhan)
        }
    }

    public function ubahprof()
    {
        $username = $this->session->userdata('username');
        $query = "SELECT u.*, m.*
        FROM users u 
        LEFT JOIN mahasiswa m ON u.username = m.npm  WHERE username = \"{$username}\" ";

        $data['title'] = 'Profile';
        $data['page'] = 'E-Feedback';
        $data['user'] = $this->db->query($query)->result_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->getMHS();


        // var_dump($data["user"][0]);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarMHS', $data);
        $this->load->view('mahasiswa/ubah_profile', $data);
        $this->load->view('templates/footer');
    }
}
