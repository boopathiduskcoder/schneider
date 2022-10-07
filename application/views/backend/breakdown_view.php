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
        

             
            <form method="post" action="Update_status" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
						                <div class="col-md-6"> 
                                             
                                        <h6 class="mb-0">Equipment name</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $breakdown->equipmentname; ?>
                                        </div>
             
                                        <hr>                                         
                                        <h6 class="mb-0">Department</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $breakdown->dep_name; ?>
                                        </div>
             
                                        <hr>    
                                        <h6 class="mb-0">Breakdown type</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $breakdown->breakdown_name; ?>
                                        </div>
                                        <hr>    
                                        <h6 class="mb-0">Technician name</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $breakdown->firstname.' '.$breakdown->lastname; ?>
                                        </div>
                                        <hr>    
                                        <h6 class="mb-0">Reported date&time</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php 
                                        $date= strtotime($breakdown->date_and_time);
                                        echo date("d-F-y, H:i:s", $date);
                                        //$today = date('d-F-Y',$date); 
                                        
                                        //$timestamp = strtotime('2-March-2011');
//$newDate = date('d-F-Y', $timestamp); 
                                        //echo $breakdown->date_and_time; ?>
                                        </div>
                                            
                                            </div>
                                            <div class="col-md-6">  
                                                                                                                
                                            <div class="form-group">
                                                <label class="control-label">Completed Date</label>
                                                <input type="text" name="date" class="form-control mydatepicker" id="recipient-name1">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Action Taken</label>
                                                <textarea class="form-control" name="action" id="message-text1" minlength="10" maxlength="1400"></textarea>
                                            </div>  
                                            <div class="form-group ">
                                                <label class="control-label">Status</label>
                                                <select class="select2 form-control custom-select" data-placeholder="Select status" name="status" style="width:100%" tabindex="1" name="technicianid">
                                                <option>Select status</option> 
                                                    <option value="Completed">Completed</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Inprogress">Inprogress</option>
                                                </select>
                                            </div>     
                                            </div>                                           
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value = "<?php echo $breakdown->id; ?>"class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
</div>
</div>
</div>



<?php $this->load->view('backend/footer'); ?>