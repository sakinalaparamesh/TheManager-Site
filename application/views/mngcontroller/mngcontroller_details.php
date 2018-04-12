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
                                    
                                    <a class="btn btn-icon waves-effect color-dark waves-light" href="<?= base_url() ?>mngcontroller/addoredit/<?= $details->controllerid ?>"> <i class="fa fa-pencil" title="Edit Controller"></i> </a>
                                                                        
                                     
                                   <a class="btn btn-icon waves-effect color-dark waves-light mng_sa-delete" id="<?= base_url() ?>mngcontroller/delete_mngcontroller/<?= $details->controllerid ?>"> <i class="fa fa-trash" title="Inactive"></i> </a>                                                                          
                                 
                                    </div>
                                    <div class="contact-card m-t-30">
                                
<!--                                <a class="pull-left" href="#">
                                    <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                </a>-->

                                <div class="member-info">
                                    
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details->controllername; ?></small></p>
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details->displayname; ?></small></p>
                                    
                                    
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
            
            
            $('.mng_sa-delete').click(function () {
                var controllerid=$(this).attr("id");
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
                }, 
                    function (isConfirm) {
                       alert(controllerid);
                    if (isConfirm) {
                        $.LoadingOverlay("show");
                        $.ajax({
                            type: "POST",
                            url: _Url + 'MngController/delete_mngcontroller',
                            data: {controllerid: controllerid},
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
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
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