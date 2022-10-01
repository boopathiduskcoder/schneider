<?php

class Temperature_model extends CI_Model{


    	function __consturct(){
    	   parent::__construct();
    	
    	}
      
        public function GetLocation(){
            $sql = "SELECT * FROM `location`";
            $query=$this->db->query($sql);
            $result = $query->result();
            return $result;          
        } 

        public function gettemperature(){
            $query = $this->db->get('temperature');
            $result = $query->result();
            return $result;
        }
      public function Add_Temperature($data){
        $this->db->insert('temperature',$data);
      }
      public function temperature_edit($temp){
        $sql    = "SELECT * FROM `temperature` WHERE `id`='$temp'";
        $query  = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function Update_Temperature($id, $data){
      $this->db->where('id',$id);
      $this->db->update('temperature',$data);
    }
    public function temperature_delete($id){
      $this->db->delete('temperature',array('id'=> $id));
  }
        
}
?>