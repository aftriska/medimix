<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_sideeffect extends CI_Controller {

	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');
		$this->load->model('sideeffect_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        //get the patients' disease(s)
        $data['pds'] = $this->disease_model->get_patient_diseases($user_id);
        
        //get reported side effects
        $data['ses'] = $this->sideeffect_model->get_sideeffects($user_id);
        
        $this->form_validation->set_rules('se_name', 'Side Effect', 'trim|required|xss_clean|alpha_name');
		$this->form_validation->set_rules('se_description', 'Side Effect Description', 'trim|required|xss_clean|swed_alpha');
		
		//insert the data
		if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
			$se_ucreate  	= $user;
			$se_name  	  	= $this->input->post('se_name');
			$se_description = $this->input->post('se_description');
			
			$this->db->trans_begin();
			
			$sql = "insert into sideeffects (se_dcreate, se_ucreate, u_id, se_name, se_description)
					values (now(), '$se_ucreate', '$user_id', '$se_name', '$se_description')";
			
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
		$data['body'] = 'my_sideeffect';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function delete()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');
		$this->load->model('sideeffect_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        $data['se_id'] = $this->input->post('se_id');
        $data['se'] = $this->sideeffect_model->get_selected_sideeffect($data['se_id']);
        
        $this->form_validation->set_rules('se_id', '', 'required');
        
        if($this->input->post('delete_btn') && $this->form_validation->run() !== FALSE)
        {
        	$se_umodify	= $user;
        	$se_id = $data['se_id'];
        	
			$this->db->trans_begin();
			
			$sql = "UPDATE sideeffects SET
					se_umodify='$se_umodify',
					se_dmodify=now(),
					deleted_by_user='Y'
					WHERE se_id='$se_id'";
			
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
         elseif($this->input->post('cancel_btn'))
		{ redirect('/my_sideeffect'); }
        
        $data['menu'] = 'menu';
		$data['body'] = 'my_sideeffect_delete';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function edit()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');
		$this->load->model('sideeffect_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        $data['se_id'] = $this->input->post('se_id');
        $data['se'] = $this->sideeffect_model->get_selected_sideeffect($data['se_id']);
        
        $this->form_validation->set_rules('se_id', '', 'required');
        $this->form_validation->set_rules('se_description', 'Side Effect Description', 'trim|required|xss_clean|swed_alpha');
        
        if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
        	$data['validation'] = 'v';
        	
        	$se_umodify	= $user;
        	$se_id = $data['se_id'];
        	$se_description = $this->input->post('se_description');
			
			$this->db->trans_begin();
			
			$sql = "UPDATE sideeffects SET
					se_umodify='$se_umodify',
					se_dmodify=now(),
					se_description='$se_description'
					WHERE se_id='$se_id'";
			
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
		$data['body'] = 'my_sideeffect_edit';
		$this->load->vars($data);
		$this->load->view('template');
	}
}

/* End of file my_sideeffect.php */
/* Location: ./application/controllers/my_sideeffect.php */