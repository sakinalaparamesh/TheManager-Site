<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?= base_url()?>assets/images/fevicon.png">

        <title>The Manager</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?= base_url()?>plugins/morris/morris.css">

        <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?= base_url()?>assets/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/modify.css" rel="stylesheet" type="text/css" />

        <script src="<?= base_url()?>assets/js/modernizr.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!-- <a href="index.html" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ub<i class="md md-album"></i>ld</span></a> -->
                        <!-- Image Logo here -->
                       <a href=" " class="logo">
                            <i class="icon-c-logo"> <img src="<?= base_url()?>assets/images/logo.png" height="42"/> </i>
                            <span><img src="<?= base_url()?>assets/images/logo.png" height="50"/></span>
                        </a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <!-- <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="badge badge-pink noti-icon-badge">4</span>
                            </a> -->
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">5</span>Notification</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                                    <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="icon-user"></i></div>
                                    <p class="notify-details">New user registered.<small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="icon-like"></i></div>
                                    <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">1 min ago</small></p>
                                </a>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item notify-all">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="list-inline-item notification-list">
                            <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">
                                <i class="dripicons-expand noti-icon"></i>
                            </a>
                        </li>

                        <!-- <li class="list-inline-item notification-list">
                            <a class="nav-link right-bar-toggle waves-light waves-effect" href="#">
                                <i class="dripicons-message noti-icon"></i>
                            </a>
                        </li> -->

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                            
                                <img src="<?= base_url()?>assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> &nbsp;
                                <span class="user_name">Welcome ! John</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <!-- item-->
                                <li>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                   <i class="ti-user text-custom m-r-10"></i> <span>  Profile</span>
                                </a>
                                </li>

                                <!-- item-->
                                <li>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ti-settings text-custom m-r-10"></i> <span>Settings</span>
                                </a>
                            </li>

                                <!-- item-->
                                <li>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                   <i class="ti-lock text-custom m-r-10"></i> <span>Lock Screen</span>
                                </a>
                                </li>
                                <li class="divider">
                                
                                </li>
                                <!-- item-->
                                <li>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ti-power-off text-danger m-r-10"></i> <span>Logout</span>
                                </a>
                            </li>

                            </ul>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <!-- <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li> -->
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

                