<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?> 
         <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-cubes" style="color:#1976d2"></i> ED [Electricity Consuming]</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Electricity Consuming</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div> 
            <div class="container-fluid">         
                <div class="row">
                    <div class="col-lg-5">                      

                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Electricity</h4>
                            </div>
                            

                            <div class="card-body">
                                    <form method="post" action="download_invoice" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-12">
                                                <div class="form-group">
								                         <label class="control-label">Date</label>
								                           <input type="date" name="from_date" value="" class="form-control mydatepicker"  autocomplete="off">
							                    </div>
                                                <div class="form-group">
								                         <label class="control-label">Date</label>
								                        <input type="date" name="to_date" value="" class="form-control mydatepicker"  autocomplete="off">
							                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Export</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                       
                    </div>

                    
                </div>
    <?php $this->load->view('backend/footer'); ?>