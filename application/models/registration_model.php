<?php

class Registration_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function validate_username($u_username)
    {
    	$sql = "select * from users where upper(u_username)=upper('$u_username')";
        $query = $this->db->query($sql);
        $data = $query->num_rows();
        
        if($data === 0)
        {
        	$query->free_result();
        	return TRUE;
        }
        else
        {
        	$query->free_result();
        	return FALSE;
        }
    }
    
    function validate_email($u_email)
    {
    	$sql = "select * from users where upper(u_email)=upper('$u_email')";
        $query = $this->db->query($sql);
        $data = $query->num_rows();
        
        if($data === 0)
        {
        	$query->free_result();
        	return TRUE;
        }
        else
        {
        	$query->free_result();
        	return FALSE;
        }
    }
    
    function validate_id($u_id_number)
    {
    	$sql = "select * from users where upper(u_id_number)=upper('$u_id_number')";
        $query = $this->db->query($sql);
        $data = $query->num_rows();
        
        if($data === 0)
        {
        	$query->free_result();
        	return TRUE;
        }
        else
        {
        	$query->free_result();
        	return FALSE;
        }
    }
}

/* End of file registration_model.php */
/* Location: ./application/models/registration_model.php */