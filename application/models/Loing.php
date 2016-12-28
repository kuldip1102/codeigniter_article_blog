<?php 

class Loing extends CI_Model{

	public function login_valid($username , $password){
	
	$select = $this->db->where(['username'=>$username,'password'=>$password])
			 ->get('users');

			if ($select->num_rows()) {
			 	return $select->row()->id;
			 } else{
			 	return FALSE;
			 }

	}
}
?>