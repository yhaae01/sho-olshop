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

}

/* End of file Product_model.php */
