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
	
}