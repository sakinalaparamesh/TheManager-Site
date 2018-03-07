<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>The Manager | Provalley Solutions</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/the-manager.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <!--<link href="<?php //echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>

    </head>

    <body>

      <?php $this->view('header'); ?>
        

        <?php $flashmessage = $this->session->flashdata('flashmsg');
            if(isset($flashmessage)){ ?>
            <div class="row" style="line-height: 50px;">
                <div class="col-sm-12 text-center">
                    <?php echo $flashmessage; ?>
                </div>
            </div>
            <?php } ?>
        
      <?php echo $content_for_layout; ?> 
      
      <?php $this->view('footer'); ?>


        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
         <!--Page Leve Plugins--> 
       <script src="<?php echo base_url(); ?>plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/counterup/jquery.counterup.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/jquery-knob/jquery.knob.js"></script>
        <script src="<?php echo base_url(); ?>plugins/bootstrap-table/js/bootstrap-table.js"></script>
        <!--for form validation-->
        <script src="<?php echo base_url(); ?>assets/pages/jquery.bs-table.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/parsleyjs/parsley.min.js"></script>

        <!--for sweet alert-->
        <script src="<?php echo base_url(); ?>plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.sweet-alert.init.js"></script>
                


      
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
        <script type="text/javascript">
              jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });

        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>
        <script type="text/javascript">
 $(document).ready(function(){
    $(".openView").click(function(){

      $(".test").removeClass('col-md-12').addClass('col-md-9');
      $('.mini').show();
    });

    $(".closemini").click(function(){

        $(".test").removeClass('col-md-9').addClass('col-md-12');
        $('.mini').hide();
      });


});

</script>

    </body>
</html>