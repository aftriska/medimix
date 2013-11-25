<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->auth->restrict();

        $user = $this->session->userdata('logged_user');
        $data['user'] = $user;
        
        /* 
        	-- get user privilege to check whether he/she is a free/premium user
        	-- if he/she is a premium user, he/she may see premium menu (data management)
        */
        
        $this->load->vars($data);
        $this->load->view('front_page');
	}
	
	public function login()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict(TRUE);

		$this->form_validation->set_rules('u_username', 'Username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('u_password', 'Password', 'required|xss_clean|trim|md5|alpha_numeric');
		$this->form_validation->set_message('required', 'Required');

		if($this->form_validation->run() !== FALSE)
		{
			$u_username = $this->input->post('u_username');
			$u_password = $this->input->post('u_password');
			$login = array($u_username, $u_password);

			if($this->auth->process_login($login))
			{
				$this->auth->redirect();
				// Login successful, let's redirect.
				$data['app_msg'] = null;
			}
			else
			{
				$data['app_msg'] = 'Wrong username or password!';
			}
		}
		else
		{
			$data['app_msg'] = null;
		}

		$this->load->vars($data);
		$this->load->view('welcome_message');
	}

	function logout()
	{
		if($this->auth->logout())
		redirect('/welcome');
	}

	function home()
	{
		redirect('/');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */