 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {

	    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model'); 
        $this->load->model('loan_model');
        $this->load->model('settings_model');    
        $this->load->model('leave_model');    
        $this->load->model('logistic_model');    
        $this->load->model('project_model');    
        $this->load->model('equipment_model');    
    }
    
/*    public function View(){
        if($this->session->userdata('user_login_access') != False) {
        $data['logisticview'] = $this->logistic_model->LogisticValue();
            
        $this->load->view('backend/logistic_list',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }*/
    public function logistic_support(){
        if($this->session->userdata('user_login_access') != False) {
        $data['projects'] = $this->project_model->GetProjectsValue();    
        /*$data['logisticview'] = $this->logistic_model->LogisticValue();*/    
        $data['supportview'] = $this->logistic_model->LogisticsupportValue();
        $data['employee'] = $this->employee_model->emselect();  
        $data['tasks'] = $this->project_model->GetAllTasksList();
        $data['assets'] = $this->project_model->GetAllAssetsList();    
        $this->load->view('backend/logistic_support',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }
    public function Add_Logistic(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('logid');
        $name = $this->input->post('logname');
        $qty = $this->input->post('logqty');
        $logdate = date("m/d/y");
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('logname', 'name details', 'trim|required|min_length[2]|max_length[220]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			redirect("loan/View");
			} else {
            $data = array();
                $data = array(
                    'name' => $name,
                    'qty' => $qty,
                    'entry_date' => $logdate
                );
            if(empty($id)){
                $success = $this->logistic_model->Add_LogisticeData($data);
                #$this->session->set_flashdata('feedback','Successfully Added');
                #redirect("loan/View");
                echo "Successfully Added";
            } else {
                $success = $this->logistic_model->Update_LogisticeData($id,$data);
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("loan/View");
                echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Add_Logistic_Support(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('assid');
        $logid = $this->input->post('logid');
        $assignid = $this->input->post('assignid');
        $proid = $this->input->post('proid');
        $taskid = $this->input->post('taskid');
        $assignqty= $this->input->post('assignqty');
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $backdate = $this->input->post('backdate');
        $backqty = $this->input->post('backqty');
        $remarks = $this->input->post('remarks');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('assignqty', 'Quantity', 'trim|required|min_length[1]|max_length[220]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			#redirect("loan/View");
			} else {
            $data = array();
                $data = array(
                    'asset_id' => $logid,
                    'assign_id' => $assignid,
                    'project_id' => $proid,
                    'task_id' => $taskid,
                    'log_qty' => $assignqty,
                    'start_date' => $startdate,
                    'end_date' => $enddate,
                    'back_date' => $backdate,
                    'back_qty' => $backqty,
                    'remarks' => $remarks
                );
            if(empty($id)){
                $success = $this->logistic_model->Add_LogisticeSupport($data);
                #$this->session->set_flashdata('feedback','Successfully Added');
                #redirect("loan/View");
                #echo "Successfully Added";
                $assets = $this->logistic_model->getAssetsQty($logid);
                $inqty = $assets->in_stock - $assignqty;
                $data = array();
                $data = array(
                    'in_stock' => $inqty
                ); 
                $this->logistic_model->Update_Assets($logid,$data);
                 echo "Successfully Updated";
            } else {
                $success = $this->logistic_model->Update_LogisticeSupport($id,$data);
                $assets = $this->logistic_model->getAssetsQty($logid);
                $inqty = $assets->in_stock + $backqty;
                $data = array();
                $data = array(
                    'in_stock' => $inqty
                ); 
                $this->logistic_model->Update_Assets($logid,$data);
                 echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function Logisticebyib(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('id');
		$data['logisticevaluebyid'] = $this->logistic_model->GetLogisticeValueByid($id);
		echo json_encode($data);        
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Logisticesupportbyib(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('id');
		$data['logisticsupport'] = $this->logistic_model->GetLogisticesupportvalByid($id);
		echo json_encode($data);        
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function GetInstock(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('id');
		$instock = $this->logistic_model->GetINStock($id);
		echo $instock->in_stock;        
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Logisticedelet(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('D');
        $this->logistic_model->DeletLogistic($id);        
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function GetTaskforlogistic(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('id');
		$taskvalue = $this->logistic_model->GettaskByProid($id);
        foreach($taskvalue as $value){
            echo"<option value='$value->id'>$value->task_title</option>";
        }        
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }
    public function AssetscatByID(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('id');
		$data['assetscatval'] = $this->logistic_model->GetAssetsVal($id);
		echo json_encode($data);        
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }
    public function GetAssignforlogistic(){
    if($this->session->userdata('user_login_access') != False) {
		$id = $this->input->get('id');
		$emvalue = $this->logistic_model->GetAssignByProid($id);
        foreach($emvalue as $value){
            echo"<option value='$value->em_id'>$value->first_name $value->last_name</option>";
        }        
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }
    public function Assets_Category(){
    if($this->session->userdata('user_login_access') != False) {
        $data=array();
        $data['catvalue'] = $this->project_model->GetAssetsCategory();
        $this->load->view('backend/assets_category',$data);
    }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_Assets_Category(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('catid');
        $cattype = $this->input->post('cattype');
        $catname = $this->input->post('catname');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('catname', 'Category name', 'trim|required|min_length[1]|max_length[220]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
			} else {
            $data = array();
                $data = array(
                    'cat_name' => $catname,
                    'cat_status' => $cattype
                );
            if(empty($id)){
                $success = $this->logistic_model->Add_Assets_Category($data);
                 echo "Successfully Added";
            } else {
                $success = $this->logistic_model->Update_Assets_Category($id,$data);
                 echo "Successfully Updated";
            }
                       
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }
    public function plant_equipment(){
        if($this->session->userdata('user_login_access') != False) {         
        $data['assets'] = $this->equipment_model->GetAssetsList(1);
        $data['catvalue'] = $this->project_model->GetEquipmentCategory();
        $data['locations'] = $this->project_model->GetLocation();
        $this->load->view('backend/plant_equipment',$data);
        }
        else{
    		redirect(base_url() , 'refresh');
    	}            
    }
    public function office_equipment(){
        if($this->session->userdata('user_login_access') != False) {         
        $data['assets'] = $this->equipment_model->GetAssetsList(2);
        $data['catvalue'] = $this->project_model->GetEquipmentCategory();
        $data['locations'] = $this->project_model->GetLocation();
        $this->load->view('backend/office_equipment',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
    public function tools_equipment(){
        if($this->session->userdata('user_login_access') != False) {         
        $data['assets'] = $this->equipment_model->GetAssetsList(3);
        $data['catvalue'] = $this->project_model->GetEquipmentCategory();
        $data['locations'] = $this->project_model->GetLocation();
        $this->load->view('backend/tools_others',$data);
        }
        else{
            redirect(base_url() , 'refresh');
        }            
    }
    public function Add_Assets()
    {
        if($this->session->userdata('user_login_access') != False) 
        {        
            $id = $this->input->post('aid');    
            $name = $this->input->post('name');    
        	$type = $this->input->post('type');
        	$tag_no = $this->input->post('tag_no');
        	$model= $this->input->post('model');		
        	$installation_date = $this->input->post('installation_date');		
        	$manufacturer = $this->input->post('manufacturer');		
        	$parts_included = $this->input->post('parts_included');		
        	$location = $this->input->post('location');		
        	$warrenty = $this->input->post('warrenty');				
            $power = $this->input->post('power');             
            $status = $this->input->post('status');             
            $specification = $this->input->post('specification');                        		
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('name', 'Name','trim|required|min_length[2]|max_length[2024]|xss_clean');
            $this->form_validation->set_rules('type', 'Type','trim|required');
            $this->form_validation->set_rules('tag_no', 'Tag No','trim|required|min_length[2]|max_length[2024]|xss_clean');
            $this->form_validation->set_rules('model', 'Model','trim|required|min_length[2]|max_length[2024]|xss_clean');
            $this->form_validation->set_rules('installation_date', 'Installation date','trim|required');
            $this->form_validation->set_rules('manufacturer', 'Manufacturer','trim|required|xss_clean');
            $this->form_validation->set_rules('location', 'Location','trim|required|xss_clean');
            $this->form_validation->set_rules('warrenty', 'Warrenty','trim|required|xss_clean');
            $this->form_validation->set_rules('power', 'power','trim|required|xss_clean');
            $this->form_validation->set_rules('specification', 'specification','trim|required|xss_clean');
            $this->form_validation->set_rules('status', 'status','trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
    			} 
                else {
                    $data['name']=$name;
                    $data['type']=$type;
                    $data['tag_no']=$tag_no;
                    $data['model']=$model;
                    $data['installation_date']=$installation_date;
                    $data['manufacturer']=$manufacturer;
                    $data['parts_included']=$parts_included;
                    $data['location_id']=$location;
                    $data['warrenty']=$warrenty;
                    $data['power']=$power;
                    $data['status']=$status;
                    $data['specification']=$specification;
                if(empty($id)){
                    $success = $this->equipment_model->Add_equipment($data); 
        			echo "Successfully Added";            
                } 
                else {
                    $success = $this->equipment_model->Update_Equipment($id,$data); 
        			echo "Successfully Updated"; 
                }   
            } 
        }
        else{
    		redirect(base_url() , 'refresh');
    	}    
    } 
    public function AssetsByID(){
        if($this->session->userdata('user_login_access') != False) {  
		$id= $this->input->get('id');
		$data['assetsByid'] = $this->equipment_model->GetAssetById($id);
		echo json_encode($data);
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }    
}
?>