<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Complaints</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Complaints</li>
                    </ol>
                </div>
            </div>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Complaints List                   
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown</th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                                <th>Action </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Equipment Name</th>
                                                <th>Department</th>
                                                <th>Breakdown </th>
                                                <th>Assigned To</th>
                                                <th>Reported Date & Time</th>
                                                <th>Details</th>
                                                <th>Action </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($complaints as $value) {
                                           ?>
                                            <tr>
                                                <td><?php echo $value->equipmentname;?></td>
                                                <td><?php echo $value->dep_name;?></td>
                                                <td><?php echo $value->breakdown_name;?></td>
                                                <td><?php echo $value->first_name.' '.$value->last_name;?></td>
                                                <td><?php $date= strtotime($value->date_and_time);
                                                          echo date("d-F-y, H:i:s", $date);?></td>
                                                <td><?php echo $value->details;?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url(); ?>maintenance/viewbreakdown?id=<?php echo base64_encode($value->id); ?>" title="Edit" class="btn btn-sm btn-success waves-effect waves-light"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>                     
    <?php $this->load->view('backend/footer'); ?>        