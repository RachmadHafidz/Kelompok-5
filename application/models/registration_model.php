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
}
