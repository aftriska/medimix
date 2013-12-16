<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

	var $CI = null;

	function Auth()
	{
		$this->CI =& get_instance();

		$this->CI->load->library('session');
		$this->CI->load->database();
		$this->CI->load->helper('url');
	}

	function process_login($login = NULL)
	{
		// A few safety checks
		// Our array has to be set
		if(!isset($login))
			return FALSE;

		//Our array has to have 2 values
		//No more, no less!
		if(count($login) != 2)
			return FALSE;

		$username = $login[0];
		$password = $login[1];

		// Query time

        $this->CI->db->where('u_username', $username);
		$this->CI->db->where('u_password', $password);
		
		$query = $this->CI->db->get('users');
		
		$user_data = $query;
		
		/*
		echo '1';
		echo '<br/>';
		echo 'result row(s): '.$user_data->num_rows(); 
		*/
		
		if ($user_data->num_rows() !== 0)
		{
			// Our user exists, set session.
			$this->CI->session->set_userdata('logged_user', $username);
			$query->free_result();
			return TRUE;
		}
		else
		{
			// No existing user.
			$query->free_result();
			return FALSE;
		}
		
		//return FALSE;
	}

	function redirect()
	{
		if ($this->CI->session->userdata('redirected_from') === FALSE)
		{
			redirect('/user');
		} else {
			redirect($this->CI->session->userdata('redirected_from'));
		}

	}

	/**
	 *
	 * This function restricts users from certain pages.
	 * use restrict(TRUE) if a user can't access a page when logged in
	 *
	 * @access	public
	 * @param	boolean	wether the page is viewable when logged in
	 * @return	void
	 */
	function restrict($logged_out = FALSE)
	{
		// If the user is logged in and he's trying to access a page
		// he's not allowed to see when logged in,
		// redirect him to the index!
		if ($logged_out && $this->logged_in())
		{
			redirect('/user');
		}

		// If the user isn' logged in and he's trying to access a page
		// he's not allowed to see when logged out,
		// redirect him to the login page!
		if ( ! $logged_out && ! $this->logged_in())
		{
			$this->CI->session->set_userdata('redirected_from', $this->CI->uri->uri_string()); // We'll use this in our redirect method.
			redirect('/welcome');
		}
	}

	/**
	 *
	 * Checks if a user is logged in
	 *
	 * @access	public
	 * @return	boolean
	 */
	function logged_in()
	{
		if ($this->CI->session->userdata('logged_user') === FALSE)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function logout()
	{
		$this->CI->session->sess_destroy();
		return TRUE;
	}
}

// End of library class
// Location: application/libraries/auth.php