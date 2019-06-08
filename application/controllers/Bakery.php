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
	
	public function typography()
	{
		$data['nav'] = "Typography";
		
		$this->load->view('client/includes/header', $data);
		$this->load->view('client/typography');
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