<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-bell" aria-hidden="true"></i> All Notifications</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Notifications</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Notification List                   
                                </h4>
                            </div>
                            <div class="container mt-5">
        <div class="row">
        <?php foreach ($allnotifications as $value) { ?>
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="d-flex flex-row mb-3">
                    <?php if(!empty( $value->image)){ ?>
                        <img src="<?php echo base_url(); ?>assets/images/equipments/<?php echo $value->image; ?>" width="70">
                        <?php } else{?>
                            <img src="<?php echo base_url(); ?>assets/images/no_image.png " width="70">
                         <?php } ?>
                        <div class="d-flex flex-column ml-2"><h6><b><?php echo $value->equipmentname; ?></b></h6><span class="text-black-50"><?php echo $value->breakdown_name; ?></span></div>
                    </div>
                    <h6><?php echo $value->message; ?></h6>
                    <div class="d-flex justify-content-between install mt-3"><span><b><?php echo $value->created_date; ?></b></span><a href="<?php echo base_url(); ?>maintenance/viewbreakdown?id=<?php echo base64_encode($value->bid); ?>"><span class="text-primary"><b>View&nbsp;<i class="fa fa-angle-right"></i></b></span></a></div>
                </div>
            </div>
            
            <?php } ?>
            
        </div>
    </div>
                        </div>
                    </div>
                </div>  
            </div> 
            <style>
            body {
  background: #eee;
  
}

.ratings i {
  color: green;
}

.install span {
  font-size: 12px;
}

.col-md-4 {
  margin-top: 27px;
}
</style>
    <?php $this->load->view('backend/footer'); ?>        