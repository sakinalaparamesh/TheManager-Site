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
                                    
                                    <button class="btn btn-icon waves-effect color-dark waves-light" onclick="addBranchForm('');"> <i class="fa fa-pencil" title="Edit Branch"></i> </button>
                                                                        
                                     
                                    <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-trash" title="Inactive"></i> </button>                                                                          
                                 
                                    </div>
                                    <div class="contact-card m-t-30">
                                
<!--                                <a class="pull-left" href="#">
                                    <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="">
                                </a>-->

                                <div class="member-info">
                                    
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details->controlleractionname; ?></small></p>
<!--                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small><?php echo $details->actioncodename; ?></small></p>-->
                                    
                                </div>

                            </div>
                                 
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
    </div>