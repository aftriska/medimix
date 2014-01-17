<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_ut extends CI_Controller {

	public function index()
	{
		//$this->output->enable_profiler(TRUE);
		
		$this->load->library('unit_test');
		
		/*
		$this->db->where('u_username', 'abcd');
		$this->db->where('u_username', 'abcd');
		$query = $this->db->get('ms_users');
		
		echo '1';
		echo '<br/>';
		echo 'result row(s): '.$query->num_rows();
		*/
		
		/*
		$username = 'aftri';
		$password = 'password';
		
		$this->db->where('u_username', $username);
		$this->db->where('u_password', $password);
		$query = $this->db->get('users');
		*/
		
		$test = 'aftri@^'; //this is wrong
		//$expected_result = is_string;
		//$test_name = "Check if it's string";
		echo $this->unit->run($test, 'is_numeric');
		
		//$this->unit->run($test, $expected_result, $test_name);
		
		/*
		$test = 1 + 1;
		$expected_result = 2;
		$test_name = 'Adds one plus one';
		echo $this->unit->run($test, $expected_result, $test_name);
		*/
		//echo $this->unit->run($test, $expected_result);
		//echo 'test';
	}
}

/* End of file registration.php */
/* Location: ./application/controllers/registration.php */