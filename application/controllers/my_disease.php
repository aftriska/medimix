<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_disease extends CI_Controller {

	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        //get diseases
        $data['ds'] = $this->disease_model->get_diseases();
        
        //get the patients' disease(s)
        $data['pds'] = $this->disease_model->get_patient_diseases($user_id);
        
        //validate the form
        $this->form_validation->set_rules('d_id', 'Disease', 'required');
		$this->form_validation->set_rules('pu_diagnose_date', 'Diagnose Date', 'required');
		
		//insert the data
		if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
			$pu_ucreate   = $user;
			$d_id   	  = $this->input->post('d_id');
			$u_id 		  = $user_id;
			$pu_diagnose_date  = $this->input->post('pu_diagnose_date');
			$pu_recover_date   = $this->input->post('pu_recover_date');
			
			$this->db->trans_begin();
			
			$sql = "insert into patient_diseases (pu_dcreate, pu_ucreate, d_id, u_id,
						pu_diagnose_date, pu_recover_date)
					values (now(), '$pu_ucreate', '$d_id', '$u_id',
						'$pu_diagnose_date', '$pu_recover_date')";
			
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
		$data['body'] = 'my_disease';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function delete()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        $data['pu_id'] = $this->input->post('pu_id');
        $data['disease'] = $this->disease_model->get_selected_disease($data['pu_id']);
        
        $this->form_validation->set_rules('pu_id', '', 'required');
		
		if($this->input->post('delete_btn') && $this->form_validation->run() !== FALSE)
        {
        	$pu_umodify	= $user;
        	$pu_id = $data['pu_id'];
			
			$this->db->trans_begin();
			
			$sql = "UPDATE patient_diseases SET
					pu_umodify='$pu_umodify',
					pu_dmodify=now(),
					deleted_by_user='Y'
					WHERE pu_id='$pu_id'";
			
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
		$data['body'] = 'my_disease_delete';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
	function edit()
	{
		//$this->output->enable_profiler(TRUE);
		$this->auth->restrict();
		$this->load->model('user_model');
		$this->load->model('disease_model');

        $user = $this->session->userdata('logged_user');
        $data['utype'] = $this->user_model->get_user_type($user);
        $user_data = $this->user_model->get_user_data($user);
        $user_id   = $user_data->row()->u_id;
        
        $data['pu_id'] = $this->input->post('pu_id');
        $data['disease'] = $this->disease_model->get_selected_disease($data['pu_id']);
        
        $this->form_validation->set_rules('pu_id', '', 'required');
		$this->form_validation->set_rules('pu_diagnose_date', 'Diagnose Date', 'required');
        
        if($this->input->post('save_btn') && $this->form_validation->run() !== FALSE)
        {
        	$data['validation'] = 'form_valid';
        	
        	$pu_umodify	= $user;
        	$pu_id = $data['pu_id'];
        	$pu_diagnose_date  = $this->input->post('pu_diagnose_date');
			$pu_recover_date   = $this->input->post('pu_recover_date');
			
			$this->db->trans_begin();
			
			$sql = "UPDATE patient_diseases SET
					pu_umodify='$pu_umodify',
					pu_dmodify=now(),
					pu_diagnose_date='$pu_diagnose_date',
					pu_recover_date='$pu_recover_date'
					WHERE pu_id='$pu_id'";
			
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
		$data['body'] = 'my_disease_edit';
		$this->load->vars($data);
		$this->load->view('template');
	}
}

/* End of file my_disease.php */
/* Location: ./application/controllers/my_disease.php */