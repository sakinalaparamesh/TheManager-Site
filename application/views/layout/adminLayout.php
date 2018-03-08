<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>The Manager | <?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/the-manager.css" rel="stylesheet" type="text/css" />
<!--        <link href="<?php echo base_url(); ?>plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <!--<link href="<?php //echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
       <!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css"> -->
         <!-- DataTables -->
        <link href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /><!--select2 CSS-->

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        
        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/extras/loadingoverlay_progress/loadingoverlay_progress.min.js"></script>
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
        <script src="<?php echo base_url()?>assets/js/jquery.validate.js" type="text/javascript"></script>
       
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
<!--        <script src="<?php echo base_url(); ?>plugins/bootstrap-table/js/bootstrap-table.js"></script>-->
        <!--for form validation-->
        <script src="<?php echo base_url(); ?>assets/pages/jquery.bs-table.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>plugins/parsleyjs/parsley.min.js"></script>

        <!--for sweet alert-->
        <script src="<?php echo base_url(); ?>plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/pages/jquery.sweet-alert.init.js"></script>
         <!-- Required datatable js -->
        <script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
        
        
        <!-- Responsive examples -->
        <script src="<?php echo base_url(); ?>plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>plugins/datatables/responsive.bootstrap4.min.js"></script>
        
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"> </script>
       


      
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
// $(document).ready(function(){
//    $(".openView").click(function(){
//
//      $(".test").removeClass('col-md-12').addClass('col-md-9');
//      $('.mini').show();
//    });
//
//    $(".closemini").click(function(){
//
//        $(".test").removeClass('col-md-9').addClass('col-md-12');
//        $('.mini').hide();
//      });
//
//
//});

     function closeSidebar(){
        document.getElementById("myListView").classList.remove("col-md-9");
        document.getElementById("myListView").classList.add("col-md-12");
        document.getElementById("DetailsView").style.display = "block";
     }

</script>
<!-- <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>-->

    </body>
</html>
