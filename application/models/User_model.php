<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class User_model extends CI_Model{
	function sign_in($input){
		$sql = "SELECT `id`, `name`, `email` FROM `admin` WHERE  (USERNAME = ? and PASSWORD = ?)";
		$query_result=$this->db->query($sql, array($input['username'], md5($input['password'])));
		if ($query_result->num_rows() > 0){
			foreach ( $query_result->result() as $row ){
				$sess_array = array(
			           'id'		=> $row->id,
                       'name'	=> $row->name,
                       'email'	=> $row->email
			    );
			    $this->session->set_userdata($sess_array);
			}
			return 1;
		}
		else
			return 0;
	}

	function sign_out(){
		$this->session->sess_destroy();
	}

}
?>
