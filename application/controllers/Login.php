<?php 

class Login extends MY_Controller{

	public function index(){
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}
	public function admin_login(){

		// form_validation library to validate input fields admin_login view 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User name','required|alpha');
		$this->form_validation->set_rules('password','Password','required');


		//error is shown in div tag and color for all error.
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run()) {

			// get the post data form to controller
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//echo "Username : $username And Password : $password";
			
			//load the model of login 
			$this->load->model('loing');
				$login_id = $this->loing->login_valid($username , $password);

			if ($login_id) {
				$k =$this->session->set_userdata('user_id',$login_id);
				// it returns to the redirect the Admin controller in dashboard method 
				return redirect('admin/dashboard');
			}
			else{
				$this->session->set_flashdata('login_faild','invalid username/password.');
				return redirect('login');
			}
		}
		else{
			$this->load->view('public/admin_login');
			//echo validation_errors();
		}
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}
?>