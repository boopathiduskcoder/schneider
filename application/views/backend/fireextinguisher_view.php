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
        

             
            <form method="post" action="Add_Refilldate" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
						                <div class="col-md-6"> 
                                             
                                        <h6 class="mb-0">Extinguisher Id</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $fireextingu->ext_id; ?>
                                        </div>
             
                                        <hr>                                         
                                        <h6 class="mb-0">Location</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $fireextingu->location; ?>
                                        </div>
             
                                        <hr>    
                                        <h6 class="mb-0">Capacity</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $fireextingu->capacity; ?>
                                        </div>
                                        <hr>    
                                        <h6 class="mb-0">Cylinder No</h6>
                 
                                        <div class="col-sm-9 text-secondary">
                                        <?php echo $fireextingu->cylinder_no; ?>
                                        </div>
                                        
                                            </div>
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
</div>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Refilling Date List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Last_Refill Date</th>
                                                <th>Next_Refill Date</th>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  
</div>
</div>
</div>


<?php $this->load->view('backend/footer'); ?>