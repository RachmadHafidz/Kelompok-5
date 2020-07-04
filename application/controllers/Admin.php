<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller

{
    public function __construct()
    {
        parent::__construct(); {
            if (!$this->session->userdata('email')) {
                is_logged_in();
            }
        }
    }
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

    public function profile()
    {
        $data['judul'] = 'Admin Profile';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('Admin/admin_profile', $data);
        $this->load->view('templates/admin/footer');
    }
    public function edit()
    {
        $data['judul'] = 'Edit Profil Admin';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            //jika ada foto yg diupload
            $upload_foto = $_FILES['foto']['name'];

            if ($upload_foto) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '3024';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_foto = $data['admin']['foto'];
                    if ($old_foto != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_foto);
                    }


                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('foto', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('admin');
            $this->session->set_flashdata('flash', 'diubah');

            redirect('admin/profile');
        }
    }
    public function ubahpassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('admin/ubahpassword', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['admin']['password'])) {
                $this->session->set_flashdata('flash1', 'salah');

                redirect('admin/ubahpassword');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('admin');

                $this->session->set_flashdata('flash', 'diubah');

                redirect('admin/ubahpassword');
            }
        }
    }
}

