<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model 
{

    public function getDefaultValues()
    {
        return [
            'id'    => '',
            'slug'  => '',
            'title' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'     => 'slug',
                'label'     => 'Slug',
                'rules'     => 'required|trim|callback_unique_slug',
            ],
            [
                'field'     => 'title',
                'label'     => 'Kategori',
                'rules'     => 'required|trim',
            ]
        ];

        return $validationRules;
    }

}

/* End of file Category_model.php */
