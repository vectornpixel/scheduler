
<?php



class User_model extends CI_Model{
    
    function get_schedule(){
        $id = $this->session->userdata('userID');
        $this->db->where('userID',$id);
        $query = $this->db->get('schedule');
        return $query->result();
    }
    
    function insert_schedule($data){
        $this->db->insert('schedule',$data);
       return;
    }
    
    function update_schedule($data){
        $id = $this->session->userdata('userID');
        $this->db->where('userID',$id);
        $this->db->update('schedule',$id);
    }
    
    function remove_schedule(){
        $this->db->where('userID',$id);
        $this->db->delete('schedule',$id);
    }


}
