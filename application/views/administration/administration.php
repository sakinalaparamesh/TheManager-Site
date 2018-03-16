<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <?php //echo $this->breadcrumbs->show(); ?>
                    </div>
                    <h4 class="page-title"><?php echo $title; ?></h4>

                </div>
            </div>
        </div>
        <?php foreach($main_menu as $main_list){ ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        
                    </div>
                    <h6 class="page-title"><?php echo $main_list['display_name']; ?></h6>

                </div>
            </div>
        </div>
        <div class="row">
<?php foreach($sub_menu[$main_list['menu_id']] as $sub_list){ ?>
            <div class="col-md-3">
                <a href="<?= base_url().$sub_list['menu_url'] ?>"><div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-dark pull-left">
                            <i class="<?=$sub_list['menu_icon']?> text-white"></i>
                        </div>
                        <div class="text-right">
                            <h5 class="text-dark"><span class=""><b><?=$sub_list['display_name']?></b></span></h5>
                            <!--<p class="text-muted mb-0 "><b class="badge badge-inverse counter">15</b></p>-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>

     <?php } ?>       
            
            
        </div>
        <?php } ?>
        
        
        

        <!-- end page title end breadcrumb -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
