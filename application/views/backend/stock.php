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
                                    <td><?php echo $value->vendor;?></td>
                                    <td><?php  echo $value->stock_in_hand;?></td>
                                    <td><?php echo $value->unit;?></td>
                                    <?php if($value->stock_in_hand != 0){?>
                                    <td><?php echo $value->status;?></td>
                                    <?php } else{ ?>
                                        <td><span class="badge badge-danger"><?php echo $value->status;?></span></td>
                                        
                                   <?php } ?>
                                    <td class="jsgrid-align-center ">
                                        <a href="<?php echo base_url();?>monitoring/edit_electricity/<?php echo $value->id?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-pencil-square-o"></i></a>
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
            <form method="post" action="Add_vendor" id="btnSubmit" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">      
                            <div class="form-group">
                                <label class="control-label">Product Name</label>
                                <input type="text" name="productname" value="" class="form-control" id="productname" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Vendor</label>
                                <select name="vendor" class="select2 form-control custom-select" id="vendor" style="width: 100%" required >
									<option>Select Vendor</option>
									<?php foreach($vendor_list as $vendor): ?>
									<option value="<?php echo $vendor->vendor_name ?>"><?php echo $vendor->vendor_name ?></option>
									 <?php endforeach; ?>
								 </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stock in hand</label>
                                <input type="input" name="stock_in_hand" value="" class="form-control" id="stock_in_hand" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Unit</label>
                                <input type="text" name="unit" value="" class="form-control" id="unit"  minlength="10" maxlength="12" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <input type="text" name="nature_of_work" value="" class="form-control" id="nature_of_work"  minlength="10" maxlength="12" required>
                            </div>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->upload->display_errors(); ?>
                            <?php echo $this->session->flashdata('formdata'); ?>    
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