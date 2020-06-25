<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notaris extends CI_Controller

{
    public function __construct()
    {
        parent::__construct(); {
            if (!$this->session->userdata('email')) {
                is_logged_in();
            }
            $this->load->model('regist_model');
            $this->load->model('registration_model');
        }
    }
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
    public function office()
    {
        $data['judul'] = 'Layanan';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/office');
        $this->load->view('templates/notaris/footer_notaris');



        //function index diatas digunakan untuk memanggil halaman
    }

    public function akta()
    {


        $data['judul'] = 'Create Akta';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/akta');
        $this->load->view('templates/notaris/footer_notaris');
    }

    public function add()
    {
        $data['judul'] = 'Office Info';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('id_notaris', 'id_notaris', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/add', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $hari = $this->input->post('hari');
            $jam = $this->input->post('jam');
            $alamat = $this->input->post('alamat');
            $buat = $this->input->post('buat_akta');
            $id_notaris = $this->input->post('id_notaris');



            $this->db->set('hari', $hari);
            $this->db->set('jam', $jam);
            $this->db->set('alamat', $alamat);
            $this->db->set('buat_akta', $buat);
            $this->db->where('id_notaris', $id_notaris);
            $this->db->update('notaris');
            $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
            Profil berhasil diubah  </div>');
            redirect('notaris/office');
        }
    }

    public function edit()
    {
        $data['judul'] = 'Edit Profil';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/edit', $data);
            $this->load->view('templates/notaris/footer_notaris');
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
                    $old_foto = $data['notaris']['foto'];
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
            $this->db->update('notaris');
            $this->session->set_flashdata('flash', 'diubah');
            redirect('notaris/index');
        }
    }
    public function ubahpassword()
    {
        $data['judul'] = 'Ubah Password';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/ubahpassword', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['notaris']['password'])) {
                $this->session->set_flashdata('flash1', 'salah');

                redirect('notaris/ubahpassword');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('notaris');

                $this->session->set_flashdata('flash', 'diubah');

                redirect('notaris/ubahpassword');
            }
        }
    }
    public function pengajuan()
    {
        $data['judul'] = ' Lihat Pengajuan Akta';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->regist_model->pengajuan()->result();



        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/pengajuan', $data);
        $this->load->view('templates/notaris/footer_notaris');
    }



    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->registration_model->download($id);
        $file = 'file/' . $fileinfo['file'];
        force_download($file, NULL);
    }

    public function ubah($id)
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->regist_model->getAktaById($id);

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/ubah');
        $this->load->view('templates/notaris/footer_notaris');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function konfirmasi()
    {
        $data['judul'] = 'Konfirmasi Akta';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->regist_model->getAllAkta();
        if ($this->input->post('keyword')) {
            $data['akta'] = $this->regist_model->cari();
        }

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/konfirmasi');
        $this->load->view('templates/notaris/footer_notaris');



        //function index diatas digunakan untuk memanggil halaman
    }

    public function jajal()
    {
        $data['judul'] = 'Edit Profil';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/ubah', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $id_akta = $this->input->post('id_akta');
            $keterangan = $this->input->post('keterangan');
            $catatan = $this->input->post('catatan');

            //jika ada foto yg diupload
            $upload_foto = $_FILES['akta']['name'];

            if ($upload_foto) {
                $config['allowed_types'] = 'docx';
                $config['max_size'] = '3024';
                $config['upload_path'] = './akta/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('akta')) {
                    $old_foto = $data['akta']['akta'];
                    if ($old_foto != 'Belum ada akta') {
                        unlink(FCPATH . 'akta/' . $old_foto);
                    }


                    $new_foto = $this->upload->data('file_name');
                    $this->db->set('akta', $new_foto);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('keterangan', $keterangan);
            $this->db->set('catatan', $catatan);
            $this->db->where('id_akta', $id_akta);
            $this->db->update('akta');
            $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
            Profil berhasil diubah  </div>');
            redirect('notaris/pengajuan');
        }
    }
    public function hapus($id)
    {
        $this->regist_model->hapus($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('notaris/konfirmasi');

        // function hapus digunakan untuk menghapus data yang kita ingin hapus
    }

    public function bayar($id)
    {
        $data['judul'] = 'Pembayaran';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['akta'] = $this->regist_model->getAktaById($id);

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/pembayaran');
        $this->load->view('templates/notaris/footer_notaris');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }
    public function biaya()
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/pembayaran');
        $this->load->view('templates/notaris/footer_notaris');

        $id_akta = $this->input->post('id_akta');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nama_notaris = $this->input->post('nama_notaris');
        $email_notaris = $this->input->post('email_notaris');
        $jenis = $this->input->post('jenis');
        $tanggal = $this->input->post('tanggal');
        $ambil = $this->input->post('ambil');
        $jam = $this->input->post('jam');
        $biaya = $this->input->post('biaya');
        $rekening = $this->input->post('rekening');
        $status_pembayaran = $this->input->post('status_pembayaran');
        $bukti = $this->input->post('bukti');




        $data = array(

            'id_akta' => $id_akta,
            'nama' => $nama,
            'email' => $email,
            'nama_notaris' => $nama_notaris,
            'email_notaris' => $email_notaris,
            'jenis' => $jenis,
            'tanggal' => $tanggal,
            'ambil' => $ambil,
            'jam' => $jam,
            'biaya' => $biaya,
            'rekening' => $rekening,
            'status_pembayaran' => $status_pembayaran,
            'bukti' => $bukti




        );
        $this->db->insert('pembayaran', $data);
        redirect('notaris/pembayaran');




        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan

    }
    public function lihat_bayar()
    {
        $data['judul'] = ' Lihat Pembayaran Akta';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->regist_model->pembayaran()->result();



        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/lihat_bayar', $data);
        $this->load->view('templates/notaris/footer_notaris');
    }

    public function konfirmasi_bayar()
    {
        $data['judul'] = 'Konfirmasi Pembayaran';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->regist_model->getAllBayar();
        if ($this->input->post('keyword')) {
            $data['pembayaran'] = $this->regist_model->cari();
        }

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/konfirmasi_bayar');
        $this->load->view('templates/notaris/footer_notaris');



        //function index diatas digunakan untuk memanggil halaman
    }

    public function eduit($id)
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pembayaran'] = $this->regist_model->getBayarById($id);

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/eduit');
        $this->load->view('templates/notaris/footer_notaris');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function ngedit()
    {
        $data['judul'] = 'Konfirmasi Pembayaran';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/eduit', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $id_pembayaran = $this->input->post('id_pembayaran');
            $ambil = $this->input->post('ambil');
            $jam = $this->input->post('jam');
            $biaya = $this->input->post('biaya');
            $status_pembayaran = $this->input->post('status_pembayaran');



            $this->db->set('ambil', $ambil);
            $this->db->set('jam', $jam);
            $this->db->set('biaya', $biaya);
            $this->db->set('status_pembayaran', $status_pembayaran);
            $this->db->where('id_pembayaran', $id_pembayaran);
            $this->db->update('pembayaran');
            $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
            Profil berhasil diubah  </div>');
            redirect('notaris/lihat_bayar');
        }
    }
    public function tanya()
    {
        $data['judul'] = ' Jawaban Notaris';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tanya'] = $this->regist_model->tanya()->result();


        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/tanya', $data);
        $this->load->view('templates/notaris/footer_notaris');
    }

    public function jawab()
    {
        $data['judul'] = 'Jawab Pertanyaan';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tanya'] = $this->regist_model->getAllTanya();
        if ($this->input->post('keyword')) {
            $data['tanya'] = $this->regist_model->cari();
        }

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/jawab');
        $this->load->view('templates/notaris/footer_notaris');



        //function index diatas digunakan untuk memanggil halaman
    }

    public function balas($id)
    {
        $data['judul'] = 'Detail Informasi Notaris';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['balas'] = $this->regist_model->getBalasById($id);

        $this->load->view('templates/notaris/header_notaris', $data);
        $this->load->view('templates/notaris/sidebar_notaris', $data);
        $this->load->view('templates/notaris/topbar_notaris', $data);
        $this->load->view('notaris/balas');
        $this->load->view('templates/notaris/footer_notaris');

        // function detail digunakan untuk melihat detail data yang kita ingin tampilkan
    }

    public function balas1()
    {
        $data['judul'] = 'Balas Pertanyaan Client';
        $data['notaris'] = $this->db->get_where('notaris', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/notaris/header_notaris', $data);
            $this->load->view('templates/notaris/sidebar_notaris', $data);
            $this->load->view('templates/notaris/topbar_notaris', $data);
            $this->load->view('notaris/balas', $data);
            $this->load->view('templates/notaris/footer_notaris');
        } else {
            $id_tanya = $this->input->post('id_tanya');
            $jawaban = $this->input->post('jawaban');
            $keterangan = $this->input->post('keterangan');



            $this->db->set('jawaban', $jawaban);
            $this->db->set('keterangan', $keterangan);
            $this->db->where('id_tanya', $id_tanya);
            $this->db->update('tanya');
            $this->session->set_flashdata('message', '<div class= "alert alert-success" role="alert">
            Profil berhasil diubah  </div>');
            redirect('notaris/jawab');
        }
    }
    public function download0($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->registration_model->download0($id);
        $file = 'bukti/' . $fileinfo['bukti'];
        force_download($file, NULL);
    }
}
