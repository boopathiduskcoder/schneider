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

    }
?>