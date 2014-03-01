<?php

/*
 * Model to create a schedule
 * 
 */

class schedule_model extends CI_Model{
    
    function addSchedule(){
        // get database
        $id = $this->session->userdata('user_id');
        $this->db>where('user_id',$id);
        // query database and return result
        $query = $this->db->get('schedule');
        return $query->result();
        // add new date and time to user id
        
        
        $postSchedule = array(
            'date' => $this->input->post('theDate'),
            'time' => $this->input->post('theTime')
            
        );
        $postit = $this->db->insert('schedule',$postSchedule);
        return $postit;
       
        
        
    }
    
    function getSchedule(){
        
    }
    
    function editSchedule(){
        
    }
} 
?>
