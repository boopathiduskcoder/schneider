<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">

 <div class="message"></div>

 <div class="row page-titles">

    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-user-secret" style="color:#1976d2"></i>                      
       Report
    </h3>
</div>

<div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Reports</li>
    </ol>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                <h4 class="m-b-0 text-white"> Report Details</h4>
            </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Preventive Maintenance </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Breakdown</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Complaints</a> </li>
                </ul>
                <!-- Tab panes -->

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="card card-outline-info">
                            
                            

                            <div class="card-body">
                                    <form method="get" action="download_preventive" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-8">
                                                <div class="form-group">
								                         <label class="control-label">Month</label>
								                           <input type="text" name="month" value="" class="form-control monthdatepicker"  autocomplete="off">
							                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info">Export</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                                                                               
                                    </div>
                          
                                </div>
                            </div>
                        </div>
                    </div>
<div class="tab-pane" id="profile" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <div class="col-md-4">
                        <div class="card card-outline-info">
                        <div class="card-body">
                            <form method="post" action="download_breakdown" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-8">
                                                <div class="form-group">
								                         <label class="control-label">Month</label>
								                           <input type="text" name="month" value="" class="form-control monthdatepicker"  autocomplete="off">
							                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info">Export</button>
                                        </div>
                                    </form>
                                    </div>
                        </div>
                    </div>
                </div>  
        </div>
    </div>
</div>
<!--third tab-->
<div class="tab-pane" id="education" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <div class="col-md-4">
                        <div class="card card-outline-info">
                        <div class="card-body">
                                    <form method="post" action="download_complaint" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <div class="row ">
                                                <div class="col-md-8">
                                                <div class="form-group">
								                         <label class="control-label">Month</label>
								                           <input type="text" name="month" value="" class="form-control monthdatepicker"  autocomplete="off">
							                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-info">Export</button>
                                        </div>
                                    </form>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>  
        </div>
    </div>
</div>


</div>
</div>
</div>
<!-- Column -->
</div>


<?php $this->load->view('backend/footer'); ?>
<style>
    .name_wrapper {
  display: flex;
  margin: 10px 0;
}


input {
  padding: 8px;
  border-radius: 12px;
  margin: 10px;
  border:none;
  border: 1px solid black;
}

</style>