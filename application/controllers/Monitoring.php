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
        $data['department'] = $this->organization_model->depselect();
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
        $am_6  = $this->input->post('am_6');     
        $pm_2  = $this->input->post('pm_2');     
        $pm_10 = $this->input->post('pm_10');     
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('date', 'Date','trim|required');
        $this->form_validation->set_rules('am_6', '6 AM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_2', '2 PM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_10', '10 PM','trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
            $data = array();
            $data = array('date' => $date,'am_6' => $am_6,'pm_2' => $pm_2,'pm_10' => $pm_10);
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
        $am_6  = $this->input->post('am_6');     
        $pm_2  = $this->input->post('pm_2');     
        $pm_10 = $this->input->post('pm_10');     
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('date', 'Date','trim|required');
        $this->form_validation->set_rules('am_6', '6 AM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_2', '2 PM','trim|required|xss_clean');
        $this->form_validation->set_rules('pm_10', '10 PM','trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
            $data = array();
            $data = array('date' => $date,'am_6' => $am_6,'pm_2' => $pm_2,'pm_10' => $pm_10);
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
    
}