<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class records_model extends CI_Model{

	function get_products($active_only){
		if($active_only == 1){
			$act  = "";
		}
		else {
			$act  = "WHERE active = 1";
		}
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products`  $act ORDER BY active desc")->result();
	}

	function get_logo($type){
		return $this->db->query("SELECT * FROM `logo` WHERE id = ?", array($type))->row_array()['path'];
	}
	function get_featured_products(){
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products` WHERE is_featured = 1")->result();
	}
	function get_sliders($post, $active){
	  if($active == 1) {
	  	$where = 'WHERE ACTIVE = 1';
	  }
	  else {
	  	$where = '';
	  }
	  if(is_null($post)){
	  	return $this->db->query("SELECT `id`, `title`, `body`, `picture`, Coalesce(`link_title`, '') `link_title`, Coalesce(`link`, '') link, `active` FROM `home_slider` $where ORDER BY active desc")->result();
	  }
	  else{
	  	return $this->db->query("SELECT `id`, `title`, `body`, `picture`, Coalesce(`link_title`, '') `link_title`, 
	  										Coalesce(`link`, '') link, `active` FROM `home_slider` 
	  							WHERE id =  ?", array($post))->row_array();
	  }
	}

	function get_categories(){
	  return $this->db->query("SELECT `id`, `category`, `color_class` FROM `categories`")->result();
	}
	function get_orders($post){
		if(isset($post['action'])){
			$delivery = "and delivery_date = " .$this->db->escape($post['deliver_date']);
		}
		else {
			$delivery = '';
		}
	  return $this->db->query("SELECT `id`, `customer_name`, `contact_number`, `delivery_date`, `email_address`, `order_status`, 
	  			DATE_FORMAT(created_datetime, '%d %M, %Y %h:%i %p') `odate`, address, (SELECT SUM(quantity * price) total 
	  			FROM `order_details` 
	  			WHERE order_id = oh.id) order_total FROM `order_header` oh WHERE 1 $delivery")->result();
	}
	function get_order($id){
	  $order = $this->db->query("SELECT `id`, `customer_name`, `contact_number`, `email_address`, `order_status`, 
	  			DATE_FORMAT(created_datetime, '%d %M, %Y %h:%i %p') `odate`, `address`
	  			FROM `order_header` WHERE id = ?", array($id))->row_array();
	  $order['products'] = $this->db->query("SELECT item, price, quantity FROM `order_details` WHERE `order_id` = ?", array($id))->result();
	  return $order;
	}
	function cancel($post){
	  $this->db->query("UPDATE `order_header` SET `order_status`= 2 WHERE id = ?", array($post));	  
	}
	function paid($post){
	  $this->db->query("UPDATE `order_header` SET `order_status`= 1, `delivery_date`= ? 
	  						WHERE id = ?", array($post['ddate'], $post['id']));
	  if($post['delivery_action'] == 0){
	  	return $this->db->query("SELECT email_address, DATE_FORMAT(created_datetime, '%M %d, %Y') ddate,
	  							address FROM order_header WHERE id = ?", array($post['id']))->row_array();
	  }
	  
	}
	function get_product($id){
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products` WHERE id = ?", array($id))
	  			  ->row_array();
	}
	function get_total_products(){
		return $this->db->query("SELECT COUNT(`id`) as TOTAL FROM `products` WHERE 1")->row_array()['TOTAL'];
	}

	function get_catalog(){
	  	return array('products' => $this->get_products(1), 'count' => $this->get_total_products(), 'featured'=> $this->get_featured_products());
	}

	function save($post){
		$act = $post['action'];
		unset($post['action']);
		switch ($act) {
			case 'add':
				unset($post['id']);
				$post['pic'] = $this->upload_file($_FILES['pic']);
				$this->db->insert('products', $post);
			break;
			case 'edit':
				if(!isset($_FILES['pic'])){
					unset($post['pic']);
				}
				else{
					$post['pic'] = $this->upload_file(0,$_FILES['pic']);
				}
				$this->db->where('id', $post['id'])
						 ->update('products', $post);
			break;
			case 'edit_slide':
				if(!isset($_FILES['pic'])){
					unset($post['pic']);
				}
				else{
					$post['picture'] = $this->upload_file(1,$_FILES['pic']);
				}
				$this->db->where('id', $post['id'])
						 ->update('home_slider', $post);
			break;
		}
	}
	function upload_file($action){
		$path = $action == 1?'slider':'products';
		$config = array(
		'upload_path' => "./uploads/$path/",
		'allowed_types' => "jpg|png|jpeg",
		'overwrite' => TRUE,
		'max_size' => "10048000"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload('pic')){
			$data = array('upload_data' => $this->upload->data());
			return $_FILES['pic']['name'];
		}
		else{
			$error = array('error' => $this->upload->display_errors());
			return 0;
		}
	}
	//changing password
	function password_change($post){
		
		$oldPassword = $post['oldPassword'];
		$newPassword = $post['newPassword'];
		$query =$this->db->query("SELECT * FROM `admin` WHERE password = ?", md5($post['oldPassword']));
		if ($query->num_rows() > 0) {
			$this->db->set('password', md5($newPassword));
			$this->db->where('id', $this->session->userdata('id'));
			$this->db->update('admin');
			return 1;
		}
		else{
			return 0;
		}
		
		
	}
}
?>
