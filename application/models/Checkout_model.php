<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends MY_Model 
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'address'   => '',
            'phone'     => '',
            'status'    => ''
        ];
    }

    public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'name',
				'label'	=> 'Nama',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'address',
				'label'	=> 'Alamat',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'phone',
				'label'	=> 'Telepon',
				'rules'	=> 'trim|required|max_length[13]'
			],
		];

		return $validationRules;
	}

	public function getProv()
	{
		$sql="SELECT * FROM provinsi";
		$query=$this->db->query($sql);
		return $query->result();
	}

	public function getKab($id_prov)
	{
        $sql="SELECT * FROM kabupaten WHERE id_prov={$id_prov} ORDER BY nama";
        $query=$this->db->query($sql);
        return $query->result();
	}

	public function getKec($id_kab)
	{
        $sql="SELECT * FROM kecamatan WHERE id_kab={$id_kab} ORDER BY nama";
        $query=$this->db->query($sql);
        return $query->result();
	}

	public function getKel($id_kec)
	{
        $sql="SELECT * FROM kelurahan WHERE id_kec={$id_kec} ORDER BY nama";
        $query=$this->db->query($sql);
    return $query->result();
	}

}

/* End of file Checkout_model.php */
