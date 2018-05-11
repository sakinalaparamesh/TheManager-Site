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
                                    
                                    <a class="btn btn-icon waves-effect color-dark waves-light btn_padding" data-toggle="tooltip" data-placement="bottom" title="Approve" onclick="billing('<?=$sub_info->subscriptions_id?>')"> <i class="fa fa-pencil"></i> </a>
                                    <a class="btn btn-icon waves-effect color-dark waves-light btn_padding" data-toggle="tooltip" data-placement="bottom" title="Approve" onclick="activeSubscription('<?=$sub_info->subscriptions_id?>')"> <i class="fa fa-pencil"></i> </a>                                    
                                     
                                    
                                    </div>
                                    <div class="contact-card m-t-30">
                                
<!--                                <a class="pull-left" href="#">
                                    <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                </a>-->

                                <div class="member-info">
                                    
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $sub_info->subscriptions_code; ?></small></p>
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $sub_info->subscriptions_company_name; ?></small></p>
                                    
                                </div>

                            </div>
                                 
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
    </div>