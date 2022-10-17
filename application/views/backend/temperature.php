<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
         <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-cubes" style="color:#1976d2"></i> Temperature & Humidity</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Temperature & Humidity</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div> 
            <div class="container-fluid">         
                <div class="row">
                    <div class="col-lg-5">
                        <?php if (isset($edittemperature)) { ?>
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Edit Temperature</h4>
                            </div>
                            
                            <?php echo validation_errors(); ?>
                            <?php echo $this->upload->display_errors(); ?>
                            <?php echo $this->session->flashdata('updatesuccess'); ?>
                            

                            <div class="card-body">
                                    <form method="post" action="<?php echo base_url();?>monitoring/Update_temp" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Date</label>
                                                        <input type="text" name="date" id="date" value="<?php  echo $edittemperature->date;?>" class="form-control mydatepicker" placeholder="" minlength="3" required>
                                                        <input type="hidden" name="id" value="<?php  echo $edittemperature->id;?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Location</label>
								                          <select name="location" class="select2 form-control custom-select" style="width: 100%" required >
									                           <option value="">Select Location</option>
									                           <?php foreach($locations as $locate): ?>
                                                                <option <?php if($locate->location_name == $edittemperature->location ){ echo 'selected="selected"'; } ?> value="<?php echo $locate->location_name ?>"><?php echo $locate->location_name ?> </option
										                       <!--<option value="<?php //echo $locate->location_name?>"><?php// echo $edittemperature->location ?></option>-->
									                          <?php endforeach; ?>
								                          </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Reading</label>
                                                        <input type="number" name="reading" id="reading" value="<?php  echo $edittemperature->reading;?>" class="form-control" placeholder="" minlength="3" required>
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
                                    <form method="post" action="Save_temp" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Date</label>
                                                        <input type="text" name="date" id="firstName" value="" class="form-control mydatepicker" placeholder="" minlength="3" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Location</label>
								                          <select name="location" class="select2 form-control custom-select" style="width: 100%" required >
									                           <option value="">Select Location</option>
									                           <?php foreach($locations as $locate): ?>
										                       <option value="<?php echo $locate->location_name ?>"><?php echo $locate->location_name ?></option>
									                          <?php endforeach; ?>
								                          </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Reading</label>
                                                        <input type="number" name="reading" id="reading" value="" class="form-control" placeholder="" minlength="3" required>
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
                                <h4 class="m-b-0 text-white"> Temperature List</h4>
                            </div>
                            <?php echo $this->session->flashdata('delsuccess'); ?>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Location</th>
                                                <th>Reading</th>
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
                                            <?php foreach ($temperature as $value) { ?>
                                            <tr>
                                                <td><?php echo $value->date;?></td>
                                                <td><?php echo $value->location;?></td>
                                                <td><?php echo $value->reading;?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url();?>monitoring/edit_temp/<?php echo $value->id;?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete this data?')" href="<?php echo base_url();?>monitoring/Delete_temp/<?php echo $value->id;?>" title="Delete" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
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