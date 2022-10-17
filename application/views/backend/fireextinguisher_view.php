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
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Refilling</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Service</a> </li>
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
                                                 
                                                    <img src="<?php echo base_url(); ?>assets/images/users/fireext.jpg" class="img-circle" width="150" alt="                      <?php echo $fireextingu->ext_id ?>
                                                    " title="                      <?php echo $fireextingu->ext_id ?>
                                                    "/>                                   
                                               
                                                <h4 class="card-title m-t-10">                      <?php echo $fireextingu->ext_id ?>
                                            </h4>
                                            
                                    </center>
                                </div>
                                <div>
                                    <hr> </div>
                                    <div class="card-body"> <small class="text-muted">Extinguisher Id </small>
                                        <h6>                                            <?php echo $fireextingu->ext_id ?>

                                    </h6> <small class="text-muted p-t-30 db">Location</small>
                                    <h6>                                           <?php echo $fireextingu->location ?>
                                    </h6><small class="text-muted p-t-30 db">Capacity</small>
                                    <h6>                                           <?php echo $fireextingu->capacity ?>

                                    </h6> <small class="text-muted p-t-30 db">Cylinder No</small>
                                    <h6>                                           <?php echo $fireextingu->cylinder_no ?>
                                    </h6>
                               
                            </div>
                        </div>                                                    
                    </div>


                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                       
                        <?php if (isset($editfireext)) { ?>
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Fire Extinguisher</h4>
                            </div>
                            
                            <div class="card-body">
                                    <form method="post" action="<?php echo base_url();?>monitoring/Update_fireext" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Extinguisher Id</label>
                                                        <input type="text" name="ext_id" id="ext_id" value="<?php  echo $editfireext->ext_id;?>" class="form-control" placeholder="" minlength="3" required>
                                                        <input type="hidden" name="id" value="<?php  echo $editfireext->id;?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Location</label>
								                          <select name="location" class="select2 form-control custom-select" style="width: 100%" required >
									                           <option>Select Location</option>
									                           <?php foreach($locations as $locate): ?>
                                                                <option <?php if($locate->location_name == $editfireext->location ){ echo 'selected="selected"'; } ?> value="<?php echo $locate->location_name ?>"><?php echo $locate->location_name ?> </option
										                       <!--<option value="<?php //echo $locate->location_name?>"><?php// echo $edittemperature->location ?></option>-->
									                          <?php endforeach; ?>
								                          </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Capacity Kg./Lbs.</label>
                                                        <input type="text" name="capacity" id="capacity" value="<?php  echo $editfireext->capacity;?>" class="form-control" placeholder="" minlength="3" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Cyclinder No.</label>
                                                        <input type="text" name="cylinder_no" id="cylinder_no" value="<?php  echo $editfireext->cylinder_no;?>" class="form-control" placeholder="" minlength="3" required>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Save</button>
                                            <button type="button" class="btn btn-info">Cancel</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <?php }?>
                                                         
</div>
</div>

</div>
</div>
</div>
</div>
</div>
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
                                    
                                           
                                            <div class="form-inline">
                                                
                                           <input type="text" name="last_refill" placeholder="Last Refill" class="form-control mydatepicker" required>
                                          <input type="text" name="next_refill" placeholder="Next Refill" class="form-control mydatepicker" required>
                                          <input type="hidden" name="id" value = "<?php echo $fireextingu->id; ?>"class="form-control" id="recipient-name1">                                       

                                          <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                                                                      
                                    </div>
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
                                                <th>Left Days For Refilling</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Last_Refill Date</th>
                                                <th>Next_Refill Date</th>
                                                <th>Left Days For Refilling</th>
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
                                                <td><?php
                                                         $date1= $value->last_refill;
                                                         $date2 =$value->next_refill;
                                                         $date1 = strtotime($date1);
                                                         $date2 = strtotime($date2);
                                                         $datediff = $date2 - $date1;
                                                         $no_of_days =  floor($datediff / (60 * 60 * 24));
                                                         echo $no_of_days.' ' .'days left'; ?></td>
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
                                <h4 class="m-b-0 text-white"> Add Data                   
                                </h4>
                            </div>
                            <form method="post" action="Add_Servicedate" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="form-inline">
                                                
                                                <input type="text" name="last_service" placeholder="Last Service" class="form-control mydatepicker" required>
                                               <input type="text" name="next_service" placeholder="Next Service" class="form-control mydatepicker" required>
                                               <input type="text" name="remarks"  placeholder="Remarks" class="form-control" id="recipient-name1" required> 
                                               <input type="hidden" name="id" value = "<?php echo $fireextingu->id; ?>"class="form-control" id="recipient-name1">                                       
     
                                               <button type="submit" class="btn btn-info">Submit</button>
                                                 </div>                               
                                    </div>
                                    </div>
                                    </form>
                            <div class="card-body">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Service List                  
                                </h4>
                            </div>
                                <div class="table-responsive ">
                                    <table id="example13" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Last_Service Date</th>
                                                <th>Next_Service Date</th>
                                                <th>Remarks/SR.NO</th>
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Last_Service Date</th>
                                                <th>Next_Service Date</th>
                                                <th>Remarks/SR.NO</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php  
                                            $i=1;
                                            foreach ($service as $value) { ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $value->last_service;?></td>
                                                <td><?php echo $value->next_service;?></td>
                                                <td><?php echo $value->remarks; ?></td>
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


</div>
</div>
</div>
<!-- Column -->
</div>


<?php $this->load->view('backend/footer'); ?>
<style>
    .name_wrapper {
  display: flex;
  margin: 10px 0;
}


input {
  padding: 8px;
  border-radius: 12px;
  margin: 10px;
  border:none;
  border: 1px solid black;
}

</style>