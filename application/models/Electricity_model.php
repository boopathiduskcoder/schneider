<?php

	class Electricity_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
  public function getelectricity(){
    $query = $this->db->get('electricity_consuming');
    $result = $query->result();
    return $result;
  }
    public function Add_Electricity($data){
       $this->db->insert('electricity_consuming',$data);
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
