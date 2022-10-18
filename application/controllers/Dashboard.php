 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');    
        $this->load->model('notice_model');    
        $this->load->model('project_model');    
        $this->load->model('leave_model');  
        $this->load->model('preventive_model');  
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
    function Dashboard(){
        if($this->session->userdata('user_login_access') != False) {
            $id = $this->session->userdata('user_login_id');
            $this->db->select('b.*');
            $this->db->from('breakdown b');
            $this->db->join('employee e', 'e.id = b.technician_id');
            $this->db->where('e.em_id', $id);
            $query=$this->db->get();
            $result = $query->result_array();
      $data= [];
      foreach($result as $row) {
       
 $data[] = ['status' => $row['status'],'count' =>$row['id']];
      }
      $data['chart_data'] = json_encode($data);
         $data['preventive']    = $this->preventive_model->Getpreventivelist();
         $data['inprogress']    = $this->preventive_model->Getinprogresslist();
         $data['techniciantask']    = $this->preventive_model->Gettechinprogresslist($id);
         
        $query= $this->db->query("SELECT `b`.*, `e`.`name` as `equipmentname`, `l`.`location_name` FROM `breakdown` `b` JOIN `equipments` `e` ON `e`.`id` = `b`.`equipment_id` JOIN `location` `l` ON `l`.`id` = `e`.`location_id`");
        
         $jsonevents = array();

    foreach($query->result() as $entry)
    {
        $jsonevents[] = array(
            'title' => $entry->equipmentname,
            'start' => date('Y-m-d', strtotime($entry->date_and_time)),
            'id' => $entry->id,
           'color'=>'#ff00ac',
           'type' => $entry->status,
           'className' => $entry->status
    
            
        );
    }

    $data['json'] = json_encode($jsonevents);

    $querys= $this->db->query("SELECT `b`.*, `e`.`name` as `equipmentname`, `l`.`location_name` FROM `breakdown` `b` JOIN `equipments` `e` ON `e`.`id` = `b`.`equipment_id` JOIN `location` `l` ON `l`.`id` = `e`.`location_id` JOIN `employee` `te` ON `te`.`id` = `b`.`technician_id` Where `te`.`em_id` ='$id' ");
         $jsoneventss = array();

    foreach($querys->result() as $entrys)
    {
        $jsoneventss[] = array(
            'title' => $entrys->equipmentname,
            'start' => date('Y-m-d', strtotime($entrys->date_and_time)),
            'id' => $entrys->id,
           'color'=>'#ff00ac',
           'type' => $entrys->status,
           'className' => $entrys->status
    
            
        );
    }

    $data['jsons'] = json_encode($jsoneventss);
           
        $this->load->view('backend/dashboard',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
    public function add_todo(){
        $userid = $this->input->post('userid');
        $tododata = $this->input->post('todo_data');
        $date = date("Y-m-d h:i:sa");
        $this->load->library('form_validation');
        //validating to do list data
        $this->form_validation->set_rules('todo_data', 'To-do Data', 'trim|required|min_length[5]|max_length[150]|xss_clean');        
        if($this->form_validation->run() == FALSE){
            echo validation_errors();
        } else {
        $data=array();
        $data = array(
        'user_id' => $userid,
        'to_dodata' =>$tododata,
        'value' =>'1',
        'date' =>$date    
        );
        $success = $this->dashboard_model->insert_tododata($data);
            #echo "successfully added";
            if($this->db->affected_rows()){
                echo "successfully added";
            } else {
                echo "validation Error";
            }
        }        
    }
	public function Update_Todo(){
        $id = $this->input->post('toid');
		$value = $this->input->post('tovalue');
			$data = array();
			$data = array(
				'value'=> $value
			);
        $update= $this->dashboard_model->UpdateTododata($id,$data);
        $inserted = $this->db->affected_rows();
		if($inserted){
			$message="Successfully Added";
			echo $message;
		} else {
			$message="Something went wrong";
			echo $message;			
		}
	}    
    
}