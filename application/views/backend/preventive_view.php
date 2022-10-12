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
                                                                                  
                                   
                                    </div>
                              </div>
                                
</div>
</div>
</div>

<?php $this->load->view('backend/footer'); ?>