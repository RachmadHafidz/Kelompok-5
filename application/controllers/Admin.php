<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller

{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/admin/footer');
    }
}
