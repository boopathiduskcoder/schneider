<?php

	class Technician_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
    public function getalltechnicians(){
        $sql = "SELECT * FROM `employee` WHERE em_role ='TECHNICIAN' ";
        $query=$this->db->query($sql);
        $result = $query->result();
        return $result;          
    } 
    public function Add_technician($data){
        $this->db->insert('employee',$data);
    }
    public function Does_email_exists($email) {
		$user = $this->db->dbprefix('employee');
        $sql = "SELECT `em_email` FROM $user
		WHERE `em_email`='$email'";
		$result=$this->db->query($sql);
        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function GetTechnicianById($id){
        $this->db->select('e.*');
        $this->db->from('employee e');
        $this->db->where('e.id',$id);
        $query=$this->db->get();
        $result = $query->row();
        return $result;         
    }
    public function Update_technician($id,$data){
        $this->db->where('id',$id);
        $this->db->update('employee',$data);
    }
    public function changepassword($id){
        $this->db->select('id');
        $this->db->from('employee e');
        $this->db->where('e.id',$id);
        $query=$this->db->get();
        $result = $query->row();
        return $result;        
    }
    public function Update_technicianpassword($id,$data){
        $this->db->where('id',$id);
        $this->db->update('employee',$data);
    }
    public function deletetechnician($id){
        $this->db->delete('employee',array('id'=> $id));
    }
    }
?>