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
  public function Getallequipmentslist(){
    $query = $this->db->get('equipments');
    $result = $query->result();
    return $result;
  }
  public function Getalldepartments(){
    $query = $this->db->get('department');
    $result = $query->result();
    return $result;
  }
  public function GetAllBreakdowntypes(){
    $query = $this->db->get('breakdowntypes');
    $result = $query->result();
    return $result;
  }
  public function GetAlltechnicians(){
    $query = $this->db->get('technicians');
    $result = $query->result();
    return $result;
  }
  public function GetAllBreakdown($type){
    $this->db->select('b.*, e.name as equipmentname,d.dep_name,t.name as breakdown_name,te.firstname,te.lastname');
    $this->db->from('breakdown b');
    $this->db->join('equipments e', 'e.id = b.equipment_id');
    $this->db->join('department d','d.id = b.department_id');
    $this->db->join('breakdowntypes t','t.id=b.breakdown_id');
    $this->db->join('technicians te','te.id=b.technician_id');
    $this->db->where('b.type',$type);
    $query=$this->db->get();
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
      public function GetPreventiveById($id){
        $this->db->select('p.*');
        $this->db->from('preventives p');
        $this->db->where('p.id',$id);
        $query=$this->db->get();
        $result = $query->row();
        return $result;         
    }
      public function Update_Electricity($id, $data){
        $this->db->where('id',$id);
        $this->db->update('electricity_consuming',$data);
      }
      public function preventive_delete($id){
        $this->db->delete('preventives',array('id'=> $id));
    }
    public function Add_breakdown($data){
      $this->db->insert('breakdown',$data);
     }
     public function GetbreakdownById($id){
      $this->db->select('b.*');
      $this->db->from('breakdown b');
      $this->db->where('b.id',$id);
      $query=$this->db->get();
      $result = $query->row();
      return $result;         
  }
  public function Update_breakdown($id, $data){
    $this->db->where('id',$id);
    $this->db->update('breakdown',$data);
  }
  public function breakdown_delete($id){
    $this->db->delete('breakdown',array('id'=> $id));
}
public function complaint_delete($id){
  $this->db->delete('breakdown',array('id'=> $id));
}
public function Getbreakdownview($id){
  $this->db->select('b.*, e.name as equipmentname,d.dep_name,t.name as breakdown_name,te.firstname,te.lastname');
  $this->db->from('breakdown b');
  $this->db->join('equipments e', 'e.id = b.equipment_id');
  $this->db->join('department d','d.id = b.department_id');
  $this->db->join('breakdowntypes t','t.id=b.breakdown_id');
   $this->db->join('technicians te','te.id=b.technician_id');
  $this->db->where('b.id',$id);
  $query=$this->db->get();
  $result = $query->row();
  return $result;        
}
public function Update_breakdownstatus($id, $data){
  $this->db->where('id',$id);
  $this->db->update('breakdown',$data);
}
    }
