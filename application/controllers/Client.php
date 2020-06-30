<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller

{
    public function __construct()
    {
        parent::__construct(); {
            if (!$this->session->userdata('email')) {
                is_logged_in();
            }
            $this->load->model('regist_model');
            $this->load->model('registration_model');
            $this->load->helper(array('url', 'download'));
            $this->load->helper(array('form', 'url'));
        }
    }
    public function index()
    {
        $data['judul'] = ' Profil Saya';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();



        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/index', $data);
        $this->load->view('templates/client/footer_client');
    }

    public function info()
    {
        $data['judul'] = 'Daftar Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getAllNotaris();
        if ($this->input->post('keyword')) {
            $data['notaris'] = $this->regist_model->cari();
        }


        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/info');
        $this->load->view('templates/client/footer_client');



        //function index diatas digunakan untuk memanggil halaman
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/detail');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function edit()
    {
        $data['judul'] = 'Edit Profil ';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client/header_client', $data);
            $this->load->view('templates/client/sidebar_client', $data);
            $this->load->view('templates/client/topbar_client', $data);
            $this->load->view('client/edit', $data);
            $this->load->view('templates/client/footer_client');
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
                    $old_foto = $data['client']['foto'];
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
            $this->db->update('client');
            $this->session->set_flashdata('flash', 'diubah');
            redirect('client/index');
        }
    }
    public function ubahpassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client/header_client', $data);
            $this->load->view('templates/client/sidebar_client', $data);
            $this->load->view('templates/client/topbar_client', $data);
            $this->load->view('client/ubahpassword', $data);
            $this->load->view('templates/client/footer_client');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (md5($current_password) != $data['client']['password']) {
                $this->session->set_flashdata('flash1', 'salah');
                redirect('client/ubahpassword');
            } else {
                $password_hash = md5($new_password);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('client');

                $this->session->set_flashdata('flash', 'diubah');
                redirect('client/ubahpassword');
            }
        }
    }
    public function layanan($id)
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/layanan');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }



    public function surat_kuasa($id)
    {
        $data['judul'] = 'Buat Surat Kuasa';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);




        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/surat_kuasa');
        $this->load->view('templates/client/footer_client');
    }

    // function detail digunakan untuk melihat detail data yang kita ingin tampilkan


    public function sk()
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/surat_kuasa');
        $this->load->view('templates/client/footer_client');

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nama_notaris = $this->input->post('nama_notaris');
        $email_notaris = $this->input->post('email_notaris');
        $file = $_FILES['file'];
        $jenis = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');
        $catatan = $this->input->post('catatan');
        $akta = $this->input->post('akta');

        if ($file = '') {
        } else {
            $config['upload_path'] = './file/';
            $config['allowed_types'] = 'docx';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                redirect('client/info');
                die();
            } else {
                $file = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nama' => $nama,
            'email' => $email,
            'nama_notaris' => $nama_notaris,
            'email_notaris' => $email_notaris,
            'file' => $file,
            'jenis' => $jenis,
            'keterangan' => $keterangan,
            'catatan' => $catatan,
            'akta' => $akta



        );
        $this->db->insert('akta', $data);
        redirect('client/lihat');




        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan

    }


    public function download_sk()
    {
        $data['judul'] = 'Buat Akta Surat Kuasa';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();


        force_download('file/FORM PENGUMPULAN PERSYARATAN AJB.docx', NULL);
        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/download_sk', $data);
        $this->load->view('templates/client/footer_client');
    }

    public function download_sk2()
    {
        $data['judul'] = 'Buat Akta Surat Kuasa';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();


        force_download('file/FORM PENGUMPULAN PERSYARATAN SEWA.docx', NULL);
        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/download_sk', $data);
        $this->load->view('templates/client/footer_client');
    }

    public function download_sk3()
    {
        $data['judul'] = 'Buat Akta Surat Kuasa';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();


        force_download('file/FORM PENGUMPULAN PERSYARATAN KUASA.docx', NULL);
        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/download_sk', $data);
        $this->load->view('templates/client/footer_client');
    }

    public function buat_akta($id)
    {
        $data['idnot'] = $id;
        $data['judul'] = 'Buat Akta Baru';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/buat_akta', $data);
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function ajb($id)
    {
        $data['judul'] = 'Buat Akta Jual Beli';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/ajb');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }
    public function sewa($id)
    {
        $data['judul'] = 'Buat Akta Sewa Menyewa';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/sewa');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function lihat()
    {
        $data['judul'] = ' Lihat Pengajuan Akta';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->registration_model->lihat()->result();


        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/lihat', $data);
        $this->load->view('templates/client/footer_client');
    }
    public function ajb1()
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/surat_kuasa');
        $this->load->view('templates/client/footer_client');

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nama_notaris = $this->input->post('nama_notaris');
        $email_notaris = $this->input->post('email_notaris');
        $file = $_FILES['file'];
        $jenis = $this->input->post('jenis');
        $keterangan = $this->input->post('keterangan');
        $catatan = $this->input->post('catatan');
        $akta = $this->input->post('akta');

        if ($file = '') {
        } else {
            $config['upload_path'] = './file/';
            $config['allowed_types'] = 'docx';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                redirect('client/info');
                die();
            } else {
                $file = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nama' => $nama,
            'email' => $email,
            'nama_notaris' => $nama_notaris,
            'email_notaris' => $email_notaris,
            'file' => $file,
            'jenis' => $jenis,
            'keterangan' => $keterangan,
            'catatan' => $catatan,
            'akta' => $akta



        );
        $this->db->insert('akta', $data);
        redirect('client/lihat');
    }



    public function sewa1()
    {
        $idnot = $this->input->post('idnot');
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/buat_akta');
        $this->load->view('templates/client/footer_client');

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nama_notaris = $this->input->post('nama_notaris');
        $email_notaris = $this->input->post('email_notaris');
        $file = $_FILES['file'];
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal');
        $keterangan = $this->input->post('keterangan');
        $catatan = $this->input->post('catatan');
        $akta = $this->input->post('akta');

        if ($file = '') {
            // redirect(base_url('cok/client/buat_akta/' . $idnot));
        } else {
            $config['upload_path'] = './file/';
            $config['allowed_types'] = 'docx';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file')) {
                redirect('client/buat_akta/' . $idnot);
            } else {
                $file = $this->upload->data('file_name');
            }
        }


        $data = array(
            'nama' => $nama,
            'email' => $email,
            'nama_notaris' => $nama_notaris,
            'email_notaris' => $email_notaris,
            'file' => $file,
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan,
            'catatan' => $catatan,
            'akta' => $akta



        );
        $this->db->insert('akta', $data);
        $this->session->set_flashdata('flash', 'diproses');
        redirect('client/lihat');
    }

    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->registration_model->download($id);
        $file = 'akta/' . $fileinfo['akta'];
        force_download($file, NULL);
    }

    public function pembayaran()
    {
        $data['judul'] = ' Daftar Pembayaran Akta';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->registration_model->pembayaran()->result();


        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/pembayaran', $data);
        $this->load->view('templates/client/footer_client');
    }

    public function unggah_bayar()
    {
        $data['judul'] = 'Unggah Bukti Pembayaran';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->regist_model->getAllBayar();
        if ($this->input->post('keyword')) {
            $data['pembayaran'] = $this->regist_model->cari();
        }

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/unggah_bayar');
        $this->load->view('templates/client/footer_client');



        //function index diatas digunakan untuk memanggil halaman
    }
    public function unggah($id)
    {
        $data['judul'] = 'Unggah Bukti Pembayaran';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->regist_model->getBayarById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/unggah');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function kirim()
    {
        $data['judul'] = 'Edit Profil';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/ubah', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $id_pembayaran = $this->input->post('id_pembayaran');
            $nama = $this->input->post('nama');


            //jika ada foto yg diupload
            $upload_foto = $_FILES['bukti']['name'];

            if ($upload_foto) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '3024';
                $config['upload_path'] = './bukti/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('bukti')) {
                    $old_foto = $data['pembayaran']['bukti'];
                    if ($old_foto != 'Belum ada') {
                        unlink(FCPATH . 'bukti/' . $old_foto);
                    }


                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('bukti', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('id_pembayaran', $id_pembayaran);
            $this->db->update('pembayaran');
            $this->session->set_flashdata('flash', 'dikirim');
            redirect('client/pembayaran');
        }
    }
    public function tanya($id)
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['notaris'] = $this->regist_model->getNotarisById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/tanya');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function tanya1()
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/tanya');
        $this->load->view('templates/client/footer_client');


        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $email = $this->input->post('email');
        $id_notaris = $this->input->post('id_notaris');
        $nama_notaris = $this->input->post('nama_notaris');
        $email_notaris = $this->input->post('email_notaris');
        $pertanyaan = $this->input->post('pertanyaan');
        $jawaban = $this->input->post('jawaban');
        $tanggal = $this->input->post('tanggal');
        $keterangan = $this->input->post('keterangan');




        $data = array(
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
            'id_notaris' => $id_notaris,
            'nama_notaris' => $nama_notaris,
            'email_notaris' => $email_notaris,
            'pertanyaan' => $pertanyaan,
            'jawaban' => $jawaban,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan



        );
        $this->db->insert('tanya', $data);
        redirect('client/jawaban');




        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan

    }

    public function jawaban()
    {
        $data['judul'] = ' Jawaban Notaris';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['jawaban'] = $this->regist_model->jawaban()->result();


        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('Client/jawaban', $data);
        $this->load->view('templates/client/footer_client');
    }

    public function lapor()
    {
        $data['judul'] = 'Laporkan Akta';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->regist_model->getAllAkta();
        if ($this->input->post('keyword')) {
            $data['akta'] = $this->regist_model->cari();
        }

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/lapor');
        $this->load->view('templates/client/footer_client');



        //function index diatas digunakan untuk memanggil halaman
    }
    public function laporan($id)
    {
        $data['judul'] = 'Laporkan Akta';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->regist_model->getAktaById($id);

        $this->load->view('templates/client/header_client', $data);
        $this->load->view('templates/client/sidebar_client', $data);
        $this->load->view('templates/client/topbar_client', $data);
        $this->load->view('client/laporan');
        $this->load->view('templates/client/footer_client');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }
    public function send()
    {
        $data['judul'] = 'Laporkan Akta';
        $data['client'] = $this->db->get_where('client', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('lapor', 'lapor', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/ubah', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $id_akta = $this->input->post('id_akta');
            $lapor = $this->input->post('lapor');




            $this->db->set('lapor', $lapor);
            $this->db->where('id_akta', $id_akta);
            $this->db->update('akta');
            $this->session->set_flashdata('flash', 'diproses');
            redirect('client/lihat');
        }
    }
}
