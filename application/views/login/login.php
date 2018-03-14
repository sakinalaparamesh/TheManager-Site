<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url()?>Login"><b>Administration Login</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!--<p class="login-box-msg">Sign in to start your session</p>-->
      <p class="login-box-msg"><?php echo ucwords(trim($this->config->item('admin_url_path'),'/')); ?> Login</p>
       <p class="login-box-msg">
      <?php $flashmessage = $this->session->flashdata('flashmsg');
        if(isset($flashmessage)){ ?>
        <div class="row" style="line-height: 50px;">
            <div class="col-sm-12 text-center">
                <?php echo $flashmessage; ?>
            </div>
        </div>
        <?php } ?>
    </p>
    <form id="loginForm" method="post" action="<?php echo base_url().$this->config->item('login').'login'; ?>" novalidate="">
      <div class="form-group has-feedback">
          <input  name="email" id="email" type="email" class="form-control" placeholder="Email">
        <?php echo form_error('email'); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <?php echo form_error('password'); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
<!--            <label>
              <input type="checkbox"> Remember Me
            </label>-->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="AdminSubmit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
   

<script>
$(document).ready(function() { 
    
    $("#email").focus();
	
    $('#loginForm').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
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
