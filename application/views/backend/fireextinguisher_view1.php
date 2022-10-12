<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">

 <div class="message"></div>

 <div class="row page-titles">

    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-user-secret" style="color:#1976d2"></i>                      
        <?php echo $fireextingu->ext_id ?> Detailed View
    </h3>
</div>

<div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Fire Extinguishers</li>
    </ol>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                <h4 class="m-b-0 text-white"> Fire Extinguishers Details</h4>
            </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Basic Info </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Refilling Info</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Service Info</a> </li>
                </ul>
                <!-- Tab panes -->

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                               
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Extinguisher Id</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $fireextingu->ext_id ?>
                                                    </div>
                                               </div>
                                               <hr>
                                               <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Location</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $fireextingu->location ?>
                                                    </div>
                                               </div>
                                               <hr>
                                               <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Capacity</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $fireextingu->capacity ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Cylinder No</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?php echo $fireextingu->cylinder_no ?>
                                                    </div>
                                                </div>
                                                <hr>
                         
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
                                <h4 class="m-b-0 text-white"> Add Data                   
                                </h4>
                            </div>
                            <form method="post" action="Add_Refilldate" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
						              
                                            <div class="col-md-6">  
                                                                                                                
                                            <div class="form-group">
                                                <label class="control-label">Last_Refill Date</label>
                                                <input type="text" name="last_refill" class="form-control mydatepicker" id="recipient-name1" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Next_Refill Date</label>
                                                <input type="text" name="next_refill" class="form-control mydatepicker" id="recipient-name1" required>
                                            </div> 
                                            
                                            </div>                                           
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value = "<?php echo $fireextingu->id; ?>"class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                            <div class="card-body">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Refilling List                  
                                </h4>
                            </div>
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Last_Refill Date</th>
                                                <th>Next_Refill Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Last_Refill Date</th>
                                                <th>Next_Refill Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  
                                            $i=1;
                                            foreach ($refilling as $value) { ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $value->last_refill;?></td>
                                                <td><?php echo $value->next_refill;?></td>
                                            </tr>
                                            <?php 
                                            $i++;
                                        }?>
                                            
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