<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_medication extends CI_Controller {

	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');
		$this->load->model('medication_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        //get patient's diseases
        $data['pds'] = $this->disease_model->get_patient_diseases($user_id);
        
        //get medicines
        $data['ms'] = $this->medication_model->get_medicines();
        
        //get patient's medication data
        $data['dms'] = $this->medication_model->get_patient_medication($user_id);
        
        //validate the form
        $this->form_validation->set_rules('d_id', 'Disease', 'required');
        $this->form_validation->set_rules('m_id', 'Medicine', 'required');
        $this->form_validation->set_rules('dm_prescribed', 'Prescribed Information', 'required');
		$this->form_validation->set_rules('dm_dose', 'Diagnose Date', 'trim|required|xss_clean|alpha_name');
		$this->form_validation->set_rules('dm_start_using', 'Start Using Date', 'required');
		
		//insert the data
		if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
			//check if combination of disease and med on the same start date is exist
			
			$dm_ucreate   = $user;
			$d_id   	  = $this->input->post('d_id');
			$m_id   	  = $this->input->post('m_id');
			$u_id 		  = $user_id;
			$dm_prescribed   = $this->input->post('dm_prescribed');
			$dm_dose   	  = $this->input->post('dm_dose');
			$dm_start_using  = $this->input->post('dm_start_using');
			$dm_finish_using = $this->input->post('dm_finish_using');
			
			$this->db->trans_begin();
			
			$sql = "insert into disease_medicines (dm_dcreate, dm_ucreate, d_id, u_id, m_id,
						dm_prescribed, dm_dose, dm_start_using, dm_finish_using)
					values (now(), '$dm_ucreate', '$d_id', '$u_id', '$m_id',
						'$dm_prescribed', '$dm_dose', '$dm_start_using', '$dm_finish_using')";
			
			$this->db->query($sql);			
		
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				$data['error_msg'] = "Cannot Store Data, Please Try Again.";
			}
			else
			{
				$this->db->trans_commit();
				$data['success_msg'] = "Your data has been recorded.";
			}
		}
        
        $data['menu'] = 'menu';
		$data['body'] = 'my_medication';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function delete()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');
		$this->load->model('medication_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        $data['dm_id'] = $this->input->post('dm_id');
        $data['dm'] = $this->medication_model->get_selected_medication($data['dm_id']);
        
        $this->form_validation->set_rules('dm_id', '', 'required');
        
        if($this->input->post('delete_btn') && $this->form_validation->run() !== FALSE)
        {
        	$dm_umodify	= $user;
        	$dm_id = $data['dm_id'];
			
			$this->db->trans_begin();
			
			$sql = "UPDATE disease_medicines SET
					dm_umodify='$dm_umodify',
					dm_dmodify=now(),
					deleted_by_user='Y'
					WHERE dm_id='$dm_id'";
			
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
        
        $data['menu'] = 'menu';
		$data['body'] = 'my_medication_delete';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function edit()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');
		$this->load->model('medication_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        $data['dm_id'] = $this->input->post('dm_id');
        $data['dm'] = $this->medication_model->get_selected_medication($data['dm_id']);
        
        $this->form_validation->set_rules('dm_id', '', 'required');
        $this->form_validation->set_rules('dm_prescribed', 'Prescribed Information', 'required');
		$this->form_validation->set_rules('dm_dose', 'Diagnose Date', 'trim|required|xss_clean|alpha_name');
		$this->form_validation->set_rules('dm_start_using', 'Start Using Date', 'required');
		
        if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
        	$data['validation'] = 'only for validation purpose';
        	
        	$dm_umodify	= $user;
        	$dm_id = $data['dm_id'];
        	$dm_prescribed = $this->input->post('dm_prescribed');
        	$dm_dose = $this->input->post('dm_dose');
        	$dm_start_using = $this->input->post('dm_start_using');
        	$dm_finish_using = $this->input->post('dm_finish_using');
			
			$this->db->trans_begin();
			
			$sql = "UPDATE disease_medicines SET
					dm_umodify='$dm_umodify',
					dm_dmodify=now(),
					dm_prescribed='$dm_prescribed',
					dm_dose='$dm_dose',
					dm_start_using='$dm_start_using',
					dm_finish_using='$dm_finish_using'
					WHERE dm_id='$dm_id'";
			
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
        else
        {
        	$data['validation'] = null;
        }
        
        
        $data['menu'] = 'menu';
		$data['body'] = 'my_medication_edit';
		$this->load->vars($data);
		$this->load->view('template');
	}
}

/* End of file my_medication.php */
/* Location: ./application/controllers/my_medication.php */