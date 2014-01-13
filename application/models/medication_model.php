<?php

class Medication_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function get_medicines()
    {
    	$sql = "select * from medicines order by m_name";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_patient_medication($user_id)
    {
    	$sql = "select dm.dm_id dm_id, dm.u_id u_id, dm.d_id d_id, dm.m_id m_id, d.d_name d_name, m.m_name m_name,
    			dm.dm_prescribed dm_prescribed, dm.dm_dose dm_dose, dm.dm_start_using dm_start_using, 
    			dm.dm_finish_using dm_finish_using
    			from disease_medicines dm, medicines m, diseases d
    			where dm.d_id = d.d_id
    			and dm.m_id = m.m_id
    			and dm.u_id = '$user_id'
    			and deleted_by_user != 'Y'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function get_selected_medication($dm_id)
    {
    	$sql = "select dm.dm_id dm_id, dm.dm_dcreate dm_dcreate, dm.u_id u_id, dm.d_id d_id, 
    			dm.m_id m_id, d.d_name d_name, m.m_name m_name,
    			dm.dm_prescribed dm_prescribed, dm.dm_dose dm_dose, dm.dm_start_using dm_start_using, 
    			dm.dm_finish_using dm_finish_using
    			from disease_medicines dm, medicines m, diseases d
    			where dm.d_id = d.d_id
    			and dm.m_id = m.m_id
    			and dm.dm_id = '$dm_id'";
        $query = $this->db->query($sql);
        return $query;
    }
}

/* End of file medication_model.php */
/* Location: ./application/models/medication_model.php */