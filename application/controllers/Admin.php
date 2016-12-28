<?php 

class Admin extends MY_Controller{

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_id')){
			return redirect('login');
		}
	}
	
	public function dashboard(){
		//model('Articlesmodel','articles') is second parameter is a alice name of the method it's easy to write in short name. 
		$this->load->model('Articlesmodel');
		$articles = $this->Articlesmodel->article_list(); 
		$this->load->view('admin/dashboard',['art'=>$articles]);
	}

	public function add_article(){


	}

	public function edit_article(){


	}

	public function delete_article(){

		
	}
}
?>