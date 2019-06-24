<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Dashboard_model extends CI_Model{
	//get count Products
	public function get_ProductNumber(){
	    $this->db->select("count(*) as count_products");                        
	    $query = $this->db->get("products");          
	    return $query->result();            
	}

	//get count orders
	public function get_OrderNumber(){
	    $this->db->select("count(*) as count_order");                        
	    $query = $this->db->get("order_header");          
	    return $query->result();            
	}

	//get count category
	public function get_CategoryNumber(){
	    $this->db->select("count(*) as count_category");                        
	    $query = $this->db->get("categories");          
	    return $query->result();            
	}

	//get count delivery
	/*public function get_DeliveryNumber(){
	    $this->db->select("count(*) as count_delivery");                        
	    $query = $this->db->get("order_header");          
	    return $query->result();            
	}
	*/

	function get_sales_report(){
		$user_id = $this->session->userdata('id');
		$query = "SELECT DISTINCT DATE_FORMAT(oh.delivery_date, '%M') as delivery_date, SUM(od.quantity) AS qty FROM order_header as oh inner join order_details as od on oh.id = od.order_id WHERE oh.delivery_date IS NOT NULL GROUP BY oh.delivery_date ";
		$row = $this->db->query($query);
		return $row->result_array();
	}

	function get_product_report(){
		$user_id = $this->session->userdata('id');
		$query = "SELECT DISTINCT od.item as product, SUM(od.quantity) AS qty FROM order_header as oh inner join order_details as od on oh.id = od.order_id WHERE oh.delivery_date IS NOT NULL GROUP BY od.item ";
		$row = $this->db->query($query);
		return $row->result_array();
	}
}
?>
