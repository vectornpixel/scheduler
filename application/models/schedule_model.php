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
        // Retrieve schedule data from user
        $id = $this->session->userdata('userID');
        $this->db->where('userID',$id);
        $query = $this->db->get('schedule');
        return $query->result();
        
        // check user data and display
        $data = array(
          $this->input->post('date') => 'date',
          $this->inpurt->post('time') => 'time'
        );
        $user_schedule = $this->db->get('schedule',$data);
        return $user_schedule;
        
        if ($id){
            while ($user_schedule){
                
            }
        }
        
        
    }
    
    function editSchedule(){
        
    }
} 
?>
