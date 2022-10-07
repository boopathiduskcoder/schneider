<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Breakdown</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Breakdown</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                        
                        <?php } else { ?>                        
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Create </a></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Breakdown List                   
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown</th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                                <th>Action </th>
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
                                                <th>Action </th>
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
                                                <td class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light breakdown" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="delete_breakdown?id=<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this data?')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                                    <a href="<?php echo base_url(); ?>maintenance/viewbreakdown?id=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-eye"></i></a>

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
            </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Breakdown</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_breakdown" id="btnSubmit" enctype="multipart/form-data">
                                    <div class="modal-body">
                                    <div class="row">
						                <div class="col-md-6"> 
                                             <div class="form-group">
                                                <label class="control-label">Equipment List</label>
                                                <select class="select2 form-control custom-select" style="width: 100%" data-placeholder="Select Equipment" tabindex="1" name="equipmentid">
                                                <option>Select Equipment</option> 
                                                <?php foreach($equipments as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>                                          
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
                                            
                                            </div>
                                            <div class="col-md-6">  
                                            <div class="form-group ">
                                                <label class="control-label">Assigned To</label>
                                                <select class="select2 form-control custom-select" data-placeholder="Select Breakdown" style="width:100%" tabindex="1" name="technicianid">
                                                <option>Select Technician</option> 
                                                <?php foreach($technicians as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->firstname.' '.$value->lastname; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>                                                                          
                                            <div class="form-group">
                                                <label class="control-label">Reported Date & Time</label>
                                                <input type="text" name="dateandtime" class="form-control" id="datetimepicker1" >
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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">

	$(document).ready(function () {
		$(".breakdown").click(function (e) {
			e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#btnSubmit').trigger("reset");
$('#exampleModal').modal('show');
$.ajax({
	url: 'Editbreakdown?id=' + iid,
	method: 'GET',
	data: '',
	dataType: 'json',
}).done(function (response) {
	console.log(response);
// Populate the form fields with the data returned from server
$('#btnSubmit').find('[name="id"]').val(response.breakbyid.id).end();
$('#btnSubmit').find('[name="equipmentid"]').val(response.breakbyid.equipment_id).end();
$('#btnSubmit').find('[name="departmentid"]').val(response.breakbyid.department_id).end();
$('#btnSubmit').find('[name="breakdownid"]').val(response.breakbyid.breakdown_id).end();
$('#btnSubmit').find('[name="technicianid"]').val(response.breakbyid.technician_id).end();
$('#btnSubmit').find('[name="dateandtime"]').val(response.breakbyid.date_and_time).end();  
$('#btnSubmit').find('[name="details"]').val(response.breakbyid.details).end();  
                           
});
});
	});


</script>     
    <?php $this->load->view('backend/footer'); ?>        