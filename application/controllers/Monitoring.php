 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {


    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('organization_model');
        $this->load->model('settings_model');
        $this->load->model('leave_model');
        $this->load->model('electricity_model');
        $this->load->model('temperature_model');
    }
    
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
    public function Department(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['department'] = $this->organization_model->depselect();
        $this->load->view('backend/department',$data); 
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function electricity(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['location'] = $this->electricity_model->GetLocation();
        $data['electricity'] = $this->electricity_model->getelectricity();
        $this->load->view('backend/electricity',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }        
    }
    public function temperature(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['locations'] = $this->temperature_model->GetLocation();
        $data['temperature'] = $this->temperature_model->gettemperature();
       // $data['department'] = $this->organization_model->depselect();
        $this->load->view('backend/temperature',$data); 
        }
    else{
        redirect(base_url() , 'refresh');
    }            
    }
    public function oil_consumption(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['department'] = $this->organization_model->depselect();
        $this->load->view('backend/oil_consumption',$data); 
        }
    else{
        redirect(base_url() , 'refresh');
    }            
    }
    public function fire_ext(){
        if($this->session->userdata('user_login_access') != False) {
        $ext_id = $this->db->count_all('fire_extinguisher');
        $string = 'FIREXT'; 
        $ext_id = str_pad($ext_id,4,0,STR_PAD_LEFT);
        $data['ext_id']= $string.''.$ext_id;
        $data['locations'] = $this->temperature_model->GetLocation(); 
        $data['fireextingu'] = $this->temperature_model->getfireextinguisher();
        $this->load->view('backend/fire_ext',$data); 
        }
    else{
        redirect(base_url() , 'refresh');
    }            
    }
    public function pf(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['department'] = $this->organization_model->depselect();
        $this->load->view('backend/pf',$data); 
        }
    else{
        redirect(base_url() , 'refresh');
    }            
    }
    public function Save_dep(){
    if($this->session->userdata('user_login_access') != False) { 
       $dep = $this->input->post('department');
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
       $this->form_validation->set_rules('department','department','trim|required|xss_clean');

       if ($this->form_validation->run() == FALSE) {
           echo validation_errors();
       }else{
        $data = array();
        $data = array('dep_name' => $dep);
        $success = $this->organization_model->Add_Department($data);
        $this->session->set_flashdata('feedback','Successfully Added');
           echo "Successfully Added";
       }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Delete_dep($dep_id){
        if($this->session->userdata('user_login_access') != False) { 
        $this->organization_model->department_delete($dep_id);
        $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
        redirect('organization/Department');
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Dep_edit($dep){
        if($this->session->userdata('user_login_access') != False) { 
        $data['department'] = $this->organization_model->depselect();
        $data['editdepartment']=$this->organization_model->department_edit($dep);
        $this->load->view('backend/department', $data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Update_dep(){
        if($this->session->userdata('user_login_access') != False) { 
        $id = $this->input->post('id');
        $department = $this->input->post('department');
        $data =  array('dep_name' => $department );
        $this->organization_model->Update_Department($id, $data);
        #$this->session->set_flashdata('feedback','Updated Successfully');
        echo "Successfully Added";
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Designation(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['designation'] = $this->organization_model->desselect();
        $this->load->view('backend/designation',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Save_des(){
        if($this->session->userdata('user_login_access') != False) { 
        $des = $this->input->post('designation');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('designation','designation','trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }else{
            $data = array();
            $data = array('des_name' => $des);
            $success = $this->organization_model->Add_Designation($data);
            echo "Successfully Added";
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function des_delete($des_id){
        if($this->session->userdata('user_login_access') != False) {
        $this->organization_model->designation_delete($des_id);
        $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
        redirect('organization/Designation');
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Edit_des($des){
        if($this->session->userdata('user_login_access') != False) {
        $data['designation'] = $this->organization_model->desselect();
        $data['editdesignation']=$this->organization_model->designation_edit($des);
        $this->load->view('backend/designation', $data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Update_des(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('id');
        $designation = $this->input->post('designation');
        $data =  array('des_name' => $designation );
        $this->organization_model->Update_Designation($id, $data);
        echo "Successfully Updated";
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_electricity(){
        try {
            if($this->session->userdata('user_login_access') == False) 
            {
                throw new Exception("Session expired", 1);                
            }     
        $id= $this->input->post('aid') ;                       
        $date = $this->input->post('date'); 
        $location = $this->input->post('location');       
        $am_6  = $this->input->post('am_6');     
        $pm_2  = $this->input->post('pm_2');     
        $pm_10 = $this->input->post('pm_10');     
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('date', 'Date','trim|required');
        $this->form_validation->set_rules('location', 'location','trim|required');
        $this->form_validation->set_rules('am_6', '6 AM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_2', '2 PM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_10', '10 PM','trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
            $data = array();
            $data = array('date' => $date, 'location' => $location,'am_6' => $am_6,'pm_2' => $pm_2,'pm_10' => $pm_10);
            if(empty($id)){
                $success = $this->electricity_model->Add_Electricity($data);  
                $message="Successfully added";         
            } 
            $response['status']=TRUE;
            $response['message']=$message;  
    

   }   catch (Exception $e) {
        $response['status']=FALSE;
        $response['message']=$e->getMessage();
    } 
    echo json_encode($response);   
}
public function edit_electricity($elec){
    if($this->session->userdata('user_login_access') != False) { 
    $data['electricity'] = $this->electricity_model->getelectricity();
    $data['locations'] = $this->electricity_model->GetLocation();
    $data['editelectricity']=$this->electricity_model->electricity_edit($elec);
    $this->load->view('backend/electricity', $data);
    }
else{
    redirect(base_url() , 'refresh');
}        
}
public function Update_electricity(){

    try {
        if($this->session->userdata('user_login_access') == False) 
        {
            throw new Exception("Session expired", 1);                
        } 
        $id = $this->input->post('id');
        $date = $this->input->post('date'); 
        $location = $this->input->post('location');         
        $am_6  = $this->input->post('am_6');     
        $pm_2  = $this->input->post('pm_2');     
        $pm_10 = $this->input->post('pm_10');     
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('date', 'Date','trim|required');
        $this->form_validation->set_rules('location', 'location','trim|required');
        $this->form_validation->set_rules('am_6', '6 AM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_2', '2 PM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_10', '10 PM','trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
            $data = array();
            $data = array('date' => $date,'location' => $location,'am_6' => $am_6,'pm_2' => $pm_2,'pm_10' => $pm_10);
            if(!empty($id)){
                $success =  $this->electricity_model->Update_Electricity($id, $data);  
                $message="Successfully Updated";         
            } 
            $response['status']=TRUE;
            $response['message']=$message;  
    

   }   catch (Exception $e) {
        $response['status']=FALSE;
        $response['message']=$e->getMessage();
    } 
    echo json_encode($response);   
}
public function electricity_delete($id){
    if($this->session->userdata('user_login_access') != False) {
    $this->electricity_model->electricity_delete($id);
   // $this->session->set_flashdata('delsuccess', 'Successfully Deleted');
    redirect('monitoring/electricity');
    }
else{
    redirect(base_url() , 'refresh');
}        
}


public function Save_temp(){
    try {
        if($this->session->userdata('user_login_access') == False) 
        {
            throw new Exception("Session expired", 1);                
        }   
       $date = $this->input->post('date');
       $location = $this->input->post('location');
       $reading = $this->input->post('reading');
       $this->load->library('form_validation');
       $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
       $this->form_validation->set_rules('date','date','trim|required|xss_clean');
       $this->form_validation->set_rules('location','location','trim|required|xss_clean');
       $this->form_validation->set_rules('reading','reading','trim|required|xss_clean');

       if ($this->form_validation->run() == FALSE) {
           echo validation_errors();
       }
        $data = array();
        $data = array('date' => $date,'location' => $location,'reading' => $reading);
        if(empty($id)){
            $success = $this->temperature_model->Add_Temperature($data);  
            $message="Successfully added";         
        } 
        $response['status']=TRUE;
        $response['message']=$message;  


}   catch (Exception $e) {
    $response['status']=FALSE;
    $response['message']=$e->getMessage();
} 
echo json_encode($response);  
    }
    public function edit_temp($temp){
        if($this->session->userdata('user_login_access') != False) { 
        $data['locations'] = $this->temperature_model->GetLocation();
        $data['temperature'] = $this->temperature_model->gettemperature();
        $data['edittemperature']=$this->temperature_model->temperature_edit($temp);
        $this->load->view('backend/temperature', $data);
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    }
    public function Update_temp(){

        try {
            if($this->session->userdata('user_login_access') == False) 
            {
                throw new Exception("Session expired", 1);                
            } 
        $id = $this->input->post('id');
        $date = $this->input->post('date');
        $location = $this->input->post('location');
        $reading = $this->input->post('reading');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('date','date','trim|required|xss_clean');
        $this->form_validation->set_rules('location','location','trim|required|xss_clean');
        $this->form_validation->set_rules('reading','reading','trim|required|xss_clean');
 
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
         $data = array();
         $data = array('date' => $date,'location' => $location,'reading' => $reading);
        if(!empty($id)){
            $success =  $this->temperature_model->Update_Temperature($id, $data);  
            $message="Successfully Updated";         
        } 
        $response['status']=TRUE;
        $response['message']=$message;  


}   catch (Exception $e) {
    $response['status']=FALSE;
    $response['message']=$e->getMessage();
} 
echo json_encode($response); 
         
        
    }
    public function Delete_temp($id){
        if($this->session->userdata('user_login_access') != False) {
        $this->temperature_model->temperature_delete($id);
        //$this->session->set_flashdata('delsuccess', 'Successfully Deleted');
        redirect('monitoring/temperature');
        }
    else{
        redirect(base_url() , 'refresh');
    }        
    }
    public function Save_fireext(){
        try {
            if($this->session->userdata('user_login_access') == False) 
            {
                throw new Exception("Session expired", 1);                
            }   
           $ext_id = $this->input->post('ext_id');
           $location = $this->input->post('location');
           $capacity = $this->input->post('capacity');
           $cylinder_no = $this->input->post('cylinder_no');
           $this->load->library('form_validation');
           $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
           $this->form_validation->set_rules('ext_id','ext_id','trim|required|xss_clean');
           $this->form_validation->set_rules('location','location','trim|required|xss_clean');
           $this->form_validation->set_rules('capacity','capacity','trim|required|xss_clean');
           $this->form_validation->set_rules('cylinder_no','cylinder_no','trim|required|xss_clean');
    
           if ($this->form_validation->run() == FALSE) {
               echo validation_errors();
           }
            $data = array();
            $data = array('ext_id' => $ext_id,'location' => $location,'capacity' => $capacity,'cylinder_no' => $cylinder_no);
            if(empty($id)){
                $success = $this->temperature_model->Add_Fireext($data);  
                $message="Successfully added";         
            } 
            $response['status']=TRUE;
            $response['message']=$message;  
    
    
    }   catch (Exception $e) {
        $response['status']=FALSE;
        $response['message']=$e->getMessage();
    } 
    echo json_encode($response);  
        }
        public function fireexting_edit($id){
            if($this->session->userdata('user_login_access') != False) { 
            $data['locations'] = $this->temperature_model->GetLocation();
            $data['fireextingu'] = $this->temperature_model->getfireextinguisher();
            $data['editfireext']=$this->temperature_model->fireexting_edit($id);
            $this->load->view('backend/fire_ext', $data);
            }
        else{
            redirect(base_url() , 'refresh');
        }        
        }
        public function Update_fireext(){
    
            try {
                if($this->session->userdata('user_login_access') == False) 
                {
                    throw new Exception("Session expired", 1);                
                } 
            $id = $this->input->post('id');
            $ext_id = $this->input->post('ext_id');
            $location = $this->input->post('location');
            $capacity = $this->input->post('capacity');
            $cylinder_no = $this->input->post('cylinder_no');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('ext_id','ext_id','trim|required|xss_clean');
            $this->form_validation->set_rules('location','location','trim|required|xss_clean');
            $this->form_validation->set_rules('capacity','capacity','trim|required|xss_clean');
            $this->form_validation->set_rules('cylinder_no','cylinder_no','trim|required|xss_clean');
    
            if ($this->form_validation->run() == FALSE) {
               echo validation_errors();
            }
            $data = array();
            $data = array('ext_id' => $ext_id,'location' => $location,'capacity' => $capacity,'cylinder_no' => $cylinder_no);
            if(!empty($id)){
                $success =  $this->temperature_model->Update_Fireexting($id, $data);  
                $message="Successfully Updated";         
            } 
            $response['status']=TRUE;
            $response['message']=$message;  
    
    
    }   catch (Exception $e) {
        $response['status']=FALSE;
        $response['message']=$e->getMessage();
    } 
    echo json_encode($response); 
             
            
        }
    public function viewfire_exiting()
    {
	if($this->session->userdata('user_login_access') != False) 
	{
		$id = base64_decode($this->input->get('id'));
        $data['locations'] = $this->temperature_model->GetLocation();
		$data['fireextingu']= $this->temperature_model->Getfireextingview($id);
        $data['refilling']= $this->temperature_model->Getrefillinglist($id);
        $data['service']= $this->temperature_model->Getservicelist($id);
        $data['editfireext']=$this->temperature_model->fireexting_edit($id);
		$this->load->view('backend/fireextinguisher_view',$data);  
	}
	else
	{
		redirect(base_url() , 'refresh');
	}
}
public function Add_Refilldate(){
    
    try {
        if($this->session->userdata('user_login_access') == False) 
        {
            throw new Exception("Session expired", 1);                
        } 
    $id = $this->input->post('id');
    $last_refill = $this->input->post('last_refill');
    $next_refill = $this->input->post('next_refill');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('last_refill','last_refill','trim|required|xss_clean');
    $this->form_validation->set_rules('next_refill','next_refill','trim|required|xss_clean');


    if ($this->form_validation->run() == FALSE) {
       echo validation_errors();
    }
    $data = array();
    $data1 = array();
    $data = array('fireext_id' => $id,'last_refill' => $last_refill,'next_refill' => $next_refill);
    $data1 = array('last_refill' => $last_refill,'next_refill' => $next_refill);
    $this->temperature_model->Update_Fireextingdetails($id,$data1);
    if(!empty($id)){
        $success =  $this->temperature_model->Add_Fireextingdetails($data);  
        $message="Successfully added";         
    } 
    $response['status']=TRUE;
    $response['message']=$message;  


}   catch (Exception $e) {
$response['status']=FALSE;
$response['message']=$e->getMessage();
} 
echo json_encode($response); 
     
    
}  
public function Add_Servicedate(){
    
    try {
        if($this->session->userdata('user_login_access') == False) 
        {
            throw new Exception("Session expired", 1);                
        } 
    $id = $this->input->post('id');
    $last_service = $this->input->post('last_service');
    $next_service = $this->input->post('next_service');
    $remarks = $this->input->post('remarks');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('last_service','last_service','trim|required|xss_clean');
    $this->form_validation->set_rules('next_service','next_service','trim|required|xss_clean');
    $this->form_validation->set_rules('remarks','remarks','trim|required|xss_clean');


    if ($this->form_validation->run() == FALSE) {
       echo validation_errors();
    }
    $data = array();
    $data1 = array();
    $data = array('fireext_id' => $id,'last_service' => $last_service,'next_service' => $next_service,'remarks' => $remarks);
    $data1 = array('last_service' => $last_service,'next_service' => $next_service,'remarks' => $remarks);
    $this->temperature_model->Update_Fireservicedetails($id,$data1);
    if(!empty($id)){
        $success =  $this->temperature_model->Add_Fireservicedetails($data);  
        $message="Successfully added";         
    } 
    $response['status']=TRUE;
    $response['message']=$message;  


}   catch (Exception $e) {
$response['status']=FALSE;
$response['message']=$e->getMessage();
} 
echo json_encode($response); 
     
    
}
}