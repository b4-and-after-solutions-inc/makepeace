<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class records_model extends CI_Model{

	function get_products(){
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products` WHERE 1 ORDER BY active desc")->result();
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
	function get_orders(){
	  return $this->db->query("SELECT `id`, `customer_name`, `contact_number`, `email_address`, `order_status`, `created_datetime` FROM `order_header`")->result();
	}
	function get_product($id){
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products` WHERE id = ?", array($id))
	  			  ->row_array();
	}
	function get_total_products(){
		return $this->db->query("SELECT COUNT(`id`) as TOTAL FROM `products` WHERE 1")->row_array()['TOTAL'];
	}

	function get_catalog(){
	  	return array('products' => $this->get_products(), 'count' => $this->get_total_products(), 'featured'=> $this->get_featured_products());
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

	function password_change(){
		$userEmail=$this->input->post('userEmail');
		$oldPassword=$this->input->post('oldPassword');
		$newPassword=$this->input->post('newPassword');


		$this->db->set('password', md5($newPassword));
		$this->db->where('email', $userEmail);
		$this->db->update('admin');
		//return $result;	
		return $this->db->affected_rows();
		
	}
}
?>
