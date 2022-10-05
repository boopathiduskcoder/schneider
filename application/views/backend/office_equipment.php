<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">
	<div class="message"></div>
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor"><i class="fa fa-cart-plus"></i> Office Equipment</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Assets List</li>
			</ol>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row m-b-10"> 
			<div class="col-12">
				<button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#assetsmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Office Equipment </a></button>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card card-outline-info">
					<div class="card-header">
						<h4 class="m-b-0 text-white"> Office Equipment List</h4>
					</div>

					<div class="card-body">
						<div class="table-responsive ">
							<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
<tr><!--
<th>ID</th>
<th>Type </th>-->
<th>Location</th>
<th>Equipment Name </th>
<th>Tag No </th>
<th>Model</th>
<th>Installation Date </th>
<th>Manufacturer </th>
<th>Status </th>
<th>Action </th>
</tr>
</thead>
<tfoot>
	<tr>
<!--                                                <th>ID</th>
	<th>Type </th>-->
	<th>Location</th>
	<th>Equipment Name </th>
	<th>Tag No </th>
	<th>Model</th>
	<th>Installation Date </th>
	<th>Manufacturer </th>
	<th>Status </th>
	<th>Action </th>
</tr>
</tfoot>
<tbody>
	<?php foreach($assets as $value): ?>
		<tr>
		<td><?php echo $value->location_name; ?></td>
		<td><?php echo $value->name; ?></td>
		<td><?php echo $value->tag_no; ?></td>
		<td><?php echo $value->model; ?></td>
		<td><?php echo convertDateFormat($value->installation_date,DISPLAY_DATE_FORMAT); ?></td>
		<td><?php echo $value->manufacturer; ?></td>
		<td><?php echo ucfirst($value->status); ?></td>
		<td class="jsgrid-align-center ">
			<a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light assets" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
		<!-- 	<a href="#" title="View" class="btn btn-sm btn-info waves-effect waves-light assets" data-id="<?php echo $value->id ?>"><i class="fa fa-eye"></i></a> -->
			<a href="<?php echo base_url(); ?>equipment/ViewPlants?equipment_id=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
			
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
<div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Add Asset </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form method="post" action="Add_Assets" id="btnSubmit" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">      
							<div class="form-group">
								<label class="control-label">Equipment Name</label>
								<input type="text" name="name" value="" class="form-control" id="recipient-name1" required>
							</div>
							<div class="form-group">
								<label class="control-label">Asset Type </label>
								<select name="type" class="select2 form-control custom-select" style="width: 100%" required>
									<option>Select Type</option>
									<?php foreach($catvalue as $value): ?>
										<option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Asset Tag No</label>
								<input type="text" name="tag_no" value="<?php echo $tag_no;?>" class="form-control" id="recipient-name1">
							</div>
							<div class="form-group">
								<label class="control-label">Model</label>
								<input type="text" name="model" value="" class="form-control" id="recipient-name1">
							</div>
							<div class="form-group">
								<label class="control-label">Type</label>
								<input type="text" name="type1" value="" class="form-control"  autocomplete="off">
							</div>
							<div class="form-group">
								<label class="control-label">Installation Date</label>
								<input type="text" name="installation_date" value="" class="form-control mydatepicker" id="recipient-name1">
							</div>
							<div class="form-group">
								<label class="control-label">Manufacturer</label>
								<input type="text" name="manufacturer" value="" class="form-control" id="recipient-name1 ">
							</div> 
							<div class="form-group">
								<label class="control-label">Serial No</label>
								<input type="text" name="slno" value="" class="form-control"  autocomplete="off">
							</div>   
							<div class="form-group">
								<label class="control-label">Add Parts (,)</label>
								<input type="text" name="parts_included" value="" class="form-control" id="recipient-name1 ">
							</div>                                                  
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Location</label>
								<select name="location" class="select2 form-control custom-select" style="width: 100%" required >
									<option>Select Location</option>
									<?php foreach($locations as $locate): ?>
										<option value="<?php echo $locate->id ?>"><?php echo $locate->location_name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							
							<div class="form-group">
								<label class="control-label">Warrenty</label>
								<input type="text" name="warrenty" value="" class="form-control" id="recipient-name1">
							</div>
							<div class="form-group">
								<label class="control-label">Power suply</label>
								<input type="text" name="power" value="" class="form-control" id="recipient-name1">
							</div>
							<div class="form-group">
								<label class="control-label">Status</label>
								<select name="status" class="select2 form-control custom-select" style="width: 100%" required>
									<option>Select</option>
									<option value="active">Active</option>
									<option value="in-active">In-active</option>
								</select>
							</div> 
							<div class="form-group">
								<label class="control-label">Specification</label>
								<textarea class="form-control" name="specification" id="message-text1" required minlength="14" rows="6"></textarea>
							</div>  
							<div class="form-group">
								<label class="control-label">Image</label>
								<input type="file" name="image" value="" class="form-control" id="recipient-name1">
							</div>
                            <div class="form-group">
								<label class="control-label">Attachments</label>
								<input type="file" name="attachments" value="" class="form-control" id="attachments">
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
<script type="text/javascript">
	$(document).ready(function () {
		$(".assets").click(function (e) {
			e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#btnSubmit').trigger("reset");
$('#assetsmodel').modal('show');
$.ajax({
	url: 'AssetsByID?id=' + iid,
	method: 'GET',
	data: '',
	dataType: 'json',
}).done(function (response) {
	console.log(response);
// Populate the form fields with the data returned from server
$('#btnSubmit').find('[name="aid"]').val(response.assetsByid.id).end();
$('#btnSubmit').find('[name="location"]').val(response.assetsByid.location_id).end();
$('#btnSubmit').find('[name="name"]').val(response.assetsByid.name).end();
$('#btnSubmit').find('[name="type"]').val(response.assetsByid.type).end();
$('#btnSubmit').find('[name="tag_no"]').val(response.assetsByid.tag_no).end();
$('#btnSubmit').find('[name="model"]').val(response.assetsByid.model).end(); 
$('#btnSubmit').find('[name="type1"]').val(response.assetsByid.type1).end();                                                   
$('#btnSubmit').find('[name="installation_date"]').val(response.assetsByid.installation_date).end();                                                 
$('#btnSubmit').find('[name="manufacturer"]').val(response.assetsByid.manufacturer).end(); 
$('#btnSubmit').find('[name="slno"]').val(response.assetsByid.slno).end();            
$('#btnSubmit').find('[name="parts_included"]').val(response.assetsByid.parts_included).end();                                              
$('#btnSubmit').find('[name="warrenty"]').val(response.assetsByid.warrenty).end();                                              
$('#btnSubmit').find('[name="power"]').val(response.assetsByid.power).end();                                              
$('#btnSubmit').find('[name="status"]').val(response.assetsByid.status).end();                                              
$('#btnSubmit').find('[name="specification"]').val(response.assetsByid.specification).end();                                             
});
});
	});
</script>                        
<?php $this->load->view('backend/footer'); ?>        