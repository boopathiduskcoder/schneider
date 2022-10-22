<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Maintenance extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('login_model');
		$this->load->model('dashboard_model');
		$this->load->model('employee_model');
		$this->load->model('project_model');
		$this->load->model('settings_model');
		$this->load->model('leave_model');
		$this->load->model('logistic_model');
		$this->load->model('attendance_model');
		$this->load->model('preventive_model');
	}

	public function index()
	{
		#Redirect to Admin dashboard after authentication
		if ($this->session->userdata('user_login_access') == 1)
			redirect('dashboard/Dashboard');
		$data = array();
		#$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
		$this->load->view('login');
	}

	public function Field_visit()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$data['projects']    = $this->project_model->GetProjectsValue();
			$data['employee']    = $this->employee_model->emselect();
			$data['application'] = $this->project_model->GetF_i_e_l_dApplication();
			$this->load->view('backend/field_visit', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	function All_Projects()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$data['employee'] = $this->employee_model->emselect();
			if ($this->session->userdata('user_type') == 'EMPLOYEE') {
				$id               = $this->session->userdata('user_login_id');
				$data['projects'] = $this->project_model->GetEmProjectsValue($id);
			} else {
				$data['projects'] = $this->project_model->GetProjectsValue();
			}

			$this->load->view('backend/projects', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function Field_Application(){

		if($this->session->userdata('user_login_access') != False) { 
			$id = $this->input->post('fid');
			$projectID = $this->input->post('projectID');
			$fieldLocation = $this->input->post('fieldLocation');
			$emid = $this->input->post('emid');
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$totalDays = $this->input->post('totalDays');
			$notes = $this->input->post('notes');
			$actualReturnDate = $this->input->post('actualReturnDate');

			#$status = $this->input->post('status');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();
			$this->form_validation->set_rules('emid', 'employee', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/All_Projects");
			} else {
				$data = array();
				$data = array(
					'project_id' => $projectID,
					'emp_id' => $emid,
					'field_location' => $fieldLocation,
					'start_date' => $startdate,
					'approx_end_date' => $enddate,
					'total_days' => $totalDays,
					'notes' => $notes,
					'actual_return_date' => $actualReturnDate,
					'status' => 'Not Approve'
				);
				if(empty($id)){
					$success = $this->project_model->Add_FieldData($data);
					echo "Successfully Added";
				} else {
					$data = array(
						'project_id' => $projectID,
						'emp_id' => $emid,
						'field_location' => $fieldLocation,
						'start_date' => $startdate,
						'approx_end_date' => $enddate,
						'total_days' => $totalDays,
						'notes' => $notes,
						'actual_return_date' => $actualReturnDate
					);

					$success = $this->project_model->update_FieldData($id, $data);
					echo "Successfully Updated";
				}

			}
		}
		else{
			redirect(base_url() , 'refresh');
		}        
	}

	public function Add_Projects()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id        = $this->input->post('proid');
			$title     = $this->input->post('protitle');
			$startdate = $this->input->post('startdate');
			$enddate   = $this->input->post('enddate');
			$details   = $this->input->post('details');
			$summery   = $this->input->post('summery');
			$status    = $this->input->post('prostatus');
			$progress  = $this->input->post('progress');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();
			$this->form_validation->set_rules('protitle', 'project Title', 'trim|required|min_length[5]|max_length[220]|xss_clean');
			$this->form_validation->set_rules('details', 'details', 'trim|min_length[10]|max_length[1024]|xss_clean');
			$this->form_validation->set_rules('summery', 'summery', 'trim|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/All_Projects");
			} else {
				$data = array();
				$data = array(
					'pro_name' => $title,
					'pro_start_date' => $startdate,
					'pro_end_date' => $enddate,
					'pro_description' => $details,
					'pro_summary' => $summery,
					'progress' => $progress,
					'pro_status' => $status
				);
				if (empty($id)) {
					$success = $this->project_model->Add_ProjectData($data);
					#$this->session->set_flashdata('feedback','Successfully Added');
					#redirect("projects/All_Projects");
					echo "Successfully Added";
				} else {
					$success = $this->project_model->update_ProjectData($id, $data);
					#$this->session->set_flashdata('feedback','Successfully Updated');
					#redirect("projects/view?P=" .base64_encode($id));
					echo "Successfully Updated";
				}

			}
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function Add_Tasks()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id        = $this->input->post('id');
			$emid      = $this->input->post('assignto[]');
			$proid     = $this->input->post('projectid');
			$title     = $this->input->post('tasktitle');
			$head      = $this->input->post('teamhead');
			$details   = $this->input->post('details');
			$startdate = $this->input->post('startdate');
			$enddate   = $this->input->post('enddate');
			$type      = $this->input->post('type');
			$status    = $this->input->post('status');
			$date      = date('Y-m-d');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();
			$this->form_validation->set_rules('tasktitle', 'tasktitle', 'trim|required|min_length[10]|max_length[150]|xss_clean');
			$this->form_validation->set_rules('details', 'details', 'trim|required|min_length[10]|max_length[2024]|xss_clean');
            
			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/view?P=" .base64_encode($id));
			} else {
				$data = array();
				$data = array(
					'pro_id' => $proid,
					/*'ass_id' => $logid,*/
					/*'assign_to' => $head,*/
					'task_title' => $title,
					'description' => $details,
					'start_date' => $startdate,
					'end_date' => $enddate,
					'create_date' => $date,
					'task_type' => $type,
					/*                    'location'=> $location,*/
					'status' => $status,
					'approve_status' => 'Approve'
				);
				if (empty($id)) {
					$success  = $this->project_model->Add_Tasks($data);
					$insertid = $this->db->insert_id();
					$data     = array();
					$data     = array(
						'task_id' => $insertid,
						'project_id' => $proid,
						'assign_user' => $head,
						'user_type' => 'Team Head'
					);
					$success  = $this->project_model->insert_members_Data($data);
					$emid     = $this->input->post('assignto[]');
					foreach ($emid as $dataarray) {
						$data    = array();
						$data    = array(
							'task_id' => $insertid,
							'project_id' => $proid,
							'assign_user' => $dataarray,
							'user_type' => 'Collaborators'
						);
				$success = $this->project_model->insert_members_Data($data);
					}
					echo "Successfully Added";
				} /*else {
					$success = $this->project_model->Update_Tasks($id, $data);
					$success = $this->project_model->Delet_members_Data($id);
					$emid    = $this->input->post('assignto[]');
					foreach ($emid as $dataarray) {
						$data = array();
						$data = array(
							'project_id' => $proid,
							'assign_user' => $dataarray,
							'user_type' => 'Collaborators'
						);

						$success = $this->project_model->insert_members_Data($data);
					}
					echo "Successfully Updated";
				}*/

			}
		}


		else {
			redirect(base_url(), 'refresh');
		}
	}
	public function Add_Field_Tasks()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id        = $this->input->post('id');
			$emid      = $this->input->post('assignto[]');
			$proid     = $this->input->post('projectid');
			$title     = $this->input->post('tasktitle');
			$head      = $this->input->post('teamhead');
			$details   = $this->input->post('details');
			$startdate = $this->input->post('startdate');
			$enddate   = $this->input->post('enddate');
			$type      = $this->input->post('type');
			$status    = $this->input->post('status');
			$location  = $this->input->post('location');
			$astatus   = $this->input->post('appstatus');
			$date      = date('d:m:y');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();
			$this->form_validation->set_rules('tasktitle', 'tasktitle', 'trim|required|min_length[10]|max_length[150]|xss_clean');

			$this->form_validation->set_rules('details', 'details', 'trim|required|min_length[10]|max_length[2024]|xss_clean');


			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/view?P=" .base64_encode($id));
			} else {
				$data = array();
				$data = array(
					'pro_id' => $proid,
					/*'ass_id' => $logid,*/
					/*'assign_to' => $head,*/
					'task_title' => $title,
					'description' => $details,
					'start_date' => $startdate,
					'end_date' => $enddate,
					'create_date' => $date,
					'task_type' => $type,
					'location' => $location,
					'status' => $status,
					'approve_status' => $astatus
				);
				if (empty($id)) {
					$success  = $this->project_model->Add_Tasks($data);
					$insertid = $this->db->insert_id();
					$data     = array();
					$data     = array(
						'task_id' => $insertid,
						'project_id' => $proid,
						'assign_user' => $head,
						'user_type' => 'Team Head'
					);
					$success  = $this->project_model->insert_members_Data($data);
					$emid     = $this->input->post('assignto[]');
					foreach ($emid AS $dataarray) {
						$data    = array();
						$data    = array(
							'task_id' => $insertid,
							'project_id' => $proid,
							'assign_user' => $dataarray,
							'user_type' => 'Collaborators'
						);
						$success = $this->project_model->insert_members_Data($data);
					}
					echo "Successfully Added";
				} else {
					$success = $this->project_model->Update_Tasks($id, $data);
					$success = $this->project_model->Delet_members_Data($id);
					$emid    = $this->input->post('assignto[]');
					foreach ($emid AS $dataarray) {
						$data = array();
						$data = array(
							'task_id' => $insertid,
							'project_id' => $proid,
							'assign_user' => $dataarray,
							'user_type' => 'Collaborators'
						);

						$success = $this->project_model->insert_members_Data($data);
					}
					echo "Successfully Updated";
				}

			}
		}


		else {
			redirect(base_url(), 'refresh');
		}
	}
	public function Add_Logistic()
	{
		$projectid = $this->input->post('proid');
		$logid     = $this->input->post('logistic');
		$assignid  = $this->input->post('teamhead');
		$task      = $this->input->post('taskid');
		$logqty    = $this->input->post('qty');
		$startdate = $this->input->post('startdate');
		$enddate   = $this->input->post('enddate');
		$remarks   = $this->input->post('remarks');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters();
		$this->form_validation->set_rules('taskid', 'task', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
			#redirect("loan/View");
		} else {
			$data = array();
			$data = array(
				'asset_id' => $logid,
				'assign_id' => $assignid,
				'project_id' => $projectid,
				'task_id' => $task,
				'log_qty' => $logqty,
				'start_date' => $startdate,
				'end_date' => $enddate,
				/*                    'back_date' => $backdate,
                'back_qty' => $backqty,*/
				'remarks' => $remarks
			);
			if (empty($id)) {
				$success = $this->logistic_model->Add_LogisticeSupport($data);
				#$this->session->set_flashdata('feedback','Successfully Added');
				#redirect("loan/View");
				#echo "Successfully Added";
				$assets  = $this->logistic_model->getAssetsQty($logid);
				$inqty   = $assets->in_stock - $logqty;
				$data    = array();
				$data    = array(
					'in_stock' => $inqty
				);
				$this->logistic_model->Update_Assets($logid, $data);
				echo "Successfully Updated";
			} else {
				$success = $this->logistic_model->Update_LogisticeSupport($id, $data);
				$assets  = $this->logistic_model->getAssetsQty($logid);
				$inqty   = $assets->in_stock + $backqty;
				$data    = array();
				$data    = array(
					'in_stock' => $inqty
				);
				$this->logistic_model->Update_Assets($logid, $data);
				echo "Successfully Updated";
			}

		}
	}
	public function Add_File()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$emid    = $this->input->post('assignto');
			$proid   = $this->input->post('proid');
			$details = $this->input->post('details');
			$date    = date('d:m:y');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();

			$this->form_validation->set_rules('details', 'details', 'trim|required|min_length[10]|max_length[300]|xss_clean');


			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/view?P=" .base64_encode($id));
			} else {
				$file_name = $_FILES['img_url']['name'];
				$fileSize  = $_FILES["img_url"]["size"] / 1024;
				$fileType  = $_FILES["img_url"]["type"];

				$config = array(
					'file_name' => $file_name,
					'upload_path' => "./assets/images/projects",
					'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx|mp3|mpeg",
					'overwrite' => False,
					'max_size' => "40480000",
					'max_height' => "3600",
					'max_width' => "3600"
				);

				$this->load->library('Upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('img_url')) {
					echo $this->upload->display_errors();
					#redirect("projects/view?P=" .base64_encode($proid));
				}

				else {
					$path    = $this->upload->data();
					$img_url = $path['file_name'];
					$data    = array();
					$data    = array(
						'pro_id' => $proid,
						'file_details' => $details,
						'file_url' => $img_url,
						'assigned_to' => $emid
					);
					$success = $this->project_model->Add_Project_File($data);
					echo "Successfully Updated";
					#$this->session->set_flashdata('feedback','Successfully Updated');
					#redirect("projects/view?P=" .base64_encode($proid));
				}

			}
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function Add_Pro_Notes()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id      = $this->input->post('id');
			$emid    = $this->input->post('assignto');
			$proid   = $this->input->post('proid');
			$details = $this->input->post('details');
			$date    = date('Y-m-d');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();

			$this->form_validation->set_rules('details', 'details', 'trim|required|min_length[5]|max_length[2024]|xss_clean');
			//die($id);

			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/view?P=" .base64_encode($id));
			} else {
				$data = array();
				$data = array(
					'pro_id' => $proid,
					'details' => $details,
					'assign_to' => $emid
				);
				if(empty($id)){
					$success = $this->project_model->Add_Project_Notes($data);
					#$this->session->set_flashdata('feedback','Successfully Updated');
					#redirect("projects/view?P=" .base64_encode($proid));
					echo "Successfully Added";
				} else {
					$success = $this->project_model->Update_Project_Notes($id, $data);
					#$this->session->set_flashdata('feedback','Successfully Updated');
					#redirect("projects/view?P=" .base64_encode($proid));
					echo "Successfully Updated";
				}


			}
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function Add_Expenses()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id      = $this->input->post('id');
			$emid    = $this->input->post('assignto');
			$proid   = $this->input->post('proid');
			$details = $this->input->post('details');
			$amount  = $this->input->post('amount');
			$date    = $this->input->post('date');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters();

			$this->form_validation->set_rules('details', 'details', 'trim|required|min_length[10]|max_length[250]|xss_clean');


			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
				#redirect("projects/view?P=" .base64_encode($id));
			} else {
				$data = array();
				$data = array(
					'pro_id' => $proid,
					'details' => $details,
					'amount' => $amount,
					'assign_to' => $emid,
					'date' => $date
				);
				if (empty($id)) {
					$success = $this->project_model->Add_Project_expenses($data);
					#$this->session->set_flashdata('feedback','Successfully Updated');
					# redirect("projects/view?P=" .base64_encode($proid));
					echo "Successfully Added";
				} else {
					$success = $this->project_model->Updated_Project_expenses($id, $data);
					#$this->session->set_flashdata('feedback','Successfully Updated');
					# redirect("projects/view?P=" .base64_encode($proid));
					echo "Successfully Updated";
				}


			}
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function view()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id                  = base64_decode($this->input->get('P'));
			$data['employee']    = $this->employee_model->emselect();
			$data['proemployee'] = $this->employee_model->ProjectEmployee($id);
			$data['details']     = $this->project_model->GetprojectDetails($id);
			/*      $data['office'] = $this->project_model->GetTasksOfficeList($id);
            $data['filed'] = $this->project_model->GetTasksFiledList($id);
            $data['both'] = $this->project_model->GetTasksBothList($id);*/
			$data['files']       = $this->project_model->GetFilesList($id);
			$data['tasklist']    = $this->project_model->GetTasksAllList($id);

			$data['notes']        = $this->project_model->GetNotesList($id);
			$data['expenses']     = $this->project_model->GetExpensesList($id);
			$data['assets']       = $this->project_model->GetAllLogisticList();
			$data['logisticlist'] = $this->project_model->GetAllLogistice($id);
			$this->load->view('backend/projects_view', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function preventive()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$data['service']    = $this->preventive_model->Getallservicelist();
			$data['equipments']    = $this->preventive_model->Getallequipmentslist();
			$data['locations']    = $this->preventive_model->Getlocationlist();
			$data['preventive']    = $this->preventive_model->Getpreventivelist();
			$this->load->view('backend/preventive', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function complaints()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$data['equipments'] = $this->preventive_model->Getallequipmentslist();
			$data['departments'] = $this->preventive_model->Getalldepartments();
			$data['breakdowntypes'] = $this->preventive_model->GetAllBreakdowntypes();
			$data['technicians'] = $this->preventive_model->GetAlltechnicians();
			$data['breakdowns'] = $this->preventive_model->GetAllBreakdown(2);
			$this->load->view('backend/complaints', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function breakdown()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$data['equipments'] = $this->preventive_model->Getallequipmentslist();
			$data['departments'] = $this->preventive_model->Getalldepartments();
			$data['breakdowntypes'] = $this->preventive_model->GetAllBreakdowntypes();
			$data['technicians'] = $this->preventive_model->GetAlltechnicians();
			$data['breakdowns'] = $this->preventive_model->GetAllBreakdown(1);
			$this->load->view('backend/breakdown', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function report()
	{
		if ($this->session->userdata('user_login_access') != False) {
			/*$data['equipments'] = $this->preventive_model->Getallequipmentslist();
			$data['departments'] = $this->preventive_model->Getalldepartments();
			$data['breakdowntypes'] = $this->preventive_model->GetAllBreakdowntypes();
			$data['technicians'] = $this->preventive_model->GetAlltechnicians();
			$data['breakdowns'] = $this->preventive_model->GetAllBreakdown(2);*/
			$this->load->view('backend/report');
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function LogisTicById()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id                     = $this->input->get('id');
			$data['logisticevalue'] = $this->project_model->GetLogisTicValue($id);
			#$data['employesvalue'] = $this->project_model->GetEmployesValue($id);
			echo json_encode($data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function TasksById()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id                    = $this->input->get('id');
			$data['tasksvalue']    = $this->project_model->GetTasksValue($id);
			$data['employesvalue'] = $this->project_model->GetEmployesValue($id);
			echo json_encode($data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function ExpensesById()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id                    = $this->input->get('id');
			$data['expensesvalue'] = $this->project_model->GetExpensesValue($id);
			echo json_encode($data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function NotesById()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id                     = $this->input->get('id');
			$data['notesbyidvalue'] = $this->project_model->GetNotesValueId($id);
			echo json_encode($data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function projectbyId()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id               = $this->input->get('id');
			$data['provalue'] = $this->project_model->GetprojectVal($id);
			echo json_encode($data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function TasksDeletByid()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id = $this->input->get('id');

			$imgvalue = $this->project_model->GetTasksValue($id);
			if (!empty($imgvalue->id)) {
				unlink("./assets/images/projects/$imgvalue->image");
				$success = $this->project_model->DeletPro($id);
				$success = $this->project_model->DeletAssignuser($id);
				echo 'Success Deletd';
			}
			#echo "Successfully Deletd";
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function FileDeletById()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id       = $this->input->get('id');
			$imgvalue = $this->project_model->GetFilebyFid($id);
			if (!empty($imgvalue->id)) {
				unlink("./assets/images/projects/$imgvalue->file_url");
				$success = $this->project_model->DeletProFile($id);
				echo 'Success Deletd';
			}
			#echo "Successfully Deletd";
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function deletExpenses()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id    = $this->input->get('D');
			$value = $this->project_model->DeletExpensesByid($id);
			echo "Successfully Deleted";
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function DeletNotes()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id    = $this->input->get('D');
			$value = $this->project_model->DletProjectData($id);
			echo "Successfully Deleted";
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function pDelet()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id    = base64_decode($this->input->get('D'));
			$value = $this->project_model->DletProjectData($id);
			redirect('Projects/All_Projects');
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function AssetsDelet()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id    = $this->input->get('D');
			$value = $this->project_model->DeletAssetssByid($id);
			redirect('Projects/All_Assets');
		} else {
			redirect(base_url(), 'refresh');
		}
	}


	/*Approve or reject the field visit*/
	public function authorizeFieldVisit()
	{

		if ($this->session->userdata('user_login_access') != False) {

			$fieldApplicationID = $this->input->post('fieldApplicationID');
			$approvalStatus     = $this->input->post('approvalStatus');

			$data = array();
			$data = array(
				'status' => $approvalStatus
			);

			$wasUpdated = $this->project_model->updateFieldVistApplication($fieldApplicationID, $data);

			if ($wasUpdated) {
				echo "Updated successfully";
			} else {
				echo "Something went wrong. Please check again.";
			}
		}
	}


	// Get the field visit data by id to edit
	public function getFieldVisitAppData()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id   = $this->input->get('id');
			$data = $this->project_model->getFieldAuthDataByID($id);

			echo json_encode($data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function closeAndUpdateFieldVisit()
	{

		// attendance_updated
		if ($this->session->userdata('user_login_access') != False) {

			$fieldApplicationID = $this->input->post('fieldApplicationID');
			$employeeID         = $this->input->post('employeeID');

			$data = array();
			$data = array(
				'attendance_updated' => 'done'
			);

			$wasUpdated = $this->project_model->fieldVisitDoneAndUpdateAttendance($fieldApplicationID, $data);

			if ($this->db->affected_rows()) {

				// Add attendance
				$attendanceDataFromFieldVisit = $this->project_model->selectDataFromFieldVisitByID($fieldApplicationID);

				$start_date = $attendanceDataFromFieldVisit[0]->start_date;
				$end_date   = $attendanceDataFromFieldVisit[0]->actual_return_date;

				$startDate = strtotime($start_date);
				$endDate = strtotime($end_date);
				for($i = $startDate; $i <= $endDate; $i = strtotime('+1 day', $i)){
					$date = date('Y-m-d', $i);
					$day = date("D", strtotime($date));
					if($day == "Fri"){
						$emcode = $this->employee_model->emselectByCode($employeeID);
						$emid = $emcode->em_id;
						$earnval = $this->leave_model->emEarnselectByLeave($emid); 
						$data = array();
						$data = array(
							'present_date' => $earnval->present_date + 1,
							'hour' => $earnval->hour + 480,
							'status' => '1'
						);
						$success = $this->leave_model->UpdteEarnValue($emid, $data);
						$duplicate = $this->attendance_model->getDuplicateVal($employeeID,$date);
						//print_r($duplicate);
						if(!empty($duplicate)){
							$data = array();
							$data = array(
								'emp_id' => $employeeID,
								'atten_date' => $date,
								'working_hour' => '480',
								'signin_time' => '09:00:00',
								'signout_time' => '17:00:00',
								'status' => 'E'
							);                            
							$this->attendance_model->bulk_Update($employeeID,$date,$data);
						} else {
							$data = array();
							$data = array(
								'emp_id' => $employeeID,
								'atten_date' => $date,
								'working_hour' => '480',
								'signin_time' => '09:00:00',
								'signout_time' => '17:00:00',
								'status' => 'E'
							);
							$this->project_model->insertAttendanceByFieldVisitReturn($data);    
						}
					} elseif($day != "Fri") {
						$da = date("Y-m-d", $i);
						$holiday = $this->leave_model->get_holiday_between_dates($da);
						if($holiday) {

							$emcode = $this->employee_model->emselectByCode($employeeID);
							$emid = $emcode->em_id;
							$earnval = $this->leave_model->emEarnselectByLeave($emid); 
							$data = array();
							$data = array(
								'present_date' => $earnval->present_date + 1,
								'hour' => $earnval->hour + 480,
								'status' => '1'
							);
							$success = $this->leave_model->UpdteEarnValue($emid, $data);
							$duplicate = $this->attendance_model->getDuplicateVal($employeeID,$date);
							//print_r($duplicate);
							if(!empty($duplicate)){
								$data = array();
								$data = array(
									'emp_id' => $employeeID,
									'atten_date' => $date,
									'working_hour' => '480',
									'signin_time' => '09:00:00',
									'signout_time' => '17:00:00',
									'status' => 'E'
								);                            
								$this->attendance_model->bulk_Update($employeeID,$date,$data);
							} else {                            
								$data = array();
								$data = array(
									'emp_id' => $employeeID,
									'atten_date' => $da,
									'working_hour' => '480',
									'signin_time' => '09:00:00',
									'signout_time' => '17:00:00',
									'status' => 'E'
								);
								$this->project_model->insertAttendanceByFieldVisitReturn($data);
							}
						} else {
							$date = date('Y-m-d', $i);
							$duplicate = $this->attendance_model->getDuplicateVal($employeeID,$date);
							//print_r($duplicate);    
							if(!empty($duplicate)){
								$data = array();
								$data = array(
									'emp_id' => $employeeID,
									'atten_date' => $date,
									'working_hour' => '480',
									'signin_time' => '09:00:00',
									'signout_time' => '17:00:00',
									'status' => 'A'
								);                            
								$this->attendance_model->bulk_Update($employeeID,$date,$data);
							} else {                             
								$data = array();
								$data = array(
									'emp_id' => $employeeID,
									'atten_date' => $date,
									'working_hour' => '480',
									'signin_time' => '09:00:00',
									'signout_time' => '17:00:00',
									'status' => 'A'
								);
								$this->project_model->insertAttendanceByFieldVisitReturn($data);
							}
						}
					}

				}

			}
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	public function Add_Preventive(){
		try {
            if($this->session->userdata('user_login_access') == False) 
            {
                throw new Exception("Session expired", 1);                
            } 
		$id     = $this->input->post('id');                     
        $ass_name = $this->input->post('ass_name');   
		$location = $this->input->post('location');    
        $service_days  = $this->input->post('service_days');     
        $startdate  = $this->input->post('startdate');     
        $enddate = $this->input->post('enddate'); 
		$status = $this->input->post('status');      
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters();
        $this->form_validation->set_rules('ass_name', 'Ass name','trim|required');
		$this->form_validation->set_rules('location', 'location','trim|required');
        $this->form_validation->set_rules('service_days', 'service days','trim|required|xss_clean');
        $this->form_validation->set_rules('startdate', 'start date','trim|required|xss_clean');
        $this->form_validation->set_rules('enddate', 'end date','trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'status','trim|required');
       
        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
            $data = array();
            $data = array('equipment_id' => $ass_name,'location_id' => $location,'interval_id' => $service_days,'last_date' => $startdate,'next_date' => $enddate,'status' => $status);
			if(empty($id)){
                $success = $this->preventive_model->Add_Preventive($data); 
                $message="Successfully added";      
            } 
            else {
                $success = $this->equipment_model->Update_Equipment($id,$data); 
                $message= "Successfully updated"; 
            }
            $response['status']=TRUE;
            $response['message']=$message;  
        }  catch (Exception $e) {
            $response['status']=FALSE;
            $response['message']=$e->getMessage();
        }    
        echo json_encode($response);
}
public function EditPreventive(){
	if($this->session->userdata('user_login_access') != False) {  
		$id = $_GET['id'];
	$data['preventivebyid'] = $this->preventive_model->GetPreventiveById($id);
	echo json_encode($data);
	}
else{
	redirect(base_url() , 'refresh');
}  
}
public function delete_preventive(){
	if($this->session->userdata('user_login_access') != False) {  
	$id= $this->input->get('id');
	$success = $this->preventive_model->preventive_delete($id);
	#echo "Successfully Deletd";
		redirect('maintenance/preventive');
	}
else{
	redirect(base_url() , 'refresh');
} 
}
public function Add_breakdown(){
	try {
		if($this->session->userdata('user_login_access') == False) 
		{
			throw new Exception("Session expired", 1);                
		} 
	$id     = $this->input->post('id');                     
	$equipmentid = $this->input->post('equipmentid');   
	$departmentid = $this->input->post('departmentid');    
	$breakdownid  = $this->input->post('breakdownid');  
	$technicianid  = $this->input->post('technicianid');    
	$dateandtime  = $this->input->post('dateandtime');     
	$details = $this->input->post('details'); 
	$type  = '1';     
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters();
	$this->form_validation->set_rules('equipmentid', 'equipmentid','trim|required');
	$this->form_validation->set_rules('departmentid', 'departmentid','trim|required');
	$this->form_validation->set_rules('breakdownid', 'breakdownid','trim|required|xss_clean');
	$this->form_validation->set_rules('technicianid', 'technicianid','trim|required|xss_clean');
	$this->form_validation->set_rules('dateandtime', 'dateandtime','trim|required|xss_clean');
	$this->form_validation->set_rules('details', 'details','trim|required|xss_clean');
   
	if ($this->form_validation->run() == FALSE) {
		echo validation_errors();
	}
		$data = array();
		$data = array('equipment_id' => $equipmentid,'department_id' => $departmentid,'breakdown_id' => $breakdownid, 'technician_id' => $technicianid,'date_and_time' => $dateandtime,'details' => $details,'type'=>$type);
		if(empty($id)){
			$success = $this->preventive_model->Add_breakdown($data); 
			$message="Successfully added";      
		} 
		else {
			$success = $this->preventive_model->Update_breakdown($id,$data); 
			$message= "Successfully updated"; 
		}
		$response['status']=TRUE;
		$response['message']=$message;  
	}  catch (Exception $e) {
		$response['status']=FALSE;
		$response['message']=$e->getMessage();
	}    
	echo json_encode($response);
}
public function Editbreakdown(){
	if($this->session->userdata('user_login_access') != False) {  
		$id = $_GET['id'];
	$data['breakbyid'] = $this->preventive_model->GetbreakdownById($id);
	echo json_encode($data);
	}
else{
	redirect(base_url() , 'refresh');
}  
}
public function delete_breakdown(){
	if($this->session->userdata('user_login_access') != False) {  
	$id= $this->input->get('id');
	$success = $this->preventive_model->breakdown_delete($id);
	#echo "Successfully Deletd";
		redirect('maintenance/breakdown');
	}
else{
	redirect(base_url() , 'refresh');
} 
}
public function Add_complaint(){
	try {
		if($this->session->userdata('user_login_access') == False) 
		{
			throw new Exception("Session expired", 1);                
		} 
	$id     = $this->input->post('id');                     
	$equipmentid = $this->input->post('equipmentid');   
	$departmentid = $this->input->post('departmentid');    
	$breakdownid  = $this->input->post('breakdownid');  
	$technicianid  = $this->input->post('technicianid');    
	$dateandtime  = $this->input->post('dateandtime');     
	$details = $this->input->post('details'); 
	$type  = '2';     
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters();
	$this->form_validation->set_rules('equipmentid', 'equipmentid','trim|required');
	$this->form_validation->set_rules('departmentid', 'departmentid','trim|required');
	$this->form_validation->set_rules('breakdownid', 'breakdownid','trim|required|xss_clean');
	$this->form_validation->set_rules('technicianid', 'technicianid','trim|required|xss_clean');
	$this->form_validation->set_rules('dateandtime', 'dateandtime','trim|required|xss_clean');
	$this->form_validation->set_rules('details', 'details','trim|required|xss_clean');
   
	if ($this->form_validation->run() == FALSE) {
		echo validation_errors();
	}
		$data = array();
		$data = array('equipment_id' => $equipmentid,'department_id' => $departmentid,'breakdown_id' => $breakdownid, 'technician_id' => $technicianid,'date_and_time' => $dateandtime,'details' => $details,'type'=>$type);
		if(empty($id)){
			$success = $this->preventive_model->Add_breakdown($data); 
			$message="Successfully added";      
		} 
		else {
			$success = $this->preventive_model->Update_breakdown($id,$data); 
			$message= "Successfully updated"; 
		}
		$response['status']=TRUE;
		$response['message']=$message;  
	}  catch (Exception $e) {
		$response['status']=FALSE;
		$response['message']=$e->getMessage();
	}    
	echo json_encode($response);
}
public function delete_complaint(){
	if($this->session->userdata('user_login_access') != False) {  
	$id= $this->input->get('id');
	$success = $this->preventive_model->complaint_delete($id);
	#echo "Successfully Deletd";
		redirect('maintenance/complaints');
	}
else{
	redirect(base_url() , 'refresh');
} 
}
public function Viewbreakdown()
{
	if($this->session->userdata('user_login_access') != False) 
	{
		$id = base64_decode($this->input->get('id'));
		$data['breakdown']= $this->preventive_model->Getbreakdownview($id);
		$data['product'] = $this->preventive_model->GetAllproducts();
		$data['technician'] = $this->preventive_model->GetAlltechni();
		$this->load->view('backend/breakdown_view',$data);  
	}
	else
	{
		redirect(base_url() , 'refresh');
	}
}
public function Update_status(){
	try {
		if($this->session->userdata('user_login_access') == False) 
		{
			throw new Exception("Session expired", 1);                
		} 
	$idb     = $this->input->post('id');     
	$date = $this->input->post('date');   
	$summary = $this->input->post('summary');
	$priority = $this->input->post('priority');
	$technician_id = $this->input->post('technician_id');
	$instruction = $this->input->post('instruction');
	$product = $this->input->post('product'); 
	$quantity = $this->input->post('quantity');     
	$status  = $this->input->post('status');     
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters();
	$this->form_validation->set_rules('date', 'date','trim|required');
	$this->form_validation->set_rules('summary', 'summary','trim|required');
	$this->form_validation->set_rules('priority', 'priority','trim|required');
	$this->form_validation->set_rules('instruction', 'instruction','trim|required');
	$this->form_validation->set_rules('product', 'product','trim|required');
	$this->form_validation->set_rules('quantity', 'quantity','trim|required');
	$this->form_validation->set_rules('status', 'status','trim|required');
   
	if ($this->form_validation->run() == FALSE) {
		echo validation_errors();
	} 
	$items = $this->preventive_model->GetAllstock($product);
	$productstock=$items->stock_in_hand;
	
            $id=$items->id;
            $stock=$productstock-$quantity;


            $data = array(
                    'stock_in_hand' => $stock
            );

        $this->db->where('id', $id);
        $this->db->update('stock', $data);  

     
		$data = array();
		$data = array('completeddate' => $date,'summary' => $summary,'technician_id' => $technician_id,'priority' => $priority, 'instruction' => $instruction,'product' => $product,'quantity' => $quantity,'status' => $status);
		if(!empty($idb)){
			$success = $this->preventive_model->Update_breakdownstatus($idb,$data); 
			$message= "Successfully updated"; 
		} 
		$response['status']=TRUE;
		$response['message']=$message;  
	}  catch (Exception $e) {
		$response['status']=FALSE;
		$response['message']=$e->getMessage();
	}    
	echo json_encode($response);
}
public function complaintslist()
	{
		if ($this->session->userdata('user_login_access') != False) {
			$id = $this->session->userdata('user_login_id');
			$data['equipments'] = $this->preventive_model->Getallequipmentslist();
			$data['departments'] = $this->preventive_model->Getalldepartments();
			$data['breakdowntypes'] = $this->preventive_model->GetAllBreakdowntypes();
			$data['technicians'] = $this->preventive_model->GetAlltechnicians();
			$data['complaints'] = $this->preventive_model->GetAllcomplaints($id);
			$this->load->view('backend/complaintslist', $data);
		} else {
			redirect(base_url(), 'refresh');
		}
	}
	public function viewpreventive()
{
if($this->session->userdata('user_login_access') != False) 
{
    $id = base64_decode($this->input->get('id'));
    $data['preventive']= $this->preventive_model->Getpreventiveview($id);
	$data['equipments'] = $this->preventive_model->Getallequipmentslist();
			$data['departments'] = $this->preventive_model->Getalldepartments();
			$data['breakdowntypes'] = $this->preventive_model->GetAllBreakdowntypes();
			$data['technicians'] = $this->preventive_model->GetAlltechnicians();
    $this->load->view('backend/preventive_view',$data);  
}
else
{
    redirect(base_url() , 'refresh');
}
}
public function View_complaint()
{
if($this->session->userdata('user_login_access') != False) 
{
	//$id = base64_decode($this->input->get('id'));
	//$data['fireextingu']= $this->temperature_model->Getfireextingview($id);
	
	$this->load->view('backend/complaint_view');  
}
else
{
	redirect(base_url() , 'refresh');
}
}
public function download_preventive(){
    
	$month=date('Y-m', strtotime($this->input->get('month')));
	$date = date('Y-m-d');
	$employeeData = $this->preventive_model->download_preventive($month);
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1', 'Equipment Name');
	$sheet->setCellValue('B1', 'Location');
	$sheet->setCellValue('C1', 'Service');
	$sheet->setCellValue('D1', 'Last Date');
    $sheet->setCellValue('E1', 'Next Date');
	$sheet->setCellValue('F1', 'Status');       
	$rows = 2;
	foreach ($employeeData as $val){
		$sheet->setCellValue('A' . $rows, $val->equipmentname);
		$sheet->setCellValue('B' . $rows, $val->location);
		$sheet->setCellValue('C' . $rows, $val->servicename);
		$sheet->setCellValue('D' . $rows, $val->last_date);
	    $sheet->setCellValue('E' . $rows, $val->next_date);
		$sheet->setCellValue('F' . $rows, $val->status);
		$rows++;
	} 
	$writer = new Xlsx($spreadsheet);
	$filename = 'preventivereport-'.$date; // set filename for excel file to be exported
    ob_clean();
	header("Content-Type: application/vnd.ms-excel; charset=UTF-8"); 
header("Pragma: public"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Disposition: attachment;filename={$filename}.xls "); 
	$writer->save('php://output');	// download file 
            
}    
public function download_breakdown(){

	$month=date('Y-m', strtotime($this->input->post('month')));
	$type =1;
	$date = date('Y-m-d');
	$employeeData = $this->preventive_model->download_complaint($month,$type);
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1', 'Equipment Name');
	$sheet->setCellValue('B1', 'Department');
	$sheet->setCellValue('C1', 'Breakdown');
	$sheet->setCellValue('D1', 'Assigned To');
    $sheet->setCellValue('E1', 'Reported Date & Time');
	$sheet->setCellValue('F1', 'Details');       
	$rows = 2;
	foreach ($employeeData as $val){
		$sheet->setCellValue('A' . $rows, $val->equipmentname);
		$sheet->setCellValue('B' . $rows, $val->dep_name);
		$sheet->setCellValue('C' . $rows, $val->breakdown_name);
		$sheet->setCellValue('D' . $rows, $val->first_name);
	    $sheet->setCellValue('E' . $rows, $val->date_and_time);
		$sheet->setCellValue('F' . $rows, $val->details);
		$rows++;
	} 
	$writer = new Xlsx($spreadsheet);
	$filename = 'breakdownreport-'.$date; // set filename for excel file to be exported
    ob_clean();
	header("Content-Type: application/vnd.ms-excel; charset=UTF-8"); 
header("Pragma: public"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Disposition: attachment;filename={$filename}.xls "); 
	$writer->save('php://output');	// download file 
            
}    
public function download_complaint(){
	$mon = $this->input->get('month');
	print_r($mon);
	$month=date('Y-m', strtotime($mon));
	$type =2;
	$date = date('Y-m-d');
	$employeeData = $this->preventive_model->download_complaint($month,$type);
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1', 'Equipment Name');
	$sheet->setCellValue('B1', 'Department');
	$sheet->setCellValue('C1', 'Breakdown');
	$sheet->setCellValue('D1', 'Assigned To');
    $sheet->setCellValue('E1', 'Reported Date & Time');
	$sheet->setCellValue('F1', 'Details');       
	$rows = 2;
	foreach ($employeeData as $val){
		$sheet->setCellValue('A' . $rows, $val->equipmentname);
		$sheet->setCellValue('B' . $rows, $val->dep_name);
		$sheet->setCellValue('C' . $rows, $val->breakdown_name);
		$sheet->setCellValue('D' . $rows, $val->first_name);
	    $sheet->setCellValue('E' . $rows, $val->date_and_time);
		$sheet->setCellValue('F' . $rows, $val->details);
		$rows++;
	} 
	$writer = new Xlsx($spreadsheet);
	$filename = 'complaintreport-'.$date; // set filename for excel file to be exported
    ob_clean();
	header("Content-Type: application/vnd.ms-excel; charset=UTF-8"); 
header("Pragma: public"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Disposition: attachment;filename={$filename}.xls "); 
	$writer->save('php://output');	// download file 
            
}    

public function Add_preventivecomplaint(){
	try {
		if($this->session->userdata('user_login_access') == False) 
		{
			throw new Exception("Session expired", 1);                
		} 
	$id     = $this->input->post('id');                    
	$equipmentid = $this->input->post('eid');  
	$departmentid = $this->input->post('departmentid');    
	$breakdownid  = $this->input->post('breakdownid');  
	$technicianid  = $this->input->post('technicianid');    
	$dateandtime  = $this->input->post('dateandtime');     
	$details = $this->input->post('details'); 
	$type  = '3';     
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters();
	$this->form_validation->set_rules('departmentid', 'departmentid','trim|required');
	$this->form_validation->set_rules('breakdownid', 'breakdownid','trim|required|xss_clean');
	$this->form_validation->set_rules('technicianid', 'technicianid','trim|required|xss_clean');
	$this->form_validation->set_rules('dateandtime', 'dateandtime','trim|required|xss_clean');
	$this->form_validation->set_rules('details', 'details','trim|required|xss_clean');
   
	if ($this->form_validation->run() == FALSE) {
		echo validation_errors();
	}
		$data = array();
		$data = array('equipment_id' => $equipmentid,'department_id' => $departmentid,'breakdown_id' => $breakdownid, 'technician_id' => $technicianid,'date_and_time' => $dateandtime,'details' => $details,'type'=>$type);
		if(empty($id)){
			$success = $this->preventive_model->Add_breakdown($data); 
			$message="Successfully added";      
		} 
		$response['status']=TRUE;
		$response['message']=$message;  
	}  catch (Exception $e) {
		$response['status']=FALSE;
		$response['message']=$e->getMessage();
	}    
	echo json_encode($response);
}
}
?>