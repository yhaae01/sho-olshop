<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model 
{

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getProductWhere($where = null)
    {
        return $this->db->get_where('product', $where);
    }

    public function getOrderWhere($where = null)
    {
        return $this->db->get_where('orders', $where);
    }

}

/* End of file Admin_model.php */
