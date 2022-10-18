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
    $this->db->select('e.*');
    $this->db->from('employee e');
    $this->db->where('e.em_role','TECHNICIAN');
    $query=$this->db->get();
    $result = $query->result();
        return $result;         
  }
  public function GetAllBreakdown($type){
    $this->db->select('b.*, e.name as equipmentname,d.dep_name,t.name as breakdown_name,te.first_name,te.last_name');
    $this->db->from('breakdown b');
    $this->db->join('equipments e', 'e.id = b.equipment_id');
    $this->db->join('department d','d.id = b.department_id');
    $this->db->join('breakdowntypes t','t.id=b.breakdown_id');
    $this->db->join('employee te','te.id=b.technician_id');
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
  $this->db->select('b.*, e.name as equipmentname,d.dep_name,t.name as breakdown_name,te.first_name,te.last_name');
  $this->db->from('breakdown b');
  $this->db->join('equipments e', 'e.id = b.equipment_id');
  $this->db->join('department d','d.id = b.department_id');
  $this->db->join('breakdowntypes t','t.id=b.breakdown_id');
   $this->db->join('employee te','te.id=b.technician_id');
  $this->db->where('b.id',$id);
  $query=$this->db->get();
  $result = $query->row();
  return $result;        
}
public function Update_breakdownstatus($id, $data){
  $this->db->where('id',$id);
  $this->db->update('breakdown',$data);
}
public function GetAllcomplaints($id){
  $this->db->select('b.*, e.name as equipmentname,d.dep_name,t.name as breakdown_name,te.first_name,te.last_name');
  $this->db->from('breakdown b');
  $this->db->join('equipments e', 'e.id = b.equipment_id');
  $this->db->join('department d','d.id = b.department_id');
  $this->db->join('breakdowntypes t','t.id=b.breakdown_id');
  $this->db->join('employee te','te.id=b.technician_id');
  $this->db->where('te.em_id',$id);
  $query=$this->db->get();
  $result = $query->result();
  return $result; 
}
public function Getpreventiveview($id){
  $this->db->select('p.*,e.name as equipmentname,l.location_name as location,s.name as servicename');
  $this->db->from('preventives p');
  $this->db->join('equipments e', 'e.id = p.equipment_id');
  $this->db->join('location l', 'l.id = p.location_id');
  $this->db->join('service_interval s', 's.id = p.interval_id');
  $this->db->where('p.id',$id);
  $query=$this->db->get();
  $result = $query->row();
  return $result;        
}
public function download_preventive($month){
  $this->db->select('p.*,e.name as equipmentname,l.location_name as location,s.name as servicename');
  $this->db->from('preventives p');
  $this->db->join('equipments e', 'e.id = p.equipment_id');
  $this->db->join('location l', 'l.id = p.location_id');
  $this->db->join('service_interval s', 's.id = p.interval_id');
  $this->db->like('p.last_date',$month);
  
 // $this->db->where('date_and_time LIKE "'. DATE('Y-m-d', strtotime($from_date)). '" and "'. DATE('Y-m-d', strtotime($to_date)).'"');
  $query=$this->db->get();
  //$str=$this->db->last_query();
  $result = $query->result();
  return $result; 
}
public function download_complaint($month,$type){
  $this->db->select('b.*, e.name as equipmentname,d.dep_name,t.name as breakdown_name,te.first_name,te.last_name');
  $this->db->from('breakdown b');
  $this->db->join('equipments e', 'e.id = b.equipment_id');
  $this->db->join('department d','d.id = b.department_id');
  $this->db->join('breakdowntypes t','t.id=b.breakdown_id');
  $this->db->join('employee te','te.id=b.technician_id');
  $this->db->like('b.date_and_time', $month);
  $this->db->where('b.type', $type);
  
 // $this->db->where('date_and_time LIKE "'. DATE('Y-m-d', strtotime($from_date)). '" and "'. DATE('Y-m-d', strtotime($to_date)).'"');
  $query=$this->db->get();
  //$str=$this->db->last_query();
  $result = $query->result();
  return $result; 
}
public function Getinprogresslist(){
  $this->db->select('b.*, e.name as equipmentname, l.location_name');
 $this->db->from('breakdown b');
 $this->db->join('equipments e', 'e.id = b.equipment_id');
 $this->db->join('location l', 'l.id = e.location_id');
  $this->db->where('b.status', 'Inprogress');
  $this->db->or_where('b.status', 'Pending');
  $query=$this->db->get();
  //$str=$this->db->last_query();
  $result = $query->result();
  return $result; 
}
public function Gettechinprogresslist($id){
  $this->db->select('b.*, e.name as equipmentname, l.location_name');
 $this->db->from('breakdown b');
 $this->db->join('equipments e', 'e.id = b.equipment_id');
 $this->db->join('location l', 'l.id = e.location_id');
 $this->db->join('employee te', 'te.id = b.technician_id');
 $where =" te.em_id ='$id' and b.status != 'Completed' ";
 $this->db->where($where);
  $query=$this->db->get();
  //print_r($this->db->last_query());
  $result = $query->result();
  return $result; 
}
public function Getcalendarlist(){
  $this->db->select('b.*, e.name as equipmentname, l.location_name');
 $this->db->from('breakdown b');
 $this->db->join('equipments e', 'e.id = b.equipment_id');
 $this->db->join('location l', 'l.id = e.location_id');
  $query=$this->db->get();
  //$str=$this->db->last_query();
  $result = $query->result();
  return $result; 
}
public function GetAllproducts(){
  $query = $this->db->get('stock');
  $result = $query->result();
  return $result;
}
public function GetAllstock($product){
  $this->db->select('s.*');
      $this->db->from('stock s');
      $this->db->where('s.id',$product);
      $query=$this->db->get();
      $result = $query->row();
      return $result; 
}     
    }
