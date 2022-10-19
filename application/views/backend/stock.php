<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-user-secret" aria-hidden="true"></i> Stock</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Stock</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>
            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                    <div class="row m-b-10"> 
                            <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#stockmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Stock</a></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Stock List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="stock123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Vendor</th>
                                                <th>Stock in hand</th>
                                                <th>Unit</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                               <tr>
                                                <th>Product Name</th>
                                                <th>Vendor</th>
                                                <th>Stock in hand</th>
                                                <th>Unit</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($stock as $value) {?>
                                <tr>
                                    <td><?php echo $value->productname;?></td>
                                    <td><?php echo $value->vendor_name;?></td>
                                    <td><?php echo $value->stock_in_hand;?></td>
                                    <td><?php echo $value->unit;?></td>
                                    <?php if($value->stock_in_hand != 0){?>
                                    <td><?php echo 'In Stock';?></td>
                                    <?php } else{ ?>
                                        <td><span class="badge badge-danger"><?php echo 'Out of stock';?></span></td>
                                        
                                   <?php } ?>
                                    <td class="jsgrid-align-center ">
                                    <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light stocks" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="deletestock?id=<?php echo $value->id; ?>" onclick="return confirm('Are you sure want to delete this stock?')" title="Delete" class="btn btn-sm btn-danger waves-effect waves-light"><i class="fa fa-trash-o"></i></a>
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
                <!-- sample modal content -->
<div class="modal fade" id="stockmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Stock </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="Add_stock" id="btnSubmit" enctype="multipart/form-data">
                <div class="modal-body">
                    
                            <div class="form-group">
                                <label class="control-label">Product Name</label>
                                <input type="text" name="productname" value="" class="form-control" id="productname" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Vendor</label>
                                <select name="vendor" class="select2 form-control custom-select" id="vendor" style="width: 100%" required >
									<option>Select Vendor</option>
									<?php foreach($vendor_list as $vendor): ?>
									<option value="<?php echo $vendor->vid ?>"><?php echo $vendor->vendor_name ?></option>
									 <?php endforeach; ?>
								 </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stock in hand</label>
                                <input type="input" name="stock_in_hand" value="" class="form-control" id="stock_in_hand" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Unit</label>
                                <input type="text" name="unit" value="" class="form-control" id="unit" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Minimum Quantity</label>
                                <input type="text" name="minquantity" value="" class="form-control" id="minquantity" required>
                            </div>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->upload->display_errors(); ?>
                            
                       
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
		$(".stocks").click(function (e) {
			e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
$('#btnSubmit').trigger("reset");
$('#stockmodel').modal('show');
$.ajax({
	url: 'EditStock?id=' + iid,
	method: 'GET',
	data: '',
	dataType: 'json',
}).done(function (response) {
	console.log(response);
// Populate the form fields with the data returned from server
$('#btnSubmit').find('[name="aid"]').val(response.stockbyid.id).end();
$('#btnSubmit').find('[name="productname"]').val(response.stockbyid.productname).end();
$('#btnSubmit').find('[name="vendor"]').val(response.stockbyid.vendor).end();
$('#btnSubmit').find('[name="stock_in_hand"]').val(response.stockbyid.stock_in_hand).end();
$('#btnSubmit').find('[name="unit"]').val(response.stockbyid.unit).end();
$('#btnSubmit').find('[name="minquantity"]').val(response.stockbyid.minquantity).end();
 
                           
});
});
	});
</script>
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#stock123').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>