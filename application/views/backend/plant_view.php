<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<div class="page-wrapper">

 <div class="message"></div>

 <div class="row page-titles">

    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-user-secret" style="color:#1976d2"></i>                      
        <?php echo $plant_data->name ?> Detailed View
    </h3>
</div>

<div class="col-md-7 align-self-center">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Assets</li>
    </ol>
</div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card card-outline-info">
                <div class="card-header">
                <h4 class="m-b-0 text-white"> Assets Details</h4>
            </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Basic Info </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" style="font-size: 14px;"> Preventive Maintenance </a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#education" role="tab" style="font-size: 14px;"> Breakdown</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#experience" role="tab" style="font-size: 14px;"> Complaints</a> </li>
                </ul>
                <!-- Tab panes -->

                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="m-t-30">
                                                   <?php if(!empty($plant_data->image)){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/equipments/<?php echo $plant_data->image; ?>" class="img-circle" width="150" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/no_image.png" class="img-circle" width="150" alt="                      <?php echo $plant_data->name ?>
                                                    " title="                      <?php echo $plant_data->name ?>
                                                    "/>                                   
                                                <?php } ?>
                                                <h4 class="card-title m-t-10">                      <?php echo $plant_data->name ?>
                                            </h4>
                                            <h6 class="card-subtitle">                      <?php echo $plant_data->name ?>
                                        </h6>
                                    </center>
                                </div>
                                <div>
                                    <hr> </div>
                                    <div class="card-body"> <small class="text-muted">Tag Number </small>
                                        <h6>                                            <?php echo $plant_data->tag_no ?>

                                    </h6> <small class="text-muted p-t-30 db">Model</small>
                                    <h6>                                           <?php echo $plant_data->model ?>

                                </h6> 
                                
                            </div>
                        </div>                                                    
                    </div>


                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Plant Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                              <?php echo $plant_data->name ?>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Tag Number</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <?php echo $plant_data->tag_no ?>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Model</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      <?php echo $plant_data->model ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Type</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      <?php echo $plant_data->type ?>
                  </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Installation date</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                  <?php echo $plant_data->installation_date ?>
              </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Parts included</h6>
          </div>
          <div class="col-sm-9 text-secondary">
              <?php echo $plant_data->parts_included ?>
          </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Warrenty</h6>
      </div>
      <div class="col-sm-9 text-secondary">
          <?php echo $plant_data->warrenty ?>
      </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-3">
      <h6 class="mb-0">Power</h6>
  </div>
  <div class="col-sm-9 text-secondary">
      <?php echo $plant_data->power ?>
  </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
      <h6 class="mb-0">Specification</h6>
  </div>
  <div class="col-sm-9 text-secondary">
      <?php echo $plant_data->specification ?>
  </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-3">
      <h6 class="mb-0">Location</h6>
  </div>
  <div class="col-sm-9 text-secondary">
      <?php echo $plant_data->location_name ?>
  </div>
</div>
<hr>

</div>
</div>

</div>
</div>
</div>
</div>
</div>
<!--second tab-->
<div class="tab-pane" id="profile" role="tabpanel">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Permanent Contact Information</h3>

        </div>
    </div>
</div>



</div>
</div>
</div>
<!-- Column -->
</div>


<?php $this->load->view('backend/footer'); ?>