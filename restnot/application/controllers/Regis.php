<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Regis extends REST_Controller
//ini controller buat notaris ya 
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id_notaris');
        if ($id == '') {
            $regis = $this->db->get('notaris')->result();
        } else {
            $this->db->where('id', $id);
            $regis = $this->db->get('notaris')->result();
        }

        // echo json_encode($regis);
        $this->response($regis, 200);
    }

    function index_post()
    {

        $data = array(
            'id_notaris'           => $this->post('id_notaris'),
            'nama'          => $this->post('nama'),
            'no_sk'          => $this->post('no_sk'),
            'telepon'    => $this->post('telepon'),
            'foto'    => 'avatar.jpg',
            'email'    => $this->post('email'),
            'password'    => md5($this->post('password')),
            'tipe_id'    => '2',
            'daftar'    => time(),
            'hari'    => '',
            'jam'    => '',
            'alamat'    => '',
            'buat_akta'    => ''


        );
        $insert = $this->db->insert('notaris', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'id_notaris'           => $this->put('id_notaris'),
            'nama'          => $this->put('nama'),
            'no_sk'          => $this->put('no_sk'),
            'telepon'    => $this->put('telepon'),
            'foto'    => 'avatar.jpg',
            'email'    => $this->put('email'),
            'password'    => md5($this->put('password')),
            'tipe_id'    => '2',
            'daftar'    => time(),
            'hari'   => $this->put('hari'),
            'jam'     => $this->put('jam'),
            'alamat'    => $this->put('alamat'),
            'buat_akta'    => $this->put('buat_akta')


        );
        $this->db->where('id_notaris', $id);
        $update = $this->db->update('notaris', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('notaris');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
// POST DIGUNAKAN UNTUK MENGIRIMKAN DATA
// PUT DIGUNAKAN UNTUK MENGUBAH/MENGEDIT DATA
// DELETA UNTUK MENGHAPUS DATA
