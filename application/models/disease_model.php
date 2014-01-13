<?php

class Disease_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_diseases()
    {
    	$sql = "select * from diseases order by d_name";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_patient_diseases($u_id)
    {
    	$sql = "select pu.pu_id pu_id, pu.d_id d_id, pu.u_id u_id, pu.pu_diagnose_date pu_diagnose_date, 
    			pu.pu_recover_date pu_recover_date, d.d_name d_name
    			from patient_diseases pu, diseases d 
    			where pu.d_id = d.d_id
    			and pu.u_id = '$u_id'
    			and deleted_by_user != 'Y'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_selected_disease($pu_id)
    {
    	$sql = "select pu.pu_id pu_id, pu.pu_dcreate pu_dcreate,
    			pu.d_id d_id, pu.u_id u_id, pu.pu_diagnose_date pu_diagnose_date, 
    			pu.pu_recover_date pu_recover_date, d.d_name d_name
    			from patient_diseases pu, diseases d 
    			where pu.d_id = d.d_id
    			and pu.pu_id = '$pu_id'";
        $query = $this->db->query($sql);
        return $query;
    }
}

/* End of file disease_model.php */
/* Location: ./application/models/disease_model.php */