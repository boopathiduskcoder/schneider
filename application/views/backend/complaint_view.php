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
                <h4 class="m-b-0 text-white"> Add Data</h4>
            </div>
        

             
            <form method="post" action="Update_status" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
						                <div class="col-md-6"> 
                                             

                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Reported By</label>
                                                <input type="text" name="reported_by" class="form-control" id="reported_by" >
                                            </div>  
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Attended By</label>
                                                <input type="text" name="attended_by" class="form-control" id="attended_by" >
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Accepted By</label>
                                                <input type="text" name="accepted_by" class="form-control" id="accepted_by" >
                                            </div>
                                            </div>
                                            <div class="col-md-6">  
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">If any Pending</label>
                                                <textarea class="form-control" name="pending" id="message-text1" minlength="10" maxlength="1400"></textarea>
                                            </div>                                                               
                                            
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Service report No. & Date(if any service or work done by external agencies)</label>
                                                <textarea class="form-control" name="service_report" id="message-text1" minlength="10" maxlength="1400"></textarea>
                                            </div> 
                                            </div>                                           
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value = "<?php //echo $breakdown->id; ?>"class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
</div>
</div>
</div>



<?php $this->load->view('backend/footer'); ?>