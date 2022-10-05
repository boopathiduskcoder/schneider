<?php

	class Preventive_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
  public function Getallservicelist(){
    $query = $this->db->get('service_interval');
    $result = $query->result();
    return $result;
  }
  public function Getallassetslist(){
    $query = $this->db->get('assets');
    $result = $query->result();
    return $result;
  }
  public function Getlocationlist(){
    $query = $this->db->get('location');
    $result = $query->result();
    return $result;
  }
  public function Getpreventivelist(){
    $query = $this->db->get('preventives');
    $result = $query->result();
    return $result;
  }
    public function Add_Preventive($data){
       $this->db->insert('preventives',$data);
      }    
        public function electricity_edit($elec){
          $sql    = "SELECT * FROM `electricity_consuming` WHERE `id`='$elec'";
          $query  = $this->db->query($sql);
          $result = $query->row();
          return $result;
      }
      public function Update_Electricity($id, $data){
        $this->db->where('id',$id);
        $this->db->update('electricity_consuming',$data);
      }
      public function electricity_delete($id){
        $this->db->delete('electricity_consuming',array('id'=> $id));
    }
    }
