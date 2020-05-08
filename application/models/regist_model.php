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
}
