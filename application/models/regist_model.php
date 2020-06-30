<?php

class regist_model extends CI_Model
{
    public function getAllregist()
    {
        return $query = $this->db->get('notaris')->result_array();
    } //function model untuk memanggil 

    public function regist()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'no_sk' => htmlspecialchars($this->input->post('no_sk', true)),
            'telepon' => htmlspecialchars($this->input->post('telepon', true)),
            'foto' => 'avatar.jpg',
            'email' => $this->input->post('email'),
            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),
            'tipe_id' => '2',
            'daftar' => time()


        ];


        $this->db->insert('notaris', $data);
    } //ini adalah function untuk menambah data baru, yakni untuk memasukkan data ke database

    public function getAllNotaris()
    {
        return $query = $this->db->get('notaris')->result_array();
    } //function model untuk memanggil 
    public function getAllAkta()
    {
        return $query = $this->db->get('akta')->result_array();
    } //function model untuk memanggil 

    public function getNotarisById($id)
    {
        return $this->db->get_where('notaris', ['id_notaris' => $id])->row_array();
    } //function ini digunakan untuk melihat detail data, dengan mengambil id data tersebut

    public function getKantorById($id)
    {
        return $this->db->get_where('kantor', ['email' => $id])->row_array();
    } //function ini digunakan untuk melihat detail data, dengan mengambil id data tersebut

    public function add()
    {
        $data = [
            'email' => htmlspecialchars($this->input->post('email', true)),
            'hari' => htmlspecialchars($this->input->post('hari', true)),
            'jam' => htmlspecialchars($this->input->post('jam', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'konsul' => htmlspecialchars($this->input->post('konsul', true)),
            'buat_akta' => htmlspecialchars($this->input->post('buat_akta', true)),




        ];


        $this->db->insert('kantor', $data);
    } //ini adalah function untuk menambah data baru, yakni untuk memasukkan data ke database

    public function pengajuan()
    {
        $id = $this->session->userdata('email');
        return $this->db->get_where('akta', array('email_notaris' => $id));
    }

    public function cari()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get('notaris')->result_array();
    } //digunakan untuk melakukan pencarian berdasarkan kata kunci

    public function getAktaById($id)
    {

        return $this->db->get_where('akta', ['id_akta' => $id])->row_array();
    } //function ini digunakan untuk melihat detail data, dengan mengambil id data tersebut

    public function hapus($id)
    {
        $this->db->where('id_akta', $id);
        $this->db->delete('akta');
        //function ini digunakan untuk menghapus data, hapus data disini berdasarkan id
    }

    public function pembayaran()
    {
        $id = $this->session->userdata('email');
        return $this->db->get_where('pembayaran', array('email_notaris' => $id));
    }

    public function getAllBayar()
    {
        return $query = $this->db->get('pembayaran')->result_array();
    } //function model untuk memanggil 

    public function getBayarById($id)
    {

        return $this->db->get_where('pembayaran', ['id_akta' => $id])->row_array();
    } //function ini digunakan untuk melihat detail data, dengan mengambil id data tersebut

    public function jawaban()
    {
        $id = $this->session->userdata('email');
        return $this->db->get_where('tanya', array('email' => $id));
    }

    public function tanya()
    {
        $id = $this->session->userdata('email');
        return $this->db->get_where('tanya', array('email_notaris' => $id));
    }

    public function getAllTanya()
    {
        return $query = $this->db->get('tanya')->result_array();
    } //function model untuk memanggil 

    public function getBalasById($id)
    {

        return $this->db->get_where('tanya', ['id_tanya' => $id])->row_array();
    } //function ini digunakan untuk melihat detail data, dengan mengambil id data tersebut
}
