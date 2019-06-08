<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class records_model extends CI_Model{

	function get_products(){
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products` WHERE 1 ORDER BY active desc")->result();
	}
	function get_featured_products(){
	  return $this->db->query("SELECT `id`, `name`, `description`, `pic`, `price`, `category_id`, `is_featured`, `active` FROM `products` WHERE is_featured = 1")->result();
	}
	function get_sliders($post, $active){
	  if($active = 1) {
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

	function save_product($post){
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
					$post['pic'] = $this->upload_file($_FILES['pic']);
				}
				$this->db->where('id', $post['id'])
						 ->update('products', $post);
			break;
		}
	}
	function upload_file(){
		$config = array(
		'upload_path' => "./uploads/products/",
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
}
?>
