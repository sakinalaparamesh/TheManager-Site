<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?= base_url()?>assets/images/fevicon.png">

        <title>The Manager - Login</title>

        <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/css/modify.css" rel="stylesheet" type="text/css" />

        <script src="<?= base_url()?>assets/js/modernizr.min.js"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">    
        </div>
        <?php $flashmessage = $this->session->flashdata('flashmsg');
        if(isset($flashmessage)){ ?>
        <div class="row" style="line-height: 50px;">
            <div class="col-sm-12 text-center">
                <?php echo $flashmessage; ?>
            </div>
        </div>
        <?php } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                <div class="col-md-12 col-md-offset-3">
                   <div class="card-box">
                <div class="panel-heading">
                    <h4 class="text-center"> Login  <strong class="text-custom"></strong></h4>
                </div>


                <div class="p-20">
                    <form id="loginForm" method="post" class="form-horizontal m-t-20" action="Admin/login">

                        <div class="form-group ">
                            <div class="col-12">
                                <span><i class="fa fa-user"></i></span>
                                <input class="form-control" type="text" name="user_email" id="username" placeholder="Username" required="required" > 

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <span><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" name="current_password" id="password" placeholder="Password" required="required" >
                            </div>
                        </div>

                        <!-- <div class="form-group ">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div> -->

                        <div class="form-group text-center m-t-40">
                            <div class="col-12 ">
                                <button  type="submit" name="loginSubmit" id="btnsubmit" class="btn btn-block btn_submit text-uppercase waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div> 
                </div>
            </div>
        </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script>
$(document).ready(function() { 
    
    $("#loginForm").focus();
	
    $('#loginForm').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'The Email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The Email address is not valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Password is required and cannot be empty'
                    }
                }
            }
        }
    });//bootstrapValidator
});//ready
</script>
	
	</body>
</html>