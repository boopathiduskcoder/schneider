<?php

	class Location_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
  
    public function GetLocation(){
        $sql = "SELECT * FROM `location`";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;          
    } 
    public function location_edit($id){
        $sql    = "SELECT * FROM `location` WHERE `id`='$id'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    } 
    public function Update_location($id, $data){
        $this->db->where('id',$id);
        $this->db->update('location',$data);
      }
      public function location_delete($id){
        $this->db->delete('location',array('id'=> $id));
    }
    }
?>