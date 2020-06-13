<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller 
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');
        $this->id   = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url());
            return;
        }
    }

    public function index($input = null)
    {
		$this->checkout->table = 'cart';
		$data['provinsi']	   = $this->checkout->getProv();

		$data['cart']	= $this->checkout->select([
				'cart.id', 'cart.qty', 'cart.subtotal',
				'product.title', 'product.image', 'product.price'
			])
			->join('product')
			->where('cart.id_user', $this->id)
			->get();

		if (! $data['cart']) {
			$this->session->set_flashdata('warning', 'Tidak ada produk di dalam keranjang.');
			redirect(base_url('/'));
		}

		$data['input']	= $input ? $input : (object) $this->checkout->getDefaultValues();
		$data['title']	= 'Checkout';
		$data['page']	= 'pages/checkout/index';

		$this->view($data);
	}
	
	public function getKab($id_prov)
	{
		$kab=$this->checkout->getKab($id_prov);
		echo"<option value=''>Pilih Kota/Kab</option>";
		foreach($kab as $k){
			echo "<option value='{$k->id_kab}'>{$k->nama}</option>";
		}
	}
	
	public function getKec($id_kab)
	{
		$kec=$this->checkout->getKec($id_kab);
		echo"<option value=''>Pilih Kecamatan</option>";
		foreach($kec as $k){
			echo "<option value='{$k->id_kec}'>{$k->nama}</option>";
		}
	}

	public function getKel($id_kec)
	{
		$kel=$this->checkout->getKel($id_kec);
		echo"<option value=''>Pilih Kelurahan/Desa</option>";
		foreach($kel as $k){
			echo "<option value='{$k->id_kel}'>{$k->nama}</option>";
		}
	}

    public function create()
	{
		if (!$_POST) {
			redirect(base_url('checkout'));
		} else {
			$input = (object) $this->input->post(null, true);
		}

		if (!$this->checkout->validate()) {
			return $this->index($input);
		}

		$total	= $this->db->select_sum('subtotal')
					->where('id_user', $this->id)
					->get('cart')
					->row()
					->subtotal;

		$data = [
			'id_user'	=> $this->id,
			'date'		=> date('Y-m-d'),
			'invoice'	=> $this->id.date('YmdHis'),
			'total'		=> $total,
			'name'		=> $input->name,
			'address'	=> $input->address,
			'phone'		=> $input->phone,
			'status'	=> 'waiting'
		];

		if ($order = $this->checkout->create($data)) {
			$cart = $this->db->where('id_user', $this->id)
					->get('cart')->result_array();
			foreach($cart as $row) {
				$row['id_orders']	= $order;
				unset($row['id'], $row['id_user']);
				$this->db->insert('orders_detail', $row);
			}

			$this->db->delete('cart', ['id_user' => $this->id]);

			$this->session->set_flashdata('success', 'Data berhasil disimpan.');

			$data['title']		= 'Checkout Success';
			$data['content']	= (object) $data;
			$data['page']		= 'pages/checkout/success';

			$this->view($data);
		} else {
			$this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
			return $this->index($input);
		}
	}

}

/* End of file Checkout.php */
