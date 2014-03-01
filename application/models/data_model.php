
<?php



class Data_model extends CI_Model{
    
 
    function get_designers(){
        $id = $this->uri->segment(3);
        $this->db->where('username',$id);
       $query = $this->db->get('freeusers');
       return $query->result();

          
    }

}


