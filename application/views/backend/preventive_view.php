<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">

 <div class="message"></div>

 <div class="row page-titles">

    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-user-secret" style="color:#1976d2"></i>                      
        Detailed View
    </h3>
</div>


</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                <h4 class="m-b-0 text-white"> Show Details</h4>
            </div>
                                <div class="modal-body">
                                    <div class="row">
						                <div class="col-md-6"> 
                                             
                                        <h6 class="mb-0">Equipment Name</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $preventive->equipmentname; ?>
                                        </div>
             
                                        <hr>                                         
                                        <h6 class="mb-0">Location</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $preventive->location; ?>
                                        </div>
             
                                        <hr>    
                                        <h6 class="mb-0">Service Interval</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $preventive->servicename; ?>
                                        </div>
                                        <hr>
                                        </div>
                                        <div class="col-md-6">
                                        <h6 class="mb-0">Last Date</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $preventive->last_date; ?>
                                        </div>
                                      
                                        <hr>                                         
                                        <h6 class="mb-0">Next Date</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $preventive->next_date; ?>
                                        </div>
             
                                        <hr>    
                                        <h6 class="mb-0">Status</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $preventive->status; ?>
                                        </div>
                                        <hr> 
                                
                                        <button type="button" class="btn btn-info"><i class="fa fa-user"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Assign To </a></button>

                                    </div>
                               
                              </div>
                                
</div>
</div>
</div>
<!-- sample modal content -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Complaints</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_preventivecomplaint" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
						                <div class="col-md-6">                               
                                             <div class="form-group">
                                                <label class="control-label">Department</label>
                                                <select class="select2 form-control custom-select" data-placeholder="Select Department" style="width:100%" tabindex="1" name="departmentid">
                                                <option>Select Department</option>
                                                <?php foreach($departments as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->dep_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-label">Type of Breakdown</label>
                                                <select class="select2 form-control custom-select" data-placeholder="Select Breakdown" style="width:100%" tabindex="1" name="breakdownid">
                                                <option>Select Breakdown</option> 
                                                <?php foreach($breakdowntypes as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div> 
                                            <div class="form-group ">
                                                <label class="control-label">Assigned To</label>
                                                <select class="select2 form-control custom-select" data-placeholder="Select Breakdown" style="width:100%" tabindex="1" name="technicianid">
                                                <option>Select Technician</option> 
                                                <?php foreach($technicians as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->first_name.' '.$value->last_name; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>       
                                            </div>
                                            <div class="col-md-6">  
                                                                                                               
                                            <div class="form-group">
                                                <label class="control-label">Reported Date & Time</label>
                                                <input type="text" name="dateandtime" class="form-control" id="datetimepicker1" id="recipient-name1">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Details</label>
                                                <textarea class="form-control" name="details" id="message-text1" minlength="10" maxlength="1400"></textarea>
                                            </div>  
                                            </div>                                           
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" class="form-control" id="recipient-name1"> 
                                        <input type="hidden" name="eid" class="form-control" value="<?php echo $preventive->eid; ?>"id="recipient-name1">                                          
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<?php $this->load->view('backend/footer'); ?>