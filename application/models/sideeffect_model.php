<?php

class Sideeffect_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_sideeffects($user_id)
    {
    	$sql = "select * from sideeffects where u_id = '$user_id'
    			and deleted_by_user != 'Y'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_selected_sideeffect($se_id)
    {
    	$sql = "select * from sideeffects where se_id = '$se_id'";
        $query = $this->db->query($sql);
        return $query;
    }
}

/* End of file sideeffect_model.php */
/* Location: ./application/models/sideeffect_model.php */