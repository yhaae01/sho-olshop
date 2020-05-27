<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function index()
    {
        $this->load->view("layouts/template-admin/header");
        $this->load->view("pages/admin/index");
        $this->load->view("layouts/template-admin/footer");
    }

}

/* End of file Admin.php */
