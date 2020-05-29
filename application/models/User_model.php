<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model 
{

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'email'     => '',
            'role'      => '',
            'is_active' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|callback_unique_email'
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
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

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

}

/* End of file User_model.php */
