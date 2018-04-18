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

                    <a class="btn btn-icon waves-effect color-dark waves-light" href="<?= base_url() ?>Jobs/jobsForms/<?= $job_details['jobs_id'] ?>"> <i class="fa fa-pencil" title="Edit Role"></i> </a>

                    <!--<button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-dollar" title="Billing Contact"></i> </button>-->

                    <button class="btn btn-icon waves-effect color-dark waves-light sa-delete" id="<?= $job_details['jobs_id'] ?>"> <i class="fa fa-trash" title="Inactive"></i> </button>

                    <button class="btn btn-icon waves-effect color-dark waves-light" onclick="jobDisable('<?= $job_details['jobs_id'] ?>');"> <i class="fa fa-tasks" title="Assign Products"></i> </button>

                </div>
                <div class="contact-card m-t-30">

                    <!--                    <a class="pull-left" href="#">
                                            <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                        </a>-->

                    <div class="member-info">

                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $job_details['jobs_position']; ?></small></p>
                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $job_details['jobs_numberofposition']; ?></small></p>
                        <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $job_details['skillset']; ?></small></p>
                               
                    </div>

                </div>

                <!--</form>-->
            </div>
        </div>
    </div>
</div>
<script>

_Url='<?= base_url()?>';

    !function ($) {
        "use strict";

        var SweetAlert = function () {
        };

        
        SweetAlert.prototype.init = function () {
            
            
            $('.sa-delete').click(function () {
                var id=$(this).attr("id");
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
                            url: _Url + 'Jobs/delete_job',
                            data: {id: id},
                            dataType: 'json',
                            success: function (data) {

                                $.LoadingOverlay("hide");

                                if (data['isError'] == "N") {
//                                    alert(data['message']);
                                    swal("Deleted!",data['message'], "success");
                                    location.reload();
                                } else {
                                    swal("Deleted!",data['message'], "error");
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