<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model 
{

    public $table = 'orders';

    public function getOrders()
    {
        return $this->db->get('orders');
    }

}

/* End of file Order_model.php */
