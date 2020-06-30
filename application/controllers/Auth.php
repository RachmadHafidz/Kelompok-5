<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller

{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('registadmin_model');
		$this->load->model('regist_model');
		$this->load->model('registration_model');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$notaris = $this->db->get_where('notaris', ['email' => $email])->row_array();
		$client = $this->db->get_where('client', ['email' => $email])->row_array();
		$admin = $this->db->get_where('admin', ['email' => $email])->row_array();




		if ($notaris) {
			if ($notaris['tipe_id'] == 2) {
				//cek
				if (md5($password) == $notaris['password']) {
					$data = [
						'email' => $notaris['email'],
						'tipe_id' => $notaris['tipe_id'],

					];


					$this->session->set_userdata($data);

					redirect('notaris');
				} else {
					$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
					Email atau Password salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
				Email tidak terdaftar </div>');
				redirect('auth');
			}
		} else if ($client) {
			if ($client['tipe_id'] == 3) {
				//cek
				if (md5($password) == $client['password']) {
					$data = [
						'email' => $client['email'],
						'tipe_id' => $client['tipe_id']
					];
					$this->session->set_userdata($data);
					redirect('client');
				} else {
					$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
					Email atau Password salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
				Email tidak terdaftar </div>');
				redirect('auth');
			}
		} else if ($admin) {
			if ($admin['tipe_id'] == 1) {
				//cek
				if (md5($password) == $admin['password']) {
					$data = [
						'email' => $admin['email'],
						'tipe_id' => $admin['tipe_id']
					];
					$this->session->set_userdata($data);
					redirect('admin');
				} else {
					$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
					Email atau Password salah </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
				Email tidak terdaftar </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">
				Email tidak terdaftar </div>');
			redirect('auth');
		}
	}












	public function registadmin()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[notaris.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Tambah Admin Baru';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/regist_admin');
			$this->load->view('templates/auth_footer');
		} else {
			$this->registadmin_model->registadmin();
			$this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
			Akun anda berhasil dibuat, silahkan login </div>');
			redirect('auth');
		}
	}
	public function regist()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_sk', 'No SK', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[notaris.email]', [
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Daftar Akun Notaris';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/regist');
			$this->load->view('templates/auth_footer');
		} else {
			$this->regist_model->regist();
			$this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
			Akun anda berhasil dibuat, silahkan login </div>');
			redirect('auth');
		}
	}


	public function registration()
	{


		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[client.email]', [
			'is_unique' => 'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Daftar client baru';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$this->registration_model->registration();
			$this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
			Akun anda berhasil dibuat, silahkan login </div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('tipe_id');

		$this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
		Berhasil keluar </div>');
		redirect('auth');
	}

	public function menu()
	{


		$data['judul'] = 'Daftar Akun Baru';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/menu');
		$this->load->view('templates/auth_footer');
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
