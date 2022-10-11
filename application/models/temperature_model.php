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
    public function getfireextinguisher(){
      $query = $this->db->get('fire_extinguisher');
      $result = $query->result();
      return $result;
    }
    public function Add_Fireext($data){
      $this->db->insert('fire_extinguisher',$data);
    }
    public function fireexting_edit($id){
      $sql    = "SELECT * FROM `fire_extinguisher` WHERE `id`='$id'";
      $query  = $this->db->query($sql);
      $result = $query->row();
      return $result;
    }
    public function Update_Fireexting($id, $data){
      $this->db->where('id',$id);
      $this->db->update('fire_extinguisher',$data);
    }
    public function Getfireextingview($id){
      $this->db->select('f.*');
      $this->db->from('fire_extinguisher f');
      $this->db->where('f.id',$id);
      $query=$this->db->get();
      $result = $query->row();
      return $result;        
    }
    public function Add_Fireextingdetails($data){
      $this->db->insert('fireext_details',$data);
    } 
    public function Getrefillinglist($id){
      $sql    = "SELECT * FROM `fireext_details` WHERE `fireext_id`='$id'";
      $query  = $this->db->query($sql);
      $result = $query->result();
      return $result;
    }     
}
?>