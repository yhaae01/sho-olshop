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

}

/* End of file User_model.php */
