<?php

	class Vendor_model extends CI_Model{
	function __consturct(){
	parent::__construct();

	}
	public function GetVendorByID($id){
        $this->db->select('v.*');
        $this->db->from('vendor_list v');
        $this->db->where('v.id',$id);
        $query=$this->db->get();
        $result = $query->row();
        
        return $result;         
    }
    public function Add_vendor($data){
        $this->db->insert('vendor_list',$data);
    }
    public function Does_email_exists($email) {
        $sql = "SELECT `email_id` FROM vendor_list
        WHERE `email_id`='$email'";
        $result=$this->db->query($sql);
       

        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function Update_vendor($id,$data){
        $this->db->where('id',$id);
        $this->db->update('vendor_list',$data);
    }
    public function vendor_list(){
    $sql = "SELECT * FROM `vendor_list` WHERE `status`='ACTIVE'";
    $query=$this->db->query($sql);
    $result = $query->result();
 
    return $result;
    }
    public function getstock(){
        $sql = "SELECT * FROM `stock`";
        $query=$this->db->query($sql);
        $result = $query->result();
     
        return $result;
        }
}
?>