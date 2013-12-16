<?php

class User_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function validate_password($u_username,$u_password)
    {
    	$sql = "select * from users where upper(u_username)=upper('$u_username')
    			and u_password = '$u_password'";
        $query = $this->db->query($sql);
        $data = $query->num_rows();
        
        if($data === 0)
        {
        	$query->free_result();
        	return FALSE;
        }
        else
        {
        	$query->free_result();
        	return TRUE;
        }
    }
    
    function get_user_data($u_username)
    {
    	$sql = "SELECT * FROM USERS WHERE u_username='$u_username'";
        $query = $this->db->query($sql);
        //$data = $query;
        //$query->free_result();
        //return $data;
        return $query;
    }
    
    function validate_email($u_email,$u_username)
    {
    	$sql = "select * from users where upper(u_email)=upper('$u_email')
    			and u_username != '$u_username'";
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
    
    function validate_id($u_id_number,$u_username)
    {
    	$sql = "select * from users where upper(u_id_number)=upper('$u_id_number')
    			and u_username != '$u_username'";
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
    
    function get_suggestions_diseases()
    {
    	$sql = "SELECT distinct disease FROM suggestions";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_diseases_sideeffects($disease)
    {
    	$sql = "SELECT distinct side_effect FROM suggestions WHERE disease = '$disease'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_suggestion($disease,$side_effect)
    {
    	$sql = "SELECT suggestion FROM suggestions WHERE disease = '$disease' and side_effect = '$side_effect'";
        $query = $this->db->query($sql);
        return $query;
    }
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */