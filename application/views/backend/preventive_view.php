<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
<div class="message"></div> 
 <br>
<div class="container">

    <div class="row">
        <div class="col-md-4 mb30">
            <div class="card">

                <div class="card-content pt20 pb20 profile-header">
                    <?php if(!empty($preventive->image)){ ?>
                    <img src="<?php echo base_url(); ?>assets/images/equipments/<?php echo $preventive->image; ?>" alt="" class="img-fluid rounded-circle">
                    <?php }else {?>
                        <img src="<?php echo base_url(); ?>assets/images/equipments/no-image.png" alt="" class="img-fluid rounded-circle">
                       <?php } ?>
                    <h6 class="card-title text-center mb20">MODEL: <?php echo $preventive->model ?></h6>
                    <h4 class="card-title text-center mb20">TAG NO:  <?php echo $preventive->tag_no ?></h4>
                    
                    <hr>
                    <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Equipment name</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6> <?php echo $preventive->equipmentname; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Location</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6> <?php echo $preventive->locations; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Manufacture</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $preventive->manufacturer; ?></h6>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted"> type</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $preventive->type; ?></h6>
                                            </div>
                                        </div>
                                        
                                       

                    <hr>
                    
              
                </div>
                <!--content-->

            </div>
        </div>
        <div class="col-md-8 mb30">
            <div class="card">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav tabs-admin" role="tablist">
                        <li role="presentation" class="nav-item"><a class="nav-link active" href="#t1" aria-controls="t1" role="tab" data-toggle="tab">Basic Info</a></li>
                        <!--<li role="presentation" class="nav-item"><a class="nav-link " href="#t4" aria-controls="t4" role="tab" data-toggle="tab">Preventive</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content admin-tab-content pt30">
                        <div role="tabpanel" class="tab-pane active show" id="t1">
                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Equipment name</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6> <?php echo $preventive->equipmentname; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Location</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6> <?php echo $preventive->location; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Service Interval</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $preventive->servicename; ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Last Date</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php 
                                        $date= strtotime($preventive->last_date);
                                        echo date("d-F-y", $date); ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Next Date</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php 
                                        $date= strtotime($preventive->next_date);
                                        echo date("d-F-y", $date); ?>
                                        </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb20">
                                                <h6 class="text-small text-muted">Status</h6>
                                            </div>
                                            <div class="col-md-6 mb20">
                                                <h6><?php echo $preventive->status; ?></h6>
                                            </div>
                                        </div>
                             

                    <hr>
                    <button type="button" class="btn btn-info"><i class="fa fa-user"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Assign To </a></button>

                    
                </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="t4">
                        </div>
                    </div>

                </div>
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
<style>
   
body{
    background:#e7ebf2;    
}
/*
Profile
*/
.si-border-round {
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
}

.social-icon-sm {
    margin: 0 5px 5px 0;
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 30px !important;
    color: #555;
    text-shadow: none;
    border-radius: 3px;
    overflow: hidden;
    display: block;
    float: left;
    text-align: center;
    border: 1px solid #AAA;
}
.tabs-admin > .nav-item > .nav-link.active {
    border-color: #0073ff;
    color: #0073ff;
}

.tabs-admin > .nav-item > .nav-link {
    padding: 10px 15px;
    color: #555;
    font-weight: 600;
    text-transform: capitalize;
    margin-bottom: -2px;
    border-bottom: 2px solid transparent;
}
.act-content span.text-small {
    display: block;
    color: #999;
    margin-bottom: 10px;
    font-size: 12px;
}

.text-small {
    font-size: 12px !important;
}
.admin-tab-content {
    padding: 10px 15px;
}

.pt30 {
    padding-top: 30px !important;
}
.card .card-title {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 28px;
    margin: 0;
    font-size: .9rem;
    font-weight: 600;
    line-height: 28px;
}

.mb20 {
    margin-bottom: 20px !important;
}
.pb20 {
    padding-bottom: 20px !important;
}

.pt20 {
    padding-top: 20px !important;
}
.text-small {
    font-size: 12px !important;
}

.text-muted {
    color: #999 !important;
}
.card .card-content {
    padding: 15px 15px;
}
.profile-header {
  background-size: cover;
  position: relative;
  overflow: hidden; }
  .profile-header .img-fluid.rounded-circle {
    max-width: 160px;
    margin: 0 auto;
    margin-bottom: 20px;
    display: block;
    height:150px;
 }

.activity-list > li {
  border-bottom: 1px solid #eee;
  padding-bottom: 20px;
  margin-bottom: 20px; }

.activity-list .float-left {
  margin-right: 10px;
  width: 40px;
  height: 40px;
  float: left;
  display: block;
  border-radius: 50%;
  background-color: #eee;
  font-size: 20px;
  line-height: 100%;
  line-height: 43px;
  text-align: center; }
  .activity-list .float-left a {
    display: inline-block;
    color: #999; }

.act-content {
  overflow: hidden; }
  .act-content span.text-small {
    display: block;
    color: #999;
    margin-bottom: 10px;
    font-size: 12px; }
</style>

<?php $this->load->view('backend/footer'); ?>