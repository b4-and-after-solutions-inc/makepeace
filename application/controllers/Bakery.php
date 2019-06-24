<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bakery extends CI_Controller {

	function __construct() {
    parent::__construct();
	}

	public function index() {
		$data['nav'] = "Home";
		$data['slides'] = $this->records_model->get_sliders($this->input->post('id'), 1);
		$data['product_list'] = $this->records_model->get_products(0);
		$data['header_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(1);
		$data['footer_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(2);

		$this->load->view('client/includes/header', $data);
		$this->load->view('client/index');
		$this->load->view('client/includes/footer');
	}

	public function about_us() {
		$data['nav'] = "About Us";
		$data['product_list'] = $this->records_model->get_products(0);
		$data['header_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(1);
		$data['footer_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(2);

		$this->load->view('client/includes/header', $data);
		$this->load->view('client/about_us');
		$this->load->view('client/includes/footer');
	}

	public function products() {
		$data['nav'] = "Products";
		$data['product_list'] = $this->records_model->get_products(0);
		$data['category_list'] = $this->records_model->get_categories();
		$data['header_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(1);
		$data['footer_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(2);
		//initializing cart session
		if(!isset($_SESSION['cart_details'])){
			$cart = array();
			$this->session->set_userdata('cart_details', $cart);
		}
		$this->load->view('client/includes/header', $data);
		$this->load->view('client/products');
		$this->load->view('client/includes/footer');
	}

	public function contacts() {
		$data['nav'] = "Contacts";
		$data['product_list'] = $this->records_model->get_products(0);
		$data['header_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(1);
		$data['footer_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(2);

		$this->load->view('client/includes/header', $data);
		$this->load->view('client/contacts');
		$this->load->view('client/includes/footer');
	}

	public function checkout() {
		if(!isset($_SESSION['cart_details']) || count($_SESSION['cart_details']) == 0){
			header('Location: '.base_url());
		} else {
			$data['nav'] = "Checkout Form";
			$data['cart_details'] = $_SESSION['cart_details'];
			$data['product_list'] = $this->records_model->get_products(0);
			$data['header_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(1);
			$data['footer_logo'] = base_url()."uploads/logo/". $this->records_model->get_logo(2);

			$this->load->view('client/includes/header', $data);
			$this->load->view('client/checkout', $data);
			$this->load->view('client/includes/footer');
		}
	}

	public function order() {
		$order_header = $this->input->post('order_header');
		$order_details = $_SESSION['cart_details'];

		$result = $this->bread_model->order($order_header, $order_details);
		if($result){
			$this->mail($order_header['email']);
			$this->destroy_session();
		}
		$this->output->set_content_type("application/json")
		->set_output(json_encode($result));
	}

	public function set_cart_session() {
		$cart = $this->input->post("cart");

		$this->session->set_userdata('cart_details', $cart);
	}

	public function destroy_session() {
		$this->session->sess_destroy('cart_details');
	}
	public function cancel(){
		$mail = $this->records_model->cancel($this->input->post('id'));
	}

	public function paid(){
		$mail = $this->records_model->paid($this->input->post());
		if($this->input->post('delivery_action') == 0){
	  		$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'tchs.sample3@gmail.com',
			    'smtp_pass' => 'tchs2019',
			    'mailtype'  => 'html',
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('tchs.sample3@gmail.com', 'Make Peace Bakery');
	        $this->email->to($mail['email_address']);
			$this->email->subject('Payment Received');
			$message = "Dear Customer,   <br> <br> &emsp;&emsp;We have received
			your payment. We will now process your order and expect us to deliver the
			products by <b>".$mail['ddate']."</b> to <b>".$mail['address']."</b>. <br><br>Thank you so
			much for partnering with us and it is truly an honor to serve you!. <br>";
			$this->email->message($message);
			$result = $this->email->send();
	  	}
	}
	public function mail($mail){
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'tchs.sample3@gmail.com',
		    'smtp_pass' => 'tchs2019',
		    'mailtype'  => 'html',
		    'charset'   => 'iso-8859-1'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$orders = $_SESSION['cart_details'];
		$tr = '<table style=\'text-align:center; margin:auto;\' width=\'500px\' border=\'1\' cellpadding=\'0\' cellspacing=\'0\'>
		   <thead>
		   	<tr>
		   		<th>Item</th>
		   		<th>Quantity</th>
		   		<th>Price</th>
		   		<th>Total</th>
		   	</tr>
		   </thead>
		   <tbody>';
		$grand = 0;
		foreach ($orders as $k) {
			$total = $k['product_details']['price'] * $k['quantity'];
			$grand+= $total;
			$tr .= '<tr>
						<td>'. $k['product_details']['name'].'</td>
						<td>'. $k['quantity']. '</td>
						<td>'. $k['product_details']['price'] .'</td>
						<td>'. number_format($total, 2) .'</td>
					</tr>';
		}

		$tr .= '</tbody>
		   <tbody>
		   	<tr>
		   		<td colspan=\'3\' style=\'text-align:right;padding:4px;\'></td>
		   		<td><b>'. number_format($grand, 2) .'</b></td>
		   	</tr>
		   </tbody>
		</table>';
		$this->email->from('tchs.sample3@gmail.com', 'Make Peace Bakery');
        $this->email->to($mail);
        $message = "Dear Customer,
        		    <br>
        		    <br>
        		    Your order have been received and will be processed after payment. Order is as follows:
        		    <br> ".$tr."
	        		 You can send us payment through bank deposit and we will confirm your payment by sending us a picture of the receipt. You can send deposit through this bank accounts:
	        		 <br><br>
	        		 <h4 style='margin-bottom:0;'>BDO:</h4>
	        		 <b>Account Name:</b> Make Peace <br>
	        		 <b>Account Number:</b> 1234567890 <br>
	        		 <br>
	        		 <h4 style='margin-bottom:0;'>GCASH:</h4>
	        		 <b>Number:</b> 09123128213
        		    <br>
        		    <br>

        		    <p style='text-align: center;font-style: italic;'>Because we are an artisanal bakery, we make sure that your bread/ pastries come to you fresh! We bake in small batches daily and sends out orders through Friday, Saturday!</p>
        		    <br>";
			$this->email->subject('Order Received');
			$this->email->message($message);
			$result = $this->email->send();
		}
}
