<?php 

class User extends MY_Controller{

	public function index(){
		$this->load->model('Articlesmodel');
		$this->load->library('pagination');
		$config = [
			'base_url' 	 => base_url('user/index'),
			'per_page'   => 5,
			'total_rows' => $this->Articlesmodel->all_articles(),
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
		$articles_list = $this->Articlesmodel->all_article_list($config['per_page'],$this->uri->segment(3)); 
		$this->load->view('public/article_list',['art_list'=>$articles_list]);
	}

	public function search(){
		$this->form_validation->set_rules('query','Query','required');
		if (!$this->form_validation->run()) 
			$this->index();
			$query=$this->input->post('query');
			$this->load->model('Articlesmodel');
			$article =$this->Articlesmodel->search($query);
			$this->load->view('public/search',['art_list'=>$article]);
	}
}
?>