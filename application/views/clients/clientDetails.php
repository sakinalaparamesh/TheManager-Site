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

                    <button class="btn btn-icon waves-effect color-dark waves-light" onclick="addBranchForm(0, '<?php echo $clientId; ?>');"> <i class="fa fa-plus" title="Add Branch"></i> </button>
                    <?php if ($branchId != '') { ?>
                        <button class="btn btn-icon waves-effect color-dark waves-light" onclick="addBranchForm('<?php echo $branchId; ?>', '<?php echo $clientId; ?>');"> <i class="fa fa-pencil" title="Edit Branch"></i> </button>
                        <button class="btn btn-icon waves-effect color-dark waves-light" onclick="clientContactForm(0, '<?php echo $branchId; ?>');"> <i class="fa fa-user" title="Add Contact"></i> </button>
                    <?php }if ($contactId) { ?>
                        <button class="btn btn-icon waves-effect color-dark waves-light" onclick="clientContactForm('<?php echo $contactId; ?>', '<?php echo $branchId; ?>');"> <i class="fa fa-pencil" title=" Edit"></i> </button>
                    <?php }if ($contactId == '') { ?>
                        <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-dollar" title="Billing Contact"></i> </button>
                    <?php }if ($contactId) { ?>
                        <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-trash" title="Inactive"></i> </button>
                    <?php }if ((count($productscount) > 0)) { ?>
                        <button class="btn btn-icon waves-effect color-dark waves-light" onclick="clientProductMappingForm('<?php echo $clientId; ?>');"> <i class="fa fa-tasks" title="Assign Products"></i> </button>
                    <?php } ?>
                </div>

                <div class="contact-card m-t-30">
                    <div class="row">
                        <div class="col-md-2">
                            <?php if ($contactId) { ?>
                                <a class="" href="#">
                                    <img class="rounded-circle thumb-md" src="<?php echo base_url() ?>assets/images/users/avatar-2.jpg" alt="">
                                </a><?php } ?>
                        </div>
                        <div class="col-md-10 m-t-5">
                            <?php if ($contactId) { ?>
                                <h4 class="m-t-0 m-b-5 header-title"><b><?php echo $details[0]['PersonName']; ?></b></h4>
                                <p class="text-muted"><?php echo $details[0]['Designation']; ?></p>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="member-info">

                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details[0]['ClientName']; ?></small></p>
                        <?php if ($branchId) { ?>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details[0]['BranchName']; ?></small></p>
                            <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details[0]['BranchAddress']; ?></small></p>
                        <?php } if ($contactId) { ?>
                            <div class="row">
                                <p class="col-md-4 text-muted">Contact Number</p>
                                <h4 class="col-md-8 m-t-2 m-b-5 f-16"><b><?php echo $details[0]['Mobile']; ?></b></h4>
                            </div>
                            <div class="row">
                                <p class="col-md-2 text-muted">Email</p>

                                <h4 class="col-md-8 m-t-2 m-b-5 f-16"><b><?php echo $details[0]['Email']; ?></b></h4>
                            </div>
                            <div class="row">
                                <p class="col-md-2 text-muted">Greetings</p>

                                <h4 class="col-md-8 m-t-2 m-b-5 f-16"><b><?php echo @$details[0]['greetings']; ?></b></h4>


                            </div>
                        <?php } ?>


                        <div class="row">
                            <p class="col-md-2 text-muted">Client Type</p>

                            <h4 class="col-md-8 m-t-2 m-b-5 f-16"><b><?php echo @$details[0]['configuration_name']; ?></b></h4>


                        </div>
                        <!-- <div class="m-t-20">
                             <a href="#" class="btn btn-purple waves-effect waves-light btn-sm">Send email</a>
                             <a href="#" class="btn btn-success waves-effect waves-light btn-sm m-l-5">Edit</a>
                             <a href="#" class="btn btn-pink waves-effect waves-light btn-sm m-l-5">Call</a>
                         </div>-->
                    </div>

                </div>


                <!--</form>-->
            </div>
        </div>
    </div>
</div>