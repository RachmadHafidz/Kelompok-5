<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'download'));
    }

    public function index()
    {
        $this->load->view('client/download_sk');
    }

    public function lakukan_download()
    {
        force_download('file/1.docx', NULL);
    }
}
