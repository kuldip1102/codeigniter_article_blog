<?php 

class Admin extends MY_Controller{

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('user_id')){
			return redirect('login');
		}
		$this->load->model('Articlesmodel');	
	}
	
	public function dashboard(){
		//model('Articlesmodel','articles') is second parameter is a alice name of the method it's easy to write in short name. 
		$this->load->library('pagination');
		$config = [
			'base_url' 	 => base_url('admin/dashboard'),
			'per_page'   => 3,
			'total_rows' => $this->Articlesmodel->num_rows(),
			'full_tag_open' => "<ul class='pagination'>",
			'full_tag_close' => "</ul>",
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',
			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
			'cur_tag_open' => "<li class='active'><a>",
			'cur_tag_close' => '</a></li>',

		];
		$this->pagination->initialize($config);
		$articles = $this->Articlesmodel->article_list($config['per_page'],$this->uri->segment(3)); 
		$this->load->view('admin/dashboard',['art'=>$articles]);
	}

	public function add_article(){
		$this->load->view('admin/add_article');
	}

	public function store_article(){
		if ($this->form_validation->run('add_article_rules')) {
		$post = $this->input->post();
			unset($post['submit']);
			if ($this->Articlesmodel->add_article($post)) {
				$this->session->set_flashdata('feedback','Article Added sucessfully.');
				$this->session->set_flashdata('feedback_class','alert-success');
			}else{
				$this->session->set_flashdata('feedback','Article failed to add, Please ');
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('admin/dashboard');
		}else{
			$this->load->view('admin/add_article');
		}
	}

	public function edit_article($id){
		$edit = $this->Articlesmodel->find_article($id);
		$this->load->view('admin/edit_article',['article'=>$edit]);
	}

	public function update_article(){
		if ($this->form_validation->run('add_article_rules')) {
			$post = $this->input->post();
			$article_id = $post['article_id'];
			unset($post['submit'],$post['article_id']);	
	 
			if ($this->Articlesmodel->update_article($article_id,$post)) {
				$this->session->set_flashdata('feedback','Article updated sucessfully.');
				$this->session->set_flashdata('feedback_class','alert-success');
			}else{
				$this->session->set_flashdata('feedback','Article failed to update, Please try again');
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('admin/dashboard');
		}else{
			$this->load->view('admin/edit_article');
		}
	}


	public function delete_article($article_id){
		if ($this->Articlesmodel->delete_model($article_id)) {
				$this->session->set_flashdata('feedback','Article Dleleted sucessfully.');
				$this->session->set_flashdata('feedback_class','alert-success');
			}else{
				$this->session->set_flashdata('feedback','Article failed to update, Please try again');
				$this->session->set_flashdata('feedback_class','alert-danger');
			}
			return redirect('admin/dashboard');
	}
}
?>