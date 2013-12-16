<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function index()
	{
		$this->output->enable_profiler(TRUE);
		$this->auth->restrict(TRUE);
		$this->load->model('registration_model');
		//$this->load->helper('mm_date_helper');
		$this->load->helper('mm_string_helper');
		
		$this->form_validation->set_rules('u_username', 'Username', 'trim|required|xss_clean|min_length[6]|max_length[20]|alpha_numeric');
		$this->form_validation->set_rules('u_password', 'Password', 'trim|required|xss_clean|alpha_numeric|min_length[6]|max_length[20]|md5');
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'matches[u_password]|trim|required|xss_clean|alpha_numeric|md5');
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
        	//check for duplicate username, email and id_number
        	$check_1 = $this->registration_model->validate_username($this->input->post('u_username'));
        	$check_2 = $this->registration_model->validate_email($this->input->post('u_email'));
        	$check_3 = $this->registration_model->validate_id($this->input->post('u_id_number'));
        	
        	if($check_1 === FALSE)
        	{ 
        		$data['error_msg'] = 'Username already exists. Try other.'; 
        	}
        	else
        	{
        		if($check_2 === FALSE)
        		{ $data['error_msg'] = 'Email has been used. Try other.'; }
        		else
        		{
        			if($check_3 === FALSE)
        			{ $data['error_msg'] = 'ID has been used. Try other.'; }
        			else
        			{
        				//inserting the valid data
        				$u_ucreate = $this->input->post('u_username');
						//$dcreate = now_date_time();
						
        				$u_username   = $this->input->post('u_username');
						$u_password   = $this->input->post('u_password');
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
						
						$sql = "insert into users (u_dcreate, u_ucreate, u_username, u_password, u_first_name, u_last_name,
									u_email, u_birthdate, u_gender, u_id_number, u_address, u_city, u_country, u_postcode,
									u_type)
								values (now(), '$u_ucreate', '$u_username', '$u_password', '$u_first_name',
									'$u_last_name', '$u_email', '$u_birthdate', '$u_gender', '$u_id_number',
									'$u_address', '$u_city', '$u_country', '$u_postcode', '0')";
						
						$this->db->query($sql);			
					
						if ($this->db->trans_status() === FALSE)
						{
							$this->db->trans_rollback();
							$data['error_msg'] = "Cannot Store Data, Please Try Again.";
						}
						else
						{
							$this->db->trans_commit();
							$data['success_msg'] = "You can now login with your Username and Password.";
						}
        			}
        		}
        	}
        	
        	$this->load->vars($data);
        	$this->load->view('registration');
        }
		elseif($this->input->post('reset_btn'))
		{ redirect('/registration'); }
		elseif($this->input->post('cancel_btn'))
		{ redirect('/'); }
		else
		{
			$this->load->view('registration');
		}
	}
}

/* End of file registration.php */
/* Location: ./application/controllers/registration.php */