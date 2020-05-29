<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');

        if ($role == 'admin') {
            redirect(base_url('admin'));
            return;
        }
    }

    public function index($page = null)
	{
		$this->load->model('Home_model');
        $data['title']      = 'Homepage';
        $data['page']       = 'pages/home/index';
        $data['content']    = $this->Home_model->select(
                [
                    'product.id', 'product.title AS product_title', 
                    'product.description', 'product.image', 
                    'product.price', 'product.is_available',
                    'category.title AS category_title',
                    'category.slug AS category_slug'
                ]
            )
            ->join('category')
            ->where('product.is_available', 1)
            ->paginate($page)
            ->get();
        
        $data['total_rows'] = $this->Home_model->where('product.is_available', 1)->count();
        $data['pagination'] = $this->Home_model->makePagination(
            base_url('home'), 2, $data['total_rows']
        );
        $this->view($data);
    }

}

/* End of file Home.php */
