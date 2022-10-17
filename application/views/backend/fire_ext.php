<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
         <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-cubes" style="color:#1976d2"></i> Fire Extinguishers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Fire Extinguishers</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div> 
            <div class="container-fluid">         
                <div class="row">
                    <div class="col-lg-5">
                        <?php if (isset($editfireext)) { ?>
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Fire</h4>
                            </div>
                            
                            <?php echo validation_errors(); ?>
                            <?php echo $this->upload->display_errors(); ?>
                            <?php echo $this->session->flashdata('updatesuccess'); ?>
                            

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
                        <?php } else { ?>                        

                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Data</h4>
                            </div>
                            
                            <?php echo validation_errors(); ?>
                            <?php echo $this->upload->display_errors(); ?>
                            <?php echo $this->session->flashdata('addsuccess'); ?>
                            

                            <div class="card-body">
                                    <form method="post" action="Save_fireext" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                        <label class="control-label">Extinguisher Id</label>
                                                        <input type="text" name="ext_id" id="ext_id" value="<?php echo $ext_id; ?>" class="form-control" placeholder="" minlength="3" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Location</label>
								                          <select name="location" class="select2 form-control custom-select" style="width: 100%" required >
									                           <option>Select Location</option>
									                           <?php foreach($locations as $locate): ?>
                                                                <option value="<?php echo $locate->location_name ?>"><?php echo $locate->location_name ?> </option
										                       <!--<option value="<?php //echo $locate->location_name?>"><?php// echo $edittemperature->location ?></option>-->
									                          <?php endforeach; ?>
								                          </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Capacity Kg./Lbs.</label>
                                                        <input type="text" name="capacity" id="capacity" value="" class="form-control" placeholder="" minlength="3" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Cyclinder No.</label>
                                                        <input type="text" name="cylinder_no" id="cylinder_no" value="" class="form-control" placeholder="" minlength="3" required>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label class="control-label">10 PM</label>
                                                        <input type="text" name="department" id="firstName" value="" class="form-control" placeholder="" minlength="3" required>
                                                    </div> -->
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

                    <div class="col-7">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Fire Extinguisher List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Extinguisher Id</th>
                                                <th>Location</th>
                                                <th>Capacity  Kg./Lbs.</th>
                                                <th>Cylinder No</th>
                                                <th>Left Days For Refilling </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>6 AM <br>(A)</th>
                                                <th>2 PM <br>(B)</th>
                                                <th>10 PM <br>(C)</th>
                                                <th>Avg <br>(A+B+C/3)</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot> -->
                                        
                                        <tbody>
                                            <?php foreach ($fireextingu as $value) { ?>
                                            <tr>
                                                <td><?php echo $value->ext_id;?></td>
                                                <td><?php echo $value->location;?></td>
                                                <td><?php echo $value->capacity;?></td>
                                                <td><?php echo $value->cylinder_no;?></td>
                                                <td><?php
                                                         $date1= $value->last_refill;
                                                         $date2 =$value->next_refill;
                                                         $date1 = strtotime($date1);
                                                         $date2 = strtotime($date2);
                                                         $datediff = $date2 - $date1;
                                                         $no_of_days =  floor($datediff / (60 * 60 * 24));
                                                         echo $no_of_days.' ' .'days left'; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url(); ?>monitoring/viewfire_exiting?id=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php $this->load->view('backend/footer'); ?>