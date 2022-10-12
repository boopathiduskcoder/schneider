        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
                        ?>                
                <div class="user-profile">
                    <!-- User profile image --><?php if(empty($basicinfo->em_image)){ ?>
                         <div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/avatar.png ?>" alt="user" />
                         <!-- this is blinking heartbit-->
                         <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    <?php }else{ ?>
                    <div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <?php } ?>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></h5>
                        <a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                        <?php if($this->session->userdata('user_type')=='EMPLOYEE'){ ?>
                            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Assets </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>equipment/plant_equipment">Plant Equipments</a></li>
                                <li><a href="<?php echo base_url(); ?>equipment/office_equipment">Office Equipments</a></li>
                                <li><a href="<?php echo base_url(); ?>equipment/tools_equipment">Tools/Others</a></li>
                                <li><a href="<?php echo base_url(); ?>equipment/ac_equipment">Ac Equipments</a></li>
                                <li><a href="#">Audit</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Maintenance </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>maintenance/preventive">Preventive Maintenance </a></li>
                                <li><a href="<?php echo base_url(); ?>maintenance/breakdown"> Breakdown</a></li>
                                <li><a href="<?php echo base_url(); ?>maintenance/complaints"> Complaints</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Monitoring </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>monitoring/electricity">ED [Electricity Consuming] </a></li>
                                <li><a href="<?php echo base_url();?>monitoring/temperature">Temperature & Humidity</a></li>
                                <li><a href="<?php echo base_url();?>monitoring/oil_consumption">Oil Consumption</a></li>
                                <li><a href="<?php echo base_url();?>monitoring/fire_ext">Fire Extinuguishers</a></li>
                                <!--<li><a href="<?php //echo base_url();?>monitoring/pf">PF</a></li>-->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Vendor Management </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>vendor/vendors">Vendor </a></li>
                                <li><a href="<?php echo base_url(); ?>vendor/stock">Stock </a></li>
                            </ul>
                        </li>
                                                                   
                        <?php } else if($this->session->userdata('user_type')=='SUPER ADMIN') { ?>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Assets </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>equipment/plant_equipment">Plant Equipments</a></li>
                                <li><a href="<?php echo base_url(); ?>equipment/office_equipment">Office Equipments</a></li>
                                <li><a href="<?php echo base_url(); ?>equipment/tools_equipment">Tools/Others</a></li>
                                <li><a href="<?php echo base_url(); ?>equipment/ac_equipment">Ac Equipments</a></li>
                                <li><a href="#">Audit</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Maintenance </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>maintenance/preventive">Preventive Maintenance </a></li>
                                <li><a href="<?php echo base_url(); ?>maintenance/breakdown"> Breakdown</a></li>
                                <li><a href="<?php echo base_url(); ?>maintenance/complaints"> Complaints</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Monitoring </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>monitoring/electricity">ED [Electricity Consuming] </a></li>
                                <li><a href="<?php echo base_url();?>monitoring/temperature">Temperature & Humidity</a></li>
                                <li><a href="<?php echo base_url();?>monitoring/oil_consumption">Oil Consumption</a></li>
                                <li><a href="<?php echo base_url();?>monitoring/fire_ext">Fire Extinuguishers</a></li>
                                <!--<li><a href="<?php //echo base_url();?>monitoring/pf">PF</a></li>-->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Vendor Management </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>vendor/vendors">Vendor </a></li>
                                <li><a href="<?php echo base_url(); ?>vendor/stock">Stock </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Technicians</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>technician/technicians">Technicians </a></li>
                                <!-- <li><a href="<?php echo base_url(); ?>worker/in_active_worker">In-active Workers</a></li> -->
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url();?>settings/Settings">Site Settings</a></li>
                                <li><a href="<?php echo base_url();?>settings/location">Locations</a></li>
                                <li><a href="<?php echo base_url();?>settings/department">Departments</a></li>
                            </ul>
                        </li>
                        <!-- <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Attendance </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>attendance/Attendance">Attendance List </a></li>
                                <li><a href="<?php echo base_url(); ?>attendance/Save_Attendance">Add Attendance </a></li>
                                <li><a href="<?php echo base_url(); ?>attendance/Attendance_Report">Attendance Report </a></li>
                            </ul>
                        </li> -->
                       <!--  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Leave </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>leave/Holidays"> Holiday </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/leavetypes"> Leave Type</a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Application"> Leave Application </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Earnedleave"> Earned Leave </a></li>
                                <li><a href="<?php echo base_url(); ?>leave/Leave_report"> Report </a></li>
                            </ul>
                        </li> -->
                        
                       <!--  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Loan </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php echo base_url(); ?>Loan/View"> Grand Loan </a></li>
                                <li><a href="<?php echo base_url(); ?>Loan/installment"> Loan Installment</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">Payroll </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="<?php #echo base_url(); ?>Payroll/Salary_Type"> Payroll Type </a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Salary_List"> Payroll List </a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Generate_salary"> Generate Payslip</a></li>
                                <li><a href="<?php echo base_url(); ?>Payroll/Payslip_Report"> Payslip Report</a></li>
                            </ul>
                        </li> -->
                       <!--  <li> <a href="<?php echo base_url()?>notice/All_notice" ><i class="mdi mdi-treasure-chest"></i><span class="hide-menu">Notice <span class="hide-menu"></a></li> -->
                         
                        <?php } 
                        else { ?>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Complaints </span></a>
                            <ul aria-expanded="false" class="collapse">
                                
                                <li><a href="<?php echo base_url(); ?>maintenance/complaintslist"> Complaints</a></li>
                            </ul>
                        </li>
                       
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>