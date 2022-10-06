<?php

	class Technician_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function getalltechnicians(){
        $sql = "SELECT * FROM `technicians`";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;          
    } 
    public function Add_technician($data){
        $this->db->insert('technicians',$data);
    }
    public function GetTechnicianById($id){
        $this->db->select('t.*');
        $this->db->from('technicians t');
        $this->db->where('t.id',$id);
        $query=$this->db->get();
        $result = $query->row();
        return $result;         
    }
    public function Update_technician($id,$data){
        $this->db->where('id',$id);
        $this->db->update('technicians',$data);
    }
    public function changepassword($id){
        $this->db->select('id');
        $this->db->from('technicians t');
        $this->db->where('t.id',$id);
        $query=$this->db->get();
        $result = $query->row();
        return $result;        
    }
    public function Update_technicianpassword($id,$data){
        $this->db->where('id',$id);
        $this->db->update('technicians',$data);
    }
    public function deletetechnician($id){
        $this->db->delete('technicians',array('id'=> $id));
    }
    }
?>