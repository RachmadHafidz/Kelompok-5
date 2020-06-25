<?php

class Search_model extends CI_Model
{
    public function getAllSearch()
    {
        return $query = $this->db->get('notaris')->result_array();
    } //function model untuk memanggil 

    public function tambahInformasi()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "pemilik" => $this->input->post('pemilik', true),
            "letak" => $this->input->post('letak', true),
            "luas" => $this->input->post('luas', true)
        ];

        $this->db->insert('informasi', $data);
    } //ini adalah function untuk menambah data baru, yakni untuk memasukkan data ke database

    public function hapusInformasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('informasi');
        //function ini digunakan untuk menghapus data, hapus data disini berdasarkan id
    }

    public function getInformasiById($id)
    {
        return $this->db->get_where('informasi', ['id' => $id])->row_array();
    } //function ini digunakan untuk melihat detail data, dengan mengambil id data tersebut

    public function ubahInformasi()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "pemilik" => $this->input->post('pemilik', true),
            "letak" => $this->input->post('letak', true),
            "luas" => $this->input->post('luas', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('informasi', $data);
    } //function ubah digunakan untuk mengubah data dan memasukkan data yang baru ke dalam database

    public function cariInformasi()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get('informasi')->result_array();
    } //digunakan untuk melakukan pencarian berdasarkan kata kunci
}
