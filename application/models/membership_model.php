<?php

class Membership_model extends CI_Model{
    function validate(){
        // selects database where the username is equal to what they type to see if its validated
        $this->db->where('username', $this->input->post('username'));
        // selects database where the password they type is equal to their md5 ( encrypted password)
        $this->db->where('password', md5($this->input->post('password')));
        // if those are true it goes to membership
        $query = $this->db->get('freeusers');
        
        // if this not equal 0 we know they are a member, create a session and log them in
        
        if($query->num_rows !== 0)
        {
            $validate=true;
            return $validate;
        }
    }
    // function to create member and insert there data in array to the database
    function create_member(){
        $new_member_insert_data = array(
            'firstname' => $this->input->post('firstname'),  
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        );
                
        // insert this into the database from new member insert data array
        $insert = $this->db->insert('freeusers', $new_member_insert_data);  
        return $insert;
    }
    
   
}