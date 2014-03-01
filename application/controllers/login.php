<?php

class Login extends CI_Controller{
     function index(){
        // creates dynamic page from template.php - set main content to the page you want to load
        $data['main_content'] = '/pages/index';
        $this->load->view('/templates/template', $data);
    }
    function userlogin(){
        // creates dynamic page from template.php - set main content to the page you want to load
        $data['main_content'] = '/pages/login_form';
        $this->load->view('/templates/template', $data);
    }
    
    function validate_credentials(){
        $this->load->model('membership_model');
        // calls the membership model with the validate method
        $query = $this->membership_model->validate();
        
        // if the users credentials validated
        if($query){
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'id' => $this->input->post('id') ,
                'is_logged_in' => true,
              
            );
            
            // loads a session, takes the user information from $data and adds it to session
            $this->session->set_userdata($data);
           
            redirect('site/members/');
        }
        else{
            // loads the login form again if logged in incorrectly
            $this->index();
        }
    }
   
    function signup(){
        $data['main_content'] = 'pages/signup_form';
        $this->load->view('/templates/template',$data);
    }
    function create_member(){
        // this loads the form validation library 
        $this->load->library('form_validation');
        // field name, error message, validation rules
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|calback__unique_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min+length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE)
            {
            $this->signup();
        }
        else{
            $this->load->model('membership_model');
            if($query = $this->membership_model->create_member()){
                $data['main_content'] = 'pages/signup_successful';
                $this->load->view('templates/template', $data);
            }
            else{
                $this->load->view('signup_form');
            }
        }
        
    }
    

        function logout(){
        $this->session->sess_destroy();
        $this->index();  
    }
    
    /*function _unique_email($str){
        $id = $this->uri-segment(4);
        
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $user = $this->db->get('freeusers');
        if(count($user)){
            $this->validate_credentials->set_message('_unique_email', '%s should be unique');
        return FALSE;
            
        }
        return TRUE;
    }*/
    
    
    
}