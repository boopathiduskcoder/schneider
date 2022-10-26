<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
<div class="message"></div> 
 <br>
<div class="container">

    <div class="row">
        <div class="col-md-3 mb30">
            <div class="card">

                <div class="card-content pt20 pb20 profile-header">
                    <?php if(!empty($plant_data->image)){ ?>
                    <img src="<?php echo base_url(); ?>assets/images/equipments/<?php echo $plant_data->image; ?>" alt="" class="img-fluid rounded-circle">
                    <?php }else {?>
                        <img src="<?php echo base_url(); ?>assets/images/no_image.png" alt="" class="img-fluid rounded-circle">
                       <?php } ?>
                       <h4 class="card-title text-center mb20">  <?php echo $plant_data->name ?></h4>
                       
                    
                   
                    <hr>
                    <div class="row">
                                            <div class="col-md-5 mb20">
                                                <h6 class="text-small text-muted">Model</h6>
                                            </div>
                                            <div class="col-md-7 mb20">
                                                <h6> <?php echo $plant_data->model; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 mb20">
                                                <h6 class="text-small text-muted">Tag No</h6>
                                            </div>
                                            <div class="col-md-7 mb20">
                                                <h6> <?php echo $plant_data->tag_no; ?></h6>
                                            </div>
                                        </div>
                                        <?php if(empty($plant_data->attachment)){ ?>
                                    <?php } else{ ?>
                                        <div class="row">
                                            <div class="col-md-5 mb20">
                                                <h6 class="text-small text-muted">Attachment</h6>
                                            </div>
                                            <div class="col-md-7 mb20">
                                            <h6><?php echo $plant_data->attachment ?><a href="<?= base_url('assets/attachments/equipments/' . $plant_data->attachment); ?>"> <i class="fa fa-download" aria-hidden="true"></i> </a> </h6>
                                            </div>
                                        </div>
                                        <?php } ?>
                                           
                    <hr>
                    
                </div>
                <!--content-->

            </div>
        </div>
        <div class="col-md-9 mb30">
            <div class="card">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav tabs-admin" role="tablist">
                        <li role="presentation" class="nav-item"><a class="nav-link active" href="#home" aria-controls="home" role="tab" data-toggle="tab">Basic Info</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link " href="#maintenance" aria-controls="maintenance" role="tab" data-toggle="tab">Preventive Maintenance</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link " href="#breakdown" aria-controls="breakdown" role="tab" data-toggle="tab">Breakdown</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link " href="#complaints" aria-controls="complaints" role="tab" data-toggle="tab">Complaints</a></li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content admin-tab-content pt30">
                        <div role="tabpanel" class="tab-pane active show" id="home">
                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Plant Name</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6> <?php echo $plant_data->name; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Tag Number</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6> <?php echo $plant_data->tag_no; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Model</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->model; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Type</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->type_name; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Installation Date</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php $date= strtotime($plant_data->installation_date);
                                                          echo date("d-F-y", $date);?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Parts Included</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->parts_included; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Warrenty</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->warrenty; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Power</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->power; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Specification</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->specification; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb20">
                                                <h6 class="text-small text-muted">Location</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $plant_data->location_name; ?></h6>
                                            </div>
                                        </div>
                                        
                                    
                    <hr>
                    

                        </div>
                        <div role="tabpanel" class="tab-pane" id="maintenance">
                        <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Location</th>
                                                <th>Service</th>
                                                <th>Last Date </th>
                                                <th>Next Date </th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Location</th>
                                                <th>Service</th>
                                                <th>Last Date </th>
                                                <th>Next Date </th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($preventive as $value) { ?>
                                            <tr>
                                                <td><?php $aid =  $value->equipment_id;
                                                          $adata = $this->db->get_where('equipments',array('id '=>$aid))->row();
                                                          echo  $adata->name; ?>
                                                </td>
                                                <td><?php $lid =  $value->location_id;
                                                          $ldata = $this->db->get_where('location',array('id '=>$lid))->row();
                                                          echo  $ldata->location_name; ?></td>
                                                <td><?php $sid =  $value->interval_id;
                                                          $sdata = $this->db->get_where('service_interval',array('id '=>$sid))->row();
                                                          echo  $sdata->name; ?></td>
                                                <td><?php $date= strtotime($value->last_date);
                                                          echo date("d-F-y", $date);?></td>
                                                <td><?php $date= strtotime($value->next_date);
                                                          echo date("d-F-y", $date);?>
                                                <br><span class="badge badge-success">
                                                     <?php
                                                         $date1= $value->next_date;
                                                         $date2 =$value->last_date;
                                                         $date1 = strtotime($date1);
                                                         $date2 = strtotime($date2);
                                                         $datediff = $date1 - $date2;
                                                         $no_of_days =  floor($datediff / (60 * 60 * 24));
                                                         echo $no_of_days.' ' .'days left'; ?></span></td>
                                                <td><?php echo $value->status;?></td>

                                            </tr>
                                            <?php }?>
                                            <!--<tr>
                                              <td> Asset 10</td>
                                              <td> Hall A</td>
                                              <td>July 3, 2022</td>
                                              <td>December 3, 2022 <br><span class="badge badge-success">112 days left</span></td>
                                              <td>Completed</td>
                                              <td>
                                              <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                          </td>
                                          <tr>
                                              <td> Asset 10</td>
                                              <td> Hall A</td>
                                              <td>July 3, 2022</td>
                                              <td>December 3, 2022 <br><span class="badge badge-success">112 days left</span></td>
                                              <td>Completed</td>
                                              <td>
                                              <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                          </td>
                                          </tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="breakdown">
                        <div class="card-body">
                                <div class="table-responsive ">
                                <table id="example12" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown</th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown </th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                                
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($breakdowns as $value) {
                                           ?>
                                            <tr>
                                                <td><?php echo $value->equipmentname;?></td>
                                                <td><?php echo $value->dep_name;?></td>
                                                <td><?php echo $value->breakdown_name;?></td>
                                                <td><?php echo $value->first_name.' '.$value->last_name;?></td>
                                                <td><?php $date= strtotime($value->date_and_time);
                                                          echo date("d-F-y, H:i:s", $date);?></td>
                                                <td><?php echo $value->details;?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="complaints">
                        <div class="card-body">
                                <div class="table-responsive ">
                                <table id="example13" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown</th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                        
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown </th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                        
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($complaints as $value) {
                                           ?>
                                            <tr>
                                                <td><?php echo $value->equipmentname;?></td>
                                                <td><?php echo $value->dep_name;?></td>
                                                <td><?php echo $value->breakdown_name;?></td>
                                                <td><?php echo $value->first_name.' '.$value->last_name;?></td>
                                                <td><?php $date= strtotime($value->date_and_time);
                                                          echo date("d-F-y, H:i:s", $date);?></td>
                                                <td><?php echo $value->details;?></td>
                                            </tr>
                                            <?php }?>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
   
body{
    background:#e7ebf2;    
}
/*
Profile
*/
.si-border-round {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
}

.social-icon-sm {
    margin: 0 5px 5px 0;
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 30px !important;
    color: #555;
    text-shadow: none;
    border-radius: 3px;
    overflow: hidden;
    display: block;
    float: left;
    text-align: center;
    border: 1px solid #AAA;
}
.tabs-admin > .nav-item > .nav-link.active {
    border-color: #0073ff;
    color: #0073ff;
}

.tabs-admin > .nav-item > .nav-link {
    padding: 10px 15px;
    color: #555;
    font-weight: 600;
    text-transform: capitalize;
    margin-bottom: -2px;
    border-bottom: 2px solid transparent;
}
.act-content span.text-small {
    display: block;
    color: #999;
    margin-bottom: 10px;
    font-size: 12px;
}

.text-small {
    font-size: 12px !important;
}
.admin-tab-content {
    padding: 10px 15px;
}

.pt30 {
    padding-top: 30px !important;
}
.card .card-title {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 28px;
    margin: 0;
    font-size: .9rem;
    font-weight: 600;
    line-height: 28px;
}

.mb20 {
    margin-bottom: 20px !important;
}
.pb20 {
    padding-bottom: 20px !important;
}

.pt20 {
    padding-top: 20px !important;
}
.text-small {
    font-size: 12px !important;
}

.text-muted {
    color: #999 !important;
}
.card .card-content {
    padding: 15px 15px;
}
.profile-header {
  background-size: cover;
  position: relative;
  overflow: hidden; }
  .profile-header .img-fluid.rounded-circle {
    max-width: 160px;
    margin: 0 auto;
    margin-bottom: 20px;
    display: block;
    height:150px;
 }

.activity-list > li {
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
  margin-bottom: 20px; }

.activity-list .float-left {
  margin-right: 10px;
  width: 40px;
  height: 40px;
  float: left;
  display: block;
  border-radius: 50%;
  background-color: #eee;
  font-size: 20px;
  line-height: 100%;
  line-height: 43px;
  text-align: center; }
  .activity-list .float-left a {
    display: inline-block;
    color: #999; }

.act-content {
  overflow: hidden; }
  .act-content span.text-small {
    display: block;
    color: #999;
    margin-bottom: 10px;
    font-size: 12px; }
</style>

<?php $this->load->view('backend/footer'); ?>