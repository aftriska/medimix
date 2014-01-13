<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');

        $user = $this->session->userdata('logged_user');
        $data['user'] = $user;
        
        /* 
        	-- get user privilege to check whether he/she is a free/premium user
        	-- if he/she is a premium user, he/she may see premium menu (data management)
        */
        
        //distinct disease data from suggestion table
        $data['diseases'] = $this->user_model->get_suggestions_diseases();
        
        if($this->input->post('get_se_btn'))
        {
        	$disease_name = $this->input->post('disease');
        	$data['se_disease'] = $disease_name;
        	$data['side_effects'] = $this->user_model->get_diseases_sideeffects($disease_name);
        	$data['suggestion'] = null;
        }
        elseif($this->input->post('get_sg_btn'))
        {
        	$disease_name = $this->input->post('disease');
        	$side_effect = $this->input->post('side_effect');
        	$data['se_disease'] = $disease_name;
        	$data['se_sideeffect'] = $side_effect;
        	$data['side_effects'] = $this->user_model->get_diseases_sideeffects($disease_name);
        	$data['suggestion'] = $this->user_model->get_suggestion($disease_name,$side_effect);
        }
        else
        {
        	$data['side_effects'] = null;
        	$data['suggestion'] = null;
        }
        
        $data['menu'] = 'menu';
		$data['body'] = 'front_page';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	public function login()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict(TRUE);

		$this->form_validation->set_rules('u_username', 'Username', 'required|trim|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('u_password', 'Password', 'required|xss_clean|trim|md5|alpha_numeric');
		$this->form_validation->set_message('required', 'Required');

		if($this->form_validation->run() !== FALSE)
		{
			$u_username = $this->input->post('u_username');
			$u_password = $this->input->post('u_password');
			
			//echo $u_username.' and '.$u_password;
			
			$login = array($u_username, $u_password);

			if($this->auth->process_login($login))
			{
				$this->auth->redirect();
				// Login successful, let's redirect.
				//$data['app_msg'] = null;
			}
			else
			{
				$data['error_msg'] = 'Wrong username or password!';
				$this->load->vars($data);
			}
		}
		else
		{
			//$data['app_msg'] = null;
		}
		
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
	
	function change_password()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');

		$user = $this->session->userdata('logged_user');
		
		$this->form_validation->set_rules('cur_password', 'Current Password', 'trim|required|md5|xss_clean');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|alpha_numeric|min_length[6]|max_length[20]|md5');
		$this->form_validation->set_rules('retype_password', 'Retype New Password', 'matches[new_password]|trim|required|xss_clean|alpha_numeric|md5');
		
		if($this->form_validation->run() !== FALSE)
		{
			//new password may not be the same as old password
			if($this->input->post('cur_password') === $this->input->post('new_password'))
			{ $data['error_msg'] = 'New Password must be different than Current Password'; }
			else
			{
				//check if the old password is correct
				$check_1 = $this->user_model->validate_password($user,$this->input->post('cur_password'));
			
				if($check_1 === FALSE)
				{ $data['error_msg'] = 'The Current Password is Wrong.'; }
				else
				{
					$this->db->trans_begin();
				
					$new_password = $this->input->post('new_password');
				
					$sql = "UPDATE USERS SET
							U_PASSWORD = '$new_password',
							U_DMODIFY = now(),
							U_UMODIFY = '$user'
							WHERE UPPER(U_USERNAME) = UPPER('$user')";
				
					$this->db->query($sql);
				
					if($this->db->trans_status() === TRUE)
					{
						$this->db->trans_commit();
						$data['success_msg'] = 'Your Password Has Been Changed.';
					}
					else
					{
						$this->db->trans_rollback();
						$data['error_msg'] = 'Failed to Change Password. Please Try Again.';
					}
				}
			}
		}
		
		$data['menu'] = 'menu';
		$data['body'] = 'change_password';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function forgot_password()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict(TRUE);
		
		$this->form_validation->set_rules('u_email', 'e-Mail', 'required|valid_email');
		
		if($this->form_validation->run() !== FALSE)
        {
        	//check apakah e-mail-nya terdaftar
        	$u_email = $this->input->post('u_email');
        	
        	$sql = "SELECT * FROM USERS WHERE u_email='$u_email'";
			$query = $this->db->query($sql);

			if($query->num_rows() === 0)
			{
				$data['error_msg'] = 'This e-mail has not been registered.';
				$this->load->vars($data);
			}
			else
			{
				$newpass = random_string('alnum', 6);
				$newmd5 = md5($newpass);
				
				$this->db->trans_begin();
				
				$sql = "UPDATE USERS SET
						U_PASSWORD = '$newmd5',
						U_DMODIFY = now(),
						U_UMODIFY = 'reset_password'
						WHERE UPPER(u_email) = UPPER('$u_email')";
				
				$this->db->query($sql);
				
				if($this->db->trans_status() === TRUE)
				{
					$this->db->trans_commit();
					$this->load->helper('phpmailer');
					$title = '[no-reply] MediMix - Reset Password';
					$msgbody = '<p>Hi '.$u_email.',</p><br/>';
					$msgbody .= '<p>You have reset your password in MediMix. You can now login using your new password: <strong>'.$newpass.'</strong></p>';
					$msgbody .= '<p>Change your Password after login.<p>';
					$msgbody .= '<br/><br/><br/><br/>';
					$msgbody .= '<p>MediMix Admin</p>';
					$msgbody .= '<p>----DO NOT REPLY TO THIS E-MAIL----</p>';

					$to = ''.$u_email.'';

					if(send_email($to, 'aftrimarriska@gmail.com', $title , $msgbody) == TRUE)
					{
						$data['success_msg'] = 'Check your e-mail for the new Password.';
						$this->load->vars($data);
					}
				}
				else
				{
					$this->db->trans_rollback();
					$data['error_msg'] = 'Cannot Change Your Password. Please Try Again.';
					$this->load->vars($data);
				}
			}
        }
		$this->load->view('forgot_password');
	}
	
	function edit_profile()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->helper('mm_string_helper');
		
		$data['user'] = $this->session->userdata('logged_user');
		
		$data['user_data'] = $this->user_model->get_user_data($data['user']);
		
		$this->form_validation->set_rules('u_first_name', 'First Name', 'trim|required|xss_clean|alpha_name');
		$this->form_validation->set_rules('u_last_name', 'Last Name', 'trim|required|xss_clean|alpha_name');
		$this->form_validation->set_rules('u_email', 'e-mail', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('u_birthdate', 'Birth Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('u_gender', 'Gender', 'required');
		$this->form_validation->set_rules('u_id_number', 'ID Number', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('u_address', 'Address', 'trim|required|xss_clean|max_length[100]');
		$this->form_validation->set_rules('u_city', 'City', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('u_country', 'Country', 'trim|required|xss_clean|max_length[50]');
		$this->form_validation->set_rules('u_postcode', 'Post Code', 'trim|required|xss_clean|max_length[50]');
		
		if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
            $data['validation'] = 'something not important';
            
            $check_2 = $this->user_model->validate_email($this->input->post('u_email'),$data['user']);
        	$check_3 = $this->user_model->validate_id($this->input->post('u_id_number'),$data['user']);
        	
        	if($check_2 === FALSE)
			{ $data['error_msg'] = 'Email has been used. Try other.'; }
			else
			{
				if($check_3 === FALSE)
				{ $data['error_msg'] = 'ID has been used. Try other.'; }
				else
				{
					//updating the valid data
					
					$u_umodify	  = $data['user'];
					$u_first_name = quotes_to_entities(my_rman($this->input->post('u_first_name')));
					$u_last_name  = quotes_to_entities(my_rman($this->input->post('u_last_name')));
					$u_email  	  = $this->input->post('u_email');
					$u_birthdate  = $this->input->post('u_birthdate');
					$u_gender  	  = $this->input->post('u_gender');
					$u_id_number  = $this->input->post('u_id_number');
					$u_address    = $this->input->post('u_address');
					$u_city		  = $this->input->post('u_city');
					$u_country 	  = $this->input->post('u_country');
					$u_postcode   = $this->input->post('u_postcode');
					
					$this->db->trans_begin();
					
					$sql = "UPDATE USERS SET
							u_umodify='$u_umodify',
							u_dmodify=now(),
							u_first_name='$u_first_name',
							u_last_name='$u_last_name',
							u_birthdate='$u_birthdate',
							u_email='$u_email',
							u_gender='$u_gender',
							u_id_number='$u_id_number',
							u_address='$u_address',
							u_city='$u_city',
							u_country='$u_country',
							u_postcode='$u_postcode'
							WHERE u_username='$u_umodify'";
					
					$this->db->query($sql);			
				
					if ($this->db->trans_status() === FALSE)
					{
						$this->db->trans_rollback();
						$data['error_msg'] = "Cannot Store Data, Please Try Again.";
					}
					else
					{
						$this->db->trans_commit();
						$data['success_msg'] = "Your data has been updated.";
					}
				}
			}
        }
        else
        {
        	$data['validation'] = null;
        }
        
		$data['menu'] = 'menu';
		$data['body'] = 'edit_profile';
		$this->load->vars($data);
		$this->load->view('template');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
