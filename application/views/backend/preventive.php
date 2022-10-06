<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Preventive Maintenance</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Preventive Maintenance</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                        
                        <?php } else { ?>                        
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#preventivemodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Maintenance </a></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Maintenance List                   
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Location</th>
                                                <th>Service</th>
                                                <th>Last Date </th>
                                                <th>Next Date </th>
                                                <th>Status</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Location</th>
                                                <th>Service</th>
                                                <th>Last Date </th>
                                                <th>Next Date </th>
                                                <th>Status</th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($preventive as $value) { ?>
                                            <tr>
                                                <td><?php $aid =  $value->equipment_id;
                                                          $adata = $this->db->get_where('equipments',array('id '=>$aid))->row();
                                                          echo  $adata->name; ?>
                                                </td>
                                                <td><?php $lid =  $value->location_id;
                                                          $ldata = $this->db->get_where('location',array('id '=>$lid))->row();
                                                          echo  $ldata->location_name; ?></td>
                                                <td><?php $sid =  $value->interval_id;
                                                          $sdata = $this->db->get_where('service_interval',array('id '=>$sid))->row();
                                                          echo  $sdata->name; ?></td>
                                                <td><?php echo $value->last_date;?></td>
                                                <td><?php echo $value->next_date;?>
                                                <br><span class="badge badge-success">
                                                     <?php
                                                         $date1= $value->next_date;
                                                         $date2 =$value->last_date;
                                                         $date1 = strtotime($date1);
                                                         $date2 = strtotime($date2);
                                                         $datediff = $date1 - $date2;
                                                         $no_of_days =  floor($datediff / (60 * 60 * 24));
                                                         echo $no_of_days.' ' .'days left'; ?></span></td>
                                                <td><?php echo $value->status;?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light preventive" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="delete_preventive?id=<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this data?')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            <!--<tr>
                                              <td> Asset 10</td>
                                              <td> Hall A</td>
                                              <td>July 3, 2022</td>
                                              <td>December 3, 2022 <br><span class="badge badge-success">112 days left</span></td>
                                              <td>Completed</td>
                                              <td>
                                              <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                          </td>
                                          <tr>
                                              <td> Asset 10</td>
                                              <td> Hall A</td>
                                              <td>July 3, 2022</td>
                                              <td>December 3, 2022 <br><span class="badge badge-success">112 days left</span></td>
                                              <td>Completed</td>
                                              <td>
                                              <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                          </td>
                                          </tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
                        <!-- sample modal content -->
                        <div class="modal fade" id="preventivemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Maintenance</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Preventive" id="tasksModalform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                             <div class="form-group row">
                                                <label class="control-label col-md-3">Asset List</label>
                                                <select class="form-control custom-select col-md-8 proid" data-placeholder="Choose a Category" tabindex="1" name="ass_name">
                                                <option>Select</option>  
                                                <?php foreach($equipments as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>   
                                            <div class="form-group row">
							
								               <label class="control-label col-md-3">Location</label>
								               <select name="location" class="form-control custom-select col-md-8 proid" style="width: 100%" required >
									           <option>Select Location</option>
									           <?php foreach($locations as $locate): ?>
										              <option value="<?php echo $locate->id ?>"><?php echo $locate->location_name ?></option>
									           <?php endforeach; ?>
								              </select>
							                </div>                        
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Service Days</label>
                                                <select class="form-control custom-select col-md-8 proid" data-placeholder="Choose a Category" tabindex="1" name="service_days">
                                                <option>Select Service</option>
                                                <?php foreach($service as $value): ?>
                                                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                                                   <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Last Service Date</label>
                                                <input type="text" name="startdate" value="" class="form-control col-md-3 mydatetimepickerFull" id="recipient-name1">
                                                
                                                <label class="control-label col-md-2">Next Service Date</label>
                                                <input type="text" name="enddate" value="" class="form-control col-md-3 mydatetimepickerFull" id="recipient-name1">
                                        </div>
                                        <div class="form-group row">
								            <label class="control-label col-md-3">Status</label>
								            <select name="status" class="form-control custom-select col-md-8 proid" style="width: 100%" required>
									        <option>Select</option>
									        <option value="Active">Active</option>
									        <option value="In-active">In-active</option>
								       </select>
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
		$(".preventive").click(function (e) {
			e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#btnSubmit').trigger("reset");
$('#preventivemodel').modal('show');
$.ajax({
	url: 'EditPreventive?id=' + iid,
	method: 'GET',
	data: '',
	dataType: 'json',
}).done(function (response) {
	console.log(response);
// Populate the form fields with the data returned from server
$('#btnSubmit').find('[name="id"]').val(response.preventivebyid.id).end();
$('#btnSubmit').find('[name="ass_name"]').val(response.preventivebyid.equipment_id).end();
$('#btnSubmit').find('[name="location"]').val(response.preventivebyid.location_id).end();
$('#btnSubmit').find('[name="service_days"]').val(response.preventivebyid.interval_id).end();
$('#btnSubmit').find('[name="startdate"]').val(response.preventivebyid.last_date).datepicker('option', 'dateFormat', 'YYYY-MM-DD').end();
$('#btnSubmit').find('[name="enddate"]').val(response.preventivebyid.next_date).end();  
$('#btnSubmit').find('[name="status"]').val(response.preventivebyid.status).end();  
                           
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
    <?php $this->load->view('backend/footer'); ?>        