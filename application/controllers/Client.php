<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller

{
    public function index()
    {
        $data['judul'] = 'My Profile';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();



        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/index', $data);
        $this->load->view('templates/client/footer_client');
    }
}
