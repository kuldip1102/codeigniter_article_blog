<?php 

class User extends MY_Controller{

	public function index(){

		$this->load->view('public/article_list');
	}
}
?>