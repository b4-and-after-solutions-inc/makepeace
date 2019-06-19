<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bakery extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index(){
		$data['nav'] = "Home";
		$data['slides'] = $this->records_model->get_sliders($this->input->post('id'), 1);
		$this->load->view('client/includes/header', $data);
		$this->load->view('client/index');
		$this->load->view('client/includes/footer');
	}

	public function about_us()
	{
		$data['nav'] = "About Us";

		$this->load->view('client/includes/header', $data);
		$this->load->view('client/about_us');
		$this->load->view('client/includes/footer');
	}

	public function products()
	{
		$data['nav'] = "Products";
		$data['product_list'] = $this->records_model->get_products();
		$data['category_list'] = $this->records_model->get_categories();
		//initializing cart session
		if(!isset($_SESSION['cart_details'])){
			$cart = array();
			$this->session->set_userdata('cart_details', $cart);
		}
		$this->load->view('client/includes/header', $data);
		$this->load->view('client/products');
		$this->load->view('client/includes/footer');
	}

	public function contacts()
	{
		$data['nav'] = "Contacts";

		$this->load->view('client/includes/header', $data);
		$this->load->view('client/contacts');
		$this->load->view('client/includes/footer');
	}

	public function checkout()
	{
		if(!isset($_SESSION['cart_details']) || count($_SESSION['cart_details']) == 0){
			header('Location: '.base_url());
		} else {
			$data['nav'] = "Checkout Form";
			$data['cart_details'] = $_SESSION['cart_details'];

			$this->load->view('client/includes/header', $data);
			$this->load->view('client/checkout', $data);
			$this->load->view('client/includes/footer');
		}
	}

	public function order()
	{
		$order_header = $this->input->post('order_header');
		$order_details = $_SESSION['cart_details'];

		$result = $this->bread_model->order($order_header, $order_details);
		if($result){
			$this->destroy_session();
		}
		$this->output
				->set_content_type("application/json")
				->set_output(json_encode($result));
	}

	public function set_cart_session()
	{
		$cart = $this->input->post("cart");

		$this->session->set_userdata('cart_details', $cart);
	}

	public function destroy_session()
	{
		$this->session->sess_destroy();
	}

}
