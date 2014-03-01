
<?php



class User_model extends CI_Model{
    
 
    function get_profile(){
        //$id = $this->uri->segment(3);
       $id = $this->session->userdata('username');
       $this->db->where('username',$id);
       $query = $this->db->get('freeusers');
       return $query->result();

          
    }
   
    function insert_gallery($data){
        $this->db->insert('freeusers',$data);
        return;
    }
    
    function add_port($data){
        $this->db->insert('portfolio', $data );
        return;
    }
    
    function update_profile($data){
        $id = $this->session->userdata('username');
        //$updateinfo = "UPDATE freeusers SET $data WHERE id='$id'";
        //$id = $this->input->post('id');
        $this->db->where('username',$id);
        $this->db->update('freeusers',$data);
    }

 
    function delete_row(){
        $this->db->where('user_id',$this->uri->segment(3));
        $this->db->delete('freeusers');
    }
    

}




     //$session_id = $this->session->userdata('session_id')
        //$this->db->where('id', $this->input->get('id'));
        //$session_id = $this->session->userdata('session_id');
        //
        //$this->db->where('id', 1);
       // $query = $this->db->get('freeusers');
       // return $query->result();