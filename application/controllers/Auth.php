<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Login_model');
		$this->load->model('User_model');
	}

	public function index()
	{

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {


			$this->load->view("auth/login");
		} else {

			$this->_login();
		}
	}


	private function _login()
	{

		$username   = $this->input->post('username', TRUE);
		$password = md5($this->input->post('password', TRUE));
		$validate = $this->Login_model->login($username, $password);
		// $validate = $this->Login_model->login($username);

		if ($validate) {
			$type = (int)$validate[0]['usertype'];

			$sesdata = array(
				'username'  => $validate[0]['username'],
				'usertype'  => $validate[0]['usertype'],
				'nama'  => $validate[0]['nama'],
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			switch ($type) {
				case 3:
					// var_dump($validate[0]["nama"]);

					redirect('mahasiswa/');
					break;
				case 2:


					redirect('dosen/');
					break;
				case 1:
					redirect('admin/');
					break;

				default:
					echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><b>NPM</b> dan <b>Password</b> tidak cocok</div>');
					redirect('auth');
					break;
			}
		} else {
			echo $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert"><b>NPM</b> dan <b>Password</b> tidak cocok</div>');
			redirect('auth');
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Congratulation your account has been logged out!
      </div>');
		redirect('auth');
	}
}
