<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <?php //echo $this->breadcrumbs->show(); ?>
            </div>
            <h4 class="page-title"><?php echo $title; ?></h4>
        </div>
    </div>
</div>
<div class="row">
    
        <div class="col-md-3">
            <a href="<?= base_url()?>department"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-list text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Departments</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
    
        <div class="col-md-3">
            <a href="<?php echo base_url('product'); ?>"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Products</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo base_url('agent'); ?>"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Agents</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo base_url('clients/clientTypes'); ?>"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Client Types</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div> 
        <div class="col-md-3">
            <a href="<?php echo base_url('clients'); ?>"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Clients</b></span></h5>
            <p class="text-muted mb-0 ">
                C - <b class="badge badge-inverse counter"><?php echo $clients_count['total_clients']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                B - <b class="badge badge-inverse counter"><?php echo $clients_count['total_branches']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
                P - <b class="badge badge-inverse counter"><?php echo $clients_count['total_persons']; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo base_url('jobs'); ?>"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Jobs</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo base_url('role'); ?>"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Roles</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
    
        <div class="col-md-3">
            <a href="employees.php"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Employees</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
             <a href="#"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-file-text-o text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Attendance</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">8</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
             <a href="#"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-money text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Payroll</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">10</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href=""><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Employees</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="employees.php"><div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-dark pull-left">
            <i class="fa fa-users text-white"></i>
            </div>
            <div class="text-right">
            <h5 class="text-dark"><span class=""><b>Employees</b></span></h5>
            <p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>
            </div>
            <div class="clearfix"></div>
            </div>
            </a>
        </div>
 </div>

<!-- end page title end breadcrumb -->
</div> <!-- end container -->
</div>
<!-- end wrapper -->
