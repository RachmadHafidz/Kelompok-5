<?php

class registration_model extends CI_Model
{
    public function getAllregistration()
    {
        return $query = $this->db->get('client')->result_array();
    } //function model untuk memanggil 

    public function registration()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'telepon' => htmlspecialchars($this->input->post('telepon')),
            'foto' => 'avatar.jpg',
            'email' => $this->input->post('email'),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'tipe_id' => '3',
            'daftar' => time()

        ];

        $this->db->insert('client', $data);
    } //ini adalah function untuk menambah data baru, yakni untuk memasukkan data ke database

    public function surat_kuasa()
    {


        $data = [
            'id' => htmlspecialchars($this->input->post('id')),
            'id_notaris' => htmlspecialchars($this->input->post('id_notaris')),
            'file' => 'Menunggu Konfirmasi',
            'jenis' => 'Surat Kuasa',
            'keterangan' => 'Menunggu Konfirmasi',


        ];
        $this->db->insert('akta', $data);
    }

    public function upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            $data = array(
                'id' => $this->input->post('id'),
                'id_notaris' => $this->input->post('id_notaris'),
                'file' => ('userfile'),
                'jenis' => 'Surat Kuasa',
                'keterangan' => 'Menunggu Konfirmasi'



            );

            $this->load->view('upload_success', $data);
        } else {
        }
    }

    public function lihat()
    {
        $id = $this->session->userdata('email');
        return $this->db->get_where('akta', array('email' => $id));
    }

    public function pembayaran()
    {
        $id = $this->session->userdata('email');
        return $this->db->get_where('pembayaran', array('email' => $id));
    }

    public function download($id)
    {
        $query = $this->db->get_where('akta', array('id_akta' => $id));
        return $query->row_array();
    }

    public function download0($id)
    {
        $query = $this->db->get_where('pembayaran', array('id_pembayaran' => $id));
        return $query->row_array();
    }
}
