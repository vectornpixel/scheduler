<?php

class Gallery_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    function photo_upload(){
       //Loading the session data from the database
        $id = $this->session->userdata('username');
        $this->db->where('username',$id);
      
        // Creating the file if it doesnt exsit and creating a folder with the users name setting the upload path
        $folderName = $id;
        $uploadPath =  './users/' . $folderName;
        if(!file_exists($uploadPath)){
            $create = mkdir($uploadPath, 0777);
        if(!$create)
            return;
        }
        //Image configurating settings
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $uploadPath,
            'max_size' => 3000
        );

        // loads the library and sets where its going to go to
        $this->load->library('upload',$config);
        // this performs the upload operation
        $this->upload->photo_upload();
        //returns data about upload ( file location )
        $image_data = $this->upload->data();
        
        //Sets the width & height of thumbnail and copies it to thumbnail folder
         $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $uploadPath,
            'maintain_ration' => true,
            'width' => 250,
            'height' => 250
        );
        
        // Upload information about upload into the database table
        $data = array(
        'username' => $id,
        'category' => $this->input->post('category'),
        'filename' => $image_data['file_name'],
           );
        
        $this->db->insert('portfolio', $data ); 
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    
    function do_upload(){
        //Loading the session data from the database
        $id = $this->session->userdata('username');
        $this->db->where('username',$id);
      
        // Creating the file if it doesnt exsit and creating a folder with the users name setting the upload path
        $folderName = $id;
        $uploadPath =  './portfolio/' . $folderName;
        if(!file_exists($uploadPath)){
            $create = mkdir($uploadPath, 0777);
            $createThumbsFolder = mkdir($uploadPath . '/thumbs', 0777);
        if(!$create || ! $createThumbsFolder)
            return;
        }
        
        //Image configurating settings
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $uploadPath,
            'max_size' => 3000
        );

        // loads the library and sets where its going to go to
        $this->load->library('upload',$config);
        // this performs the upload operation
        $this->upload->do_upload();
        //returns data about upload ( file location )
        $image_data = $this->upload->data();
        
        //Sets the width & height of thumbnail and copies it to thumbnail folder
         $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $uploadPath. '/thumbs',
            'maintain_ration' => true,
            'width' => 250,
            'height' => 250
        );
        
        // Upload information about upload into the database table
        $data = array(
        'username' => $id,
        'category' => $this->input->post('category'),
        'filename' => $image_data['file_name'],
           );
        
        $this->db->insert('portfolio', $data ); 
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        
    }
    
    
    function get_images(){
        //Loading the session data from the database
        $id = $this->session->userdata('username');
        $this->db->where('username',$id);

        // Gets the users name from the upload path
        $folderName = $id;
        $uploadPath =  'portfolio/' . $folderName;
        
        //Scans the upload path for files
        $files = scandir($uploadPath);
        
        // substracts these out of array
        $files = array_diff($files, array('.', '..','thumbs'));
        $images = array();
        
        //loops through the files and displays the image thumbnail and url
        foreach ($files as $file){
            $images [] = array(
                'url' => base_url() .$uploadPath . '/'. $file,
                'thumb_url' => base_url() .$uploadPath . '/thumbs/' . $file,
            );
        }
        return $images;
    }
}
