<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <?php if($this->session->userdata('user_type') !='TECHNICIAN') { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-wallet"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                            
                                    <?php 
                                        $this->db->where('type','2');
                                        $this->db->from("breakdown");
                                        echo $this->db->count_all_results();
                                    ?>  Complaints</h3>
                                        <a href="<?php echo base_url(); ?>maintenance/complaints" class="text-muted m-b-0">View Complaint</a></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-info"><i class="ti-user"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                             <?php 
                                                    //$this->db->where('status','active');
                                                    $this->db->from("technicians");
                                                    echo $this->db->count_all_results();
                                                ?> Technicians
                                        </h3>
                                        <a href="<?php echo base_url(); ?>technician/technicians" class="text-muted m-b-0">View Technician</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-danger"><i class="ti-calendar"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"> 
                                         <?php 
                                                $this->db->where('type','1');
                                                $this->db->from("breakdown");
                                                echo $this->db->count_all_results();
                                            ?> Breakdowns
                                        </h3>
                                        <a href="<?php echo base_url(); ?>maintenance/breakdown" class="text-muted m-b-0">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-settings"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">
                                         <?php 
                                                //$this->db->where('status','Granted');
                                                $this->db->from("equipments");
                                                echo $this->db->count_all_results();
                                            ?> Assets 
                                        </h3>
                                        <a href="<?php echo base_url(); ?>equipment/plant_equipment" class="text-muted m-b-0">View Asset</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else {} ?>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- Row -->
                
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">
                                    <?php if($this->session->userdata('user_type') !='TECHNICIAN') { 
                                             $this->db->select('b.*');
                                             $this->db->from('breakdown b');
                                             $this->db->join('employee te','te.id=b.technician_id');
                                             $this->db->where('b.status','completed');
                                             echo $this->db->count_all_results();


                                    }else{
                                        $id = $this->session->userdata('user_login_id');
                                        $this->db->select('b.*');
                                        $this->db->from('breakdown b');
                                        $this->db->join('employee te','te.id=b.technician_id');
                                        $this->db->where('te.em_id',$id);
                                        $this->db->where('b.status','completed');
                                        echo $this->db->count_all_results();
                                    } 
                                    ?>
                                </h1>
                                <h6 class="text-white">Completed Complaints</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-success card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                             <?php if($this->session->userdata('user_type') !='TECHNICIAN') { 
                                             $this->db->select('b.*');
                                             $this->db->from('breakdown b');
                                             $this->db->join('employee te','te.id=b.technician_id');
                                             $this->db->where('b.status','pending');
                                             echo $this->db->count_all_results();


                                    }else{
                                                    $id = $this->session->userdata('user_login_id');
                                                    $this->db->select('b.*');
                                                    $this->db->from('breakdown b');
                                                    $this->db->join('employee te','te.id=b.technician_id');
                                                    $this->db->where('te.em_id',$id);
                                                    $this->db->where('b.status','pending');
                                                    echo $this->db->count_all_results();
                                     } ?> 
                                </h1>
                                <h6 class="text-white">Pending Complaints</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-danger">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                     <?php if($this->session->userdata('user_type') !='TECHNICIAN') { 
                                             $this->db->select('b.*');
                                             $this->db->from('breakdown b');
                                             $this->db->join('employee te','te.id=b.technician_id');
                                             $this->db->where('b.status','');
                                             echo $this->db->count_all_results();


                                    }else{
                                            $id = $this->session->userdata('user_login_id');
                                            $this->db->select('b.*');
                                            $this->db->from('breakdown b');
                                            $this->db->join('employee te','te.id=b.technician_id');
                                            $this->db->where('te.em_id',$id);
                                            $this->db->where('b.status','');
                                            echo $this->db->count_all_results();
                                     } ?> 
                                </h1>
                                <h6 class="text-white">Upcoming Services</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-dark">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                         <?php if($this->session->userdata('user_type') !='TECHNICIAN') { 
                                             $this->db->select('b.*');
                                             $this->db->from('breakdown b');
                                             $this->db->join('employee te','te.id=b.technician_id');
                                             $this->db->where('b.status','inprogress');
                                             echo $this->db->count_all_results();


                                    }else{
                                                 $id = $this->session->userdata('user_login_id');
                                                 $this->db->select('b.*');
                                                 $this->db->from('breakdown b');
                                                 $this->db->join('employee te','te.id=b.technician_id');
                                                 $this->db->where('te.em_id',$id);
                                                 $this->db->where('b.status','inprogress');
                                                echo $this->db->count_all_results();
                                     } ?> 
                                </h1>
                                <h6 class="text-white">Inprogress Service</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
            </div> 
            <div class="container-fluid">
                <?php $notice = $this->notice_model->GetNoticelimit(); 
                $running = $this->dashboard_model->GetRunningProject(); 
                $userid = $this->session->userdata('user_login_id');
                $todolist = $this->dashboard_model->GettodoInfo($userid);                 
                $holiday = $this->dashboard_model->GetHolidayInfo();                 
                ?>
                <!-- Row --><?php if($this->session->userdata('user_type') !='TECHNICIAN') { ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                        
                            <div class="card-body">
                                <h4 class="card-title">Preventive Maintanence List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive slimScrollDiv" style="height:600px;overflow-y:scroll">
                                    <table class="table table-hover earning-box ">
                                        <thead>
                                            <tr>
                                                <th>Slno</th>
                                                <th>Asset Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $i=1;
                                            foreach ($preventive as $value){?>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td><?php echo $i; ?></td>
                                                <td><?php $aid =  $value->equipment_id;
                                                          $adata = $this->db->get_where('equipments',array('id '=>$aid))->row();
                                                          echo  $adata->name; ?></td>
                                                <td><?php $date= strtotime($value->next_date);
                                                          echo date("d-F-y", $date);?></mark>
                                                </td>
                                                <td style="width:100px"><a href="<?php echo base_url(); ?>maintenance/viewpreventive?id=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                            <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else{?>
                        <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                        
                            <div class="card-body">
                                <h4 class="card-title">Preventive Maintanence List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive slimScrollDiv"  style="height: 400px">
                                <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
                                <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
 <script src="https://www.amcharts.com/lib/3/pie.js"></script>
 <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
 
 <script>
     var chartData = JSON.parse(`<?php echo $chart_data; ?>`);
 var chart = AmCharts.makeChart( "chartdiv", {
   "type": "pie",
   "theme": "none",
   "dataProvider": chartData,
   "valueField": "count",
   "titleField": "status",
    "balloon":{
    "fixedPosition":true
   },
   "export": {
 "enabled": true
   }
 } );
 </script>
 <div id="chartdiv" style="width: 600px; height: 400px;"></div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Complaints List</h4>
                                <h6 class="card-subtitle">List of your next task to complete</h6>
                                <div class="to-do-widget m-t-20" style="height:550px;overflow-y:scroll">
                                            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                            <table class="table table-hover earning-box ">
                                        <thead>
                                            <tr>
                                                <th>Slno</th>
                                                <th>Asset Name</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                           $i=1;
                                            foreach ($inprogress as $value){?>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value->equipmentname; ?></td>
                                                <td><?php echo $value->location_name; ?>
                                                </td>
                                            </tr>
                                            <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                            </ul>                                    
                                </div>
                                                       
                            </div>
                        </div>
                    </div>
                </div>
<script>
  $(".to-do").on("click", function(){
      //console.log($(this).attr('data-value'));
      $.ajax({
          url: "Update_Todo",
          type:"POST",
          data:
          {
          'toid': $(this).attr('data-id'),         
          'tovalue': $(this).attr('data-value'),
          },
          success: function(response) {
              location.reload();
          },
          error: function(response) {
            console.error();
          }
      });
  });			
</script>                                               
<?php $this->load->view('backend/footer'); ?>