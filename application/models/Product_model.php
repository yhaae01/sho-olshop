<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model 
{

    public function getDefaultValues()
    {
        return [
            'id_category'   => '',
            'slug'          => '',
            'title'         => '',
            'description'   => '',
            'price'         => '',
            'is_available'  => 1,
            'image'         => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'     => 'id_category',
                'label'     => 'Kategori',
                'rules'     => 'required',
            ],
            [
                'field'     => 'slug',
                'label'     => 'Slug',
                'rules'     => 'required|trim|callback_unique_slug',
            ],
            [
                'field'     => 'title',
                'label'     => 'Nama Produk',
                'rules'     => 'required|trim',
            ],
            [
                'field'     => 'description',
                'label'     => 'Deskripsi',
                'rules'     => 'required|trim',
            ],
            [
                'field'     => 'price',
                'label'     => 'Harga',
                'rules'     => 'required|trim|numeric',
            ],
            [
                'field'     => 'is_available',
                'label'     => 'Ketersediaan',
                'rules'     => 'required',
            ]
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config['upload_path']      = './assets/images/product';
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
        if (file_exists("./assets/images/product/$fileName")) {
            unlink("./assets/images/product/$fileName");
        }
    }

    public function getProductById($id)
    {
        return $this->db->get_where('product', ['id' => $id])->row_array();
    }

}

/* End of file Product_model.php */
