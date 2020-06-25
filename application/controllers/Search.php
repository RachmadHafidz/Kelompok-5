<?php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
        $this->load->library('form_validation');
    }
    //function constuct digunakan untuk memanggil database
    public function index()
    {
        $data['judul'] = 'Daftar Notaris';
        $data['notaris'] = $this->search_model->getAllSearch();
       
        $this->load->view('templates/header', $data);
        $this->load->view('informasi/index');
        $this->load->view('templates/footer');

        //function index diatas digunakan untuk memanggil halaman
    }
    public function tambah()
    {
        $data['judul'] = 'Form tambah informasi';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pemilik', 'Pemilik', 'required');
        $this->form_validation->set_rules('letak', 'Letak', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('informasi/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Informasi_model->tambahInformasi();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('informasi');
        }
        // function tambah digunakan untuk menambah data baru
    }
    public function hapus($id)
    {
        $this->Informasi_model->hapusInformasi($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('informasi');

        // function hapus digunakan untuk menghapus data yang kita ingin hapus
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Informasi';
        $data['informasi'] = $this->Informasi_model->getInformasiById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('informasi/detail', $data);
        $this->load->view('templates/footer');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form ubah informasi';
        $data['informasi'] = $this->Informasi_model->getInformasiById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pemilik', 'Pemilik', 'required');
        $this->form_validation->set_rules('letak', 'Letak', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('informasi/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Informasi_model->ubahInformasi();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('informasi');

            //funtion ubah kita gunakan untuk mengubah data yang ingin kita ubah
        }
    }
}
