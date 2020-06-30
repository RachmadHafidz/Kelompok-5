<?php

class registadmin_model extends CI_Model
{
    public function getAllregistadmin()
    {
        return $query = $this->db->get('admin')->result_array();
    } //function model untuk memanggil 

    public function registadmin()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'foto' => 'avatar.jpg',
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'tipe_id' => '1',
            'daftar' => time()


        ];


        $this->db->insert('admin', $data);
    } //ini adalah function untuk menambah data baru, yakni untuk memasukkan data ke database
}
