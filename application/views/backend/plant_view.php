<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">

 <div class="message"></div>

 <div class="row page-titles">

    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-user-secret" style="color:#1976d2"></i>                      
        <?php echo $plant_data->name ?> Detailed View
    </h3>
</div>

<div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Assets</li>
    </ol>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                <h4 class="m-b-0 text-white"> Assets Details</h4>
            </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Basic Info </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Preventive Maintenance </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Breakdown</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab" style="font-size: 14px;"> Complaints</a> </li>
                </ul>
                <!-- Tab panes -->

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="m-t-30">
                                                   <?php if(!empty($plant_data->image)){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/equipments/<?php echo $plant_data->image; ?>" class="img-circle" width="150" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/no_image.png" class="img-circle" width="150" alt="                      <?php echo $plant_data->name ?>
                                                    " title="                      <?php echo $plant_data->name ?>
                                                    "/>                                   
                                                <?php } ?>
                                                <h4 class="card-title m-t-10">                      <?php echo $plant_data->name ?>
                                            </h4>
                                            <h6 class="card-subtitle">                      <?php echo $plant_data->name ?>
                                        </h6>
                                    </center>
                                </div>
                                <div>
                                    <hr> </div>
                                    <div class="card-body"> <small class="text-muted">Tag Number </small>
                                        <h6>                                            <?php echo $plant_data->tag_no ?>

                                    </h6> <small class="text-muted p-t-30 db">Model</small>
                                    <h6>                                           <?php echo $plant_data->model ?>

                                </h6> 
                                <small class="text-muted p-t-30 db">Attachment</small>
                                    <h6><?php echo $plant_data->attachment ?><a href="<?= base_url('assets/attachments/equipments/' . $plant_data->attachment); ?>"> <i class="fa fa-download" aria-hidden="true"></i> </a>
                                </h6> 
                                
                            </div>
                        </div>                                                    
                    </div>


                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Plant Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                              <?php echo $plant_data->name ?>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Tag Number</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <?php echo $plant_data->tag_no ?>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Model</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      <?php echo $plant_data->model ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      <?php echo $plant_data->type_name ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Installation date</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                  <?php echo $plant_data->installation_date ?>
              </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Parts included</h6>
          </div>
          <div class="col-sm-9 text-secondary">
              <?php echo $plant_data->parts_included ?>
          </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Warrenty</h6>
      </div>
      <div class="col-sm-9 text-secondary">
          <?php echo $plant_data->warrenty ?>
      </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-3">
      <h6 class="mb-0">Power</h6>
  </div>
  <div class="col-sm-9 text-secondary">
      <?php echo $plant_data->power ?>
  </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
      <h6 class="mb-0">Specification</h6>
  </div>
  <div class="col-sm-9 text-secondary">
      <?php echo $plant_data->specification ?>
  </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
      <h6 class="mb-0">Location</h6>
  </div>
  <div class="col-sm-9 text-secondary">
      <?php echo $plant_data->location_name ?>
  </div>
</div>
<hr>

</div>
</div>

</div>
</div>
</div>
</div>
</div>
<!--second tab-->
<div class="tab-pane" id="profile" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Maintenance List                   
                                </h4>
                            </div>
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
                                                          echo date("d-F-y", $date);;?></td>
                                                <td><?php $date= strtotime($value->next_date);
                                                          echo date("d-F-y", $date);;?>
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
                    </div>
                </div>  
        </div>
    </div>
</div>
<!--third tab-->
<div class="tab-pane" id="education" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Breakdown List                   
                                </h4>
                            </div>
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
                                                <td><?php echo $value->firstname.' '.$value->lastname;?></td>
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
                    </div>
                </div>
        </div>
    </div>
</div>

<!--fourth tab-->
<div class="tab-pane" id="experience" role="tabpanel">
    <div class="card">
        <div class="card-body">
        <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Complaints List                   
                                </h4>
                            </div>
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
                                                <td><?php echo $value->firstname.' '.$value->lastname;?></td>
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
</div>
<!-- Column -->
</div>


<?php $this->load->view('backend/footer'); ?>