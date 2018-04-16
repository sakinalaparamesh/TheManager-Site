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

                    <!--<button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-plus" title="Add role"></i> </button>-->

                    <button class="btn btn-icon waves-effect color-dark waves-light" onclick="addBranchForm('');"> <i class="fa fa-pencil" title="Edit Role"></i> </button>

                    <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-dollar" title="Billing Contact"></i> </button>

                    <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-trash" title="Inactive"></i> </button>

                    <button class="btn btn-icon waves-effect color-dark waves-light" onclick="clientProductMappingForm('');"> <i class="fa fa-tasks" title="Assign Products"></i> </button>

                </div>
                <div class="contact-card m-t-30">

                    <!--                    <a class="pull-left" href="#">
                                            <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                        </a>-->

                    <div class="member-info">

                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $role_info['rolename']; ?></small></p>
                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $role_info['roledescription']; ?></small></p>
                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $role_info['displayname']; ?></small></p>
                                <?php foreach ($controllers as $ctrl_info) { ?>
                                    <?= $ctrl_info['controllername'] ?><br>
                        <?php foreach ($actions_info[$ctrl_info['controllerid']] as $action_info) { ?>
                        <p class="text-dark"><i class="md md-business m-r-10"></i><small>
                            <?php echo $action_info['controlleractionname']; ?></small></p>
                        
                        <?php }} ?>
                    </div>

                </div>

                <!--</form>-->
            </div>
        </div>
    </div>
</div>