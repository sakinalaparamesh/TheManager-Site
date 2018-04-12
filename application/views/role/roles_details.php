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

                    <?php // if (checkPrivileges("Role", "RoleEdit")) { 

                        ?>
                        <a class="btn btn-icon waves-effect color-dark waves-light" href="<?= base_url() ?>Role/addOrEdit/<?= $role_info['roleid'] ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Role"> <i class="fa fa-pencil"></i> </a>
                        <?php 
                        
//                    } ?>
                    <?php if(checkPrivileges("Role","RoleDelete")){ ?>
                    <a class="btn btn-icon waves-effect color-dark waves-light sa-delete" id="<?= $role_info['roleid'] ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Role"> <i class="fa fa-trash" title="Inactive"></i> </a>                                                                          
                        <?php } ?>
                </div>
                <div class="contact-card m-t-30">

                    <!--                    <a class="pull-left" href="#">
                                            <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                        </a>-->

                    <div class="member-info">

                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $role_info['rolename']; ?></small></p>
                        <!--<p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $role_info['roledescription']; ?></small></p>-->
                        <!--<p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $role_info['displayname']; ?></small></p>-->
                        <?php foreach ($controllers as $ctrl_info) { ?>
                            <?= $ctrl_info['controllername'] ?><br>
                            <?php foreach ($actions_info[$ctrl_info['controllerid']] as $action_info) { ?>
                            <p class="text-dark"><i class="fa fa-caret-right m-r-10" style="font-weight: bold;"></i><small>
                                        <?php echo $action_info['controlleractionname']; ?></small></p>

                            <?php }
                        }
                        ?>
                    </div>

                </div>

                <!--</form>-->
            </div>
        </div>
    </div>
</div>
<script>

    _Url = '<?= base_url() ?>';

    !function ($) {
        "use strict";

        var SweetAlert = function () {
        };


        SweetAlert.prototype.init = function () {


            $('.sa-delete').click(function () {
                var id = $(this).attr("id");
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this record!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function (isConfirm) {
                    if (isConfirm) {
                        $.LoadingOverlay("show");
                        $.ajax({
                            type: "POST",
                            url: _Url + 'Role/deleteRole',
                            data: {id: id},
                            dataType: 'json',
                            success: function (data) {

                                $.LoadingOverlay("hide");

                                if (data['isError'] == "N") {
//                                    alert(data['message']);
                                    swal("Deleted!", data['message'], "success");
                                    location.reload();
                                } else {
                                    swal("Deleted!", data['message'], "error");
                                }
                            },
                            error: function (data) {

                            }
                        })

                    } else {
                        swal("Cancelled", "Your record is safe :)", "error");
                    }
                });
            });



        },
                $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
    }(window.jQuery),
            function ($) {
                "use strict";
                $.SweetAlert.init()
            }(window.jQuery);
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>