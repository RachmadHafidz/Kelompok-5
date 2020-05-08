<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notaris extends CI_Controller

{
    public function index()
    {
        $data['judul'] = 'Notaris';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/index', $data);
        $this->load->view('templates/notaris/footer_notaris');
    }
}
