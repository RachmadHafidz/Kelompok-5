<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Pembayaran extends REST_Controller
//ini controller buat pembayaran ya 
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id_pembayaran');
        if ($id == '') {
            $regis = $this->db->get('pembayaran')->result();
        } else {
            $this->db->where('id', $id);
            $regis = $this->db->get('pembayaran')->result();
        }

        // echo json_encode($regis);
        $this->response($regis, 200);
    }
}
