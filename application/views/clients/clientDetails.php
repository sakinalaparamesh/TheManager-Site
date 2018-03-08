<div class="panel ">
      <div class="panel-heading color-dark">  
          <div class="text-right"><span class="fa fa-close closemini" onclick="closeSidebar();"></span></div>
        <p><?php echo $title; ?></p>
    </div>
      <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <!--<form class="form-horizontal" role="form">-->
                                <div class="action_icons">
                                     <button class="btn btn-icon waves-effect color-dark waves-light" onclick="addBranchForm(0);"> <i class="fa fa-plus" title="Add Branch"></i> </button>
                                     <button class="btn btn-icon waves-effect color-dark waves-light" onclick="clientContactForm(0);"> <i class="fa fa-user" title="Add Contact"></i> </button>
                                     <button class="btn btn-icon waves-effect color-dark waves-light" > <i class="fa fa-pencil" title=" Edit"></i> </button>
                                     <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-dollar" title="Billing Contact"></i> </button>
                                    <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-trash" title="Inactive"></i> </button>
                                    </div>
                                    <div class="contact-card m-t-30">
                                <a class="pull-left" href="#">
                                    <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                </a>

                                <div class="member-info">

                                    <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                                    <p class="text-muted">Branch manager</p>
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                                     <p class="text-dark"><i class="md md-business m-r-10"></i><small>{Address}</small></p>
                                     <h4 class="m-t-0 m-b-5 header-title"><b>{Mobile}</b></h4>
                                     <p class="text-muted">Contact Number</p>
                                     <p class="text-muted">Email</p>
                                    <div class="m-t-20">
                                        <a href="#" class="btn btn-purple waves-effect waves-light btn-sm">Send email</a>
                                        <a href="#" class="btn btn-success waves-effect waves-light btn-sm m-l-5">Edit</a>
                                        <a href="#" class="btn btn-pink waves-effect waves-light btn-sm m-l-5">Call</a>
                                    </div>
                                </div>

                            </div>
                                 
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
    </div>