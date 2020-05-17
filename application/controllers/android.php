<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Kontak_android extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    function registration()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[client.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Daftar client baru';
		
		} else {
			$this->registration_model->registration();
			$this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
			Your account has been created. Please login! </div>');
			redirect('auth');
		}
	}
?>