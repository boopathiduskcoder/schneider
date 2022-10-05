<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-user-secret" aria-hidden="true"></i> Technician</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Technician</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                    <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#technicianmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Technician </a></button>
                       <!--  <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>employee/Disciplinary" class="text-white"><i class="" aria-hidden="true"></i>  Disciplinary List</a></button> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Technician List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th> 
                                                <th>Email </th>
                                                <th>Contact </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                               <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th> 
                                                <th>Email </th>
                                                <th>Contact </th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($technicians as $value): ?>
                                            <tr>
                                                <td><?php echo $value->firstname;?></td>
                                                <td><?php echo $value->lastname;?></td>
                                                <td><?php echo $value->email; ?></td> 
                                                <td><?php echo $value->contact; ?></td>
                                                <td><?php echo $value->status; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light technicians" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="deletetechnicians?id=<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this technician?')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                                    <a href="#" title="changepassword" class="btn btn-sm btn-success waves-effect waves-light changepassword" data-id="<?php echo $value->id ?>"><i class="fa fa-key" aria-hidden="true"></i></a>
                                                   <!-- <a href="<?php echo base_url(); ?>equipment/ViewPlants?equipment_id=<?php echo base64_encode($value->id); ?>" title="Change Password" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-key" aria-hidden="true"></i></a>-->
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sample modal content -->
<div class="modal fade" id="technicianmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Add Technician </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<form method="post" action="Add_Technicians" id="btnSubmit" enctype="multipart/form-data">
				<div class="modal-body">
                   <div class="row">
						<div class="col-md-6">  
							<div class="form-group">
								<label class="control-label">First Name</label>
								<input type="text" name="firstname" value="" class="form-control" id="recipient-name1" required autocomplete="off">
							</div>
							<div class="form-group">
								<label class="control-label">Last Name</label>
								<input type="text" name="lastname" value="" class="form-control"  autocomplete="off">
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="email" name="email" value="" class="form-control"  autocomplete="off">
							</div>
                        </div>
                    
                        <div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" name="password" value="" class="form-control"  autocomplete="off">
							</div> 
							<div class="form-group">
								<label class="control-label">Contact</label>
								<input type="text" name="contact" value="" class="form-control"  autocomplete="off">
							</div>  
                            <div class="form-group">
								<label class="control-label">Status</label>
								<select name="status" class="select2 form-control custom-select" style="width: 100%" required>
									<option>Select</option>
									<option value="active">Active</option>
									<option value="in-active">In-active</option>
								</select>
							</div> 
                         </div>
                     </div>    
</div>
<div class="modal-footer">
	<input type="hidden" name="aid" value="">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2">
	<div class="modal-dialog lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel2">Change Password </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>

			<form method="post" action="ChangePassword" id="btnSub" enctype="multipart/form-data">
				<div class="modal-body">
                    
							<div class="form-group">
								<label class="control-label">New Password</label>
								<input type="password" name="password" value="" class="form-control" id="recipient-name1" required autocomplete="off">
							</div>
							<div class="form-group">
								<label class="control-label">Confirm Password</label>
								<input type="password" name="confirmpassword" value="" class="form-control"  autocomplete="off">
							</div>
                        
                     </div>    
<div class="modal-footer">
	<input type="hidden" name="aid" value="">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$(".technicians").click(function (e) {
			e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#btnSubmit').trigger("reset");
$('#technicianmodel').modal('show');
$.ajax({
	url: 'EditTechnician?id=' + iid,
	method: 'GET',
	data: '',
	dataType: 'json',
}).done(function (response) {
	console.log(response);
// Populate the form fields with the data returned from server
$('#btnSubmit').find('[name="aid"]').val(response.technicianbyid.id).end();
$('#btnSubmit').find('[name="firstname"]').val(response.technicianbyid.firstname).end();
$('#btnSubmit').find('[name="lastname"]').val(response.technicianbyid.lastname).end();
$('#btnSubmit').find('[name="email"]').val(response.technicianbyid.email).end();
$('#btnSubmit').find('[name="password"]').val(response.technicianbyid.password).end();
$('#btnSubmit').find('[name="contact"]').val(response.technicianbyid.contact).end();  
$('#btnSubmit').find('[name="status"]').val(response.technicianbyid.status).end();  
                           
});
});
	});

	function testInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#recipient-name1').bind('keypress', testInput);
</script> 
<script type="text/javascript">
	$(document).ready(function () {
		$(".changepassword").click(function (e) {
			e.preventDefault(e);
           
// Get the record's ID via attribute  
var id = $(this).attr('data-id');
$('#btnSub').trigger("reset");
$('#changepassword').modal('show');

$.ajax({
	url: 'ChangePassword?id=' + id,
	method: 'GET',
	data: '',
	dataType: 'json',
}).done(function (response) {
	console.log(response);
    $('#btnSub').find('[name="aid"]').val(response.technicianbyid.id).end();
$('#btnSub').find('[name="firstname"]').val(response.technicianbyid.firstname).end();
$('#btnSub').find('[name="lastname"]').val(response.technicianbyid.lastname).end();
$('#btnSub').find('[name="email"]').val(response.technicianbyid.email).end();
$('#btnSub').find('[name="password"]').val(response.technicianbyid.password).end();
$('#btnSub').find('[name="contact"]').val(response.technicianbyid.contact).end();  
$('#btnSub').find('[name="status"]').val(response.technicianbyid.status).end();  
                           
});
});
	});
    </script>                  
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#employees123').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>