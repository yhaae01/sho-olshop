<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $role = $this->session->userdata('role');

        if ($role !== 'admin') {
            redirect(base_url('home'));
            return;
        }
    }

    public function index($page = null)
	{
        $data['title']      = 'Admin: Beranda';
        $data['page']       = 'pages/admin/index';
        
        $this->view($data);
    }

}

/* End of file Home.php */
