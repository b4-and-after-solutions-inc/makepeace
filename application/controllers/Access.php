<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller{

	public function error_404(){
    	$cihead['Title'] = '404 Error'; $cihead['Description'] = ''; $cihead['Menu1'] = '';

		$this->load->view('includes/cihead', $cihead);
		$this->load->view('errors/html/error_404_lteci');
		$this->load->view('includes/cifoot');
  	}

	public function login(){
		$this->load->view('admin/login');
	}

	public function sign_in(){
		echo $this->user_model->sign_in($this->input->post());
	}
	public function sign_out(){
		$this->user_model->sign_out();
		redirect(base_url().'Access/login/', 'refresh');
	}
}
