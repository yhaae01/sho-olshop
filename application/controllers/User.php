<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        
    }

    public function index($page = null)
    {
        $data['title']      = 'Admin Pengguna';
        $data['content']    = $this->user->paginate($page)->get();
        $data['total_rows'] = $this->user->count(); 
        $data['pagination'] = $this->user->makePagination(base_url('user'), 2, $data['total_rows']);
        $data['page']       = 'pages/user/index';

        $this->view($data);
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('user'));
        }

        $user    = $this->user->where('id', $id)->first();

        if (!$user) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan');
            redirect(base_url('user'));
        }

        if ($this->user->where('id', $id)->delete()) {
            $this->user->deleteImage($user->image);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!    ');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('user'));
    }

    public function uploadImages($fieldName, $fileName)
    {
        $config['upload_path']      = './assets/images/user';
        $config['file_name']        = $fileName;
        $config['allowed_types']    = 'gif|jpg|png|JPG|PNG|jpeg';
        $config['max_size']         = 1024;
        $config['max_width']        = 0;
        $config['max_height']       = 0;
        $config['overwrite']        = true;
        $config['file_ext_tolower'] = true;
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload($fieldName)){
            return $this->upload->data();
        }
        else{
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./assets/images/user/$fileName")) {
            unlink("./assets/images/user/$fileName");
        }
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('user'));
        }

        $keyword            = $this->session->userdata('keyword');

        $data['title']      = 'Admin Pengguna';
        $data['content']    = $this->user
            ->like('name', $keyword)
            ->orLike('email', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows'] = $this->user->like('name', $keyword)->orLike('email', $keyword)->count(); 
        $data['pagination'] = $this->user->makePagination(base_url('user/search'), 3, $data['total_rows']);
        $data['page']       = 'pages/user/index';

        $this->view($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('user'));
    }

}

/* End of file User.php */
