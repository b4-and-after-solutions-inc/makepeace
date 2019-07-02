<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bread_model extends CI_MODEL {

	public function order($order_header, $order_details){
		$order_header = array(
			"customer_name" => $order_header['first_name']. " " .$order_header['last_name'],
			"contact_number" => $order_header['contact'],
			"email_address" => $order_header['email'],
			"address" => $order_header['address']
		);

		$result_header = $this->db->insert('order_header', $order_header);

		$order_id = $this->db->insert_id();

		if($result_header) {
			for($i = 0; $i < count($order_details); $i++) {
				$order_desc = array(
					"product_id" => $order_details[$i]['product_details']['id'],
					"item" => $order_details[$i]['product_details']['name'],
					"price" => $order_details[$i]['product_details']['price'],
					"quantity" => $order_details[$i]['quantity'],
					"order_id" => $order_id
				);

				$this->db->insert('order_details', $order_desc);
			}
			$result = "Success";
		} else {
			$result = "Fail";
		}

		return $result;
	}

}
?>
