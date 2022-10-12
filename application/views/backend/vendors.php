<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-user-secret" aria-hidden="true"></i> Vendors</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Vendors</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <div class="row m-b-10"> 
                            <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#vendormodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Vendor</a></button>
                        </div>
                       
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Vendor List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="employees123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Vendor Name</th>
                                                <th>Contact Person</th>
                                                <th>Email </th>
                                                <th>Contact No</th>
                                                <th>Nature of Work</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                               <tr>
                                                <th>Vendor Name</th>
                                                <th>Contact Person</th>
                                                <th>Email </th>
                                                <th>Contact No</th>
                                                <th>Nature of Work</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php 

                                           foreach($vendor_list as $value): ?>
                                            <tr>
                                                <td ><?php echo $value->vendor_name; ?></td>
                                                
                                                <td><?php echo $value->contact_person; ?></td>
                                                <td><?php echo $value->email_id; ?></td>
                                                <td><?php echo $value->contact_number; ?></td>
                                                <td><?php echo $value->nature_of_work; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light assets" data-id="<?php echo $value->vid ?>"><i class="fa fa-pencil-square-o"></i></a>

                                                   
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
<div class="modal fade" id="vendormodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Vendor </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="Add_vendor" id="btnSubmit" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">      
                            <div class="form-group">
                                <label class="control-label">Vendor Name</label>
                                <input type="text" name="vendor_name" value="" class="form-control" id="vendor_name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact Person</label>
                                <input type="text" name="contact_person" value="" class="form-control" id="contact_person" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="input" name="email_id" value="" class="form-control" id="email_id" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Contact Number</label>
                                <input type="text" name="contact_number" value="" class="form-control" id="contact_number"  placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nature of Work</label>
                                <input type="text" name="nature_of_work" value="" class="form-control" id="nature_of_work"  placeholder="" required>
                            </div>
                            <?php //echo validation_errors(); ?>
                            <?php //echo $this->upload->display_errors(); ?>
                            <?php //echo $this->session->flashdata('formdata'); ?>    
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
$('#vendormodel').modal('show');
$.ajax({
    url: 'VendorByID?id=' + iid,
    method: 'GET',
    data: '',
    dataType: 'json',
}).done(function (response) {
    console.log(response);
// Populate the form fields with the data returned from server
$('#btnSubmit').find('[name="aid"]').val(response.vendorByid.vid).end();
$('#btnSubmit').find('[name="vendor_name"]').val(response.vendorByid.vendor_name).end();
$('#btnSubmit').find('[name="contact_person"]').val(response.vendorByid.contact_person).end();
$('#btnSubmit').find('[name="email_id"]').val(response.vendorByid.email_id).end();
$('#btnSubmit').find('[name="contact_number"]').val(response.vendorByid.contact_number).end();   
$('#btnSubmit').find('[name="nature_of_work"]').val(response.vendorByid.nature_of_work).end();                                                  
                                        
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