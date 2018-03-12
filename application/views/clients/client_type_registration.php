<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <?php echo $this->breadcrumbs->show(); ?>
            </div>
            <h4 class="page-title"><?php echo $title; ?></h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form role="form" id="client_type">
                                <div class="form-group row">
                                    <label for="configuration_name" class="col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" required="" parsley-type="name" class="form-control input-sm" id="configuration_name" name="configuration_name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" rows="3" id="configuration_description" name="configuration_description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-2"></label>
                                    <div class=" col-md-4 ">
                                        <button type="submit" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                                            SUBMIT
                                        </button>
                                        <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                           CANCEL
                                        </button>
                                    </div>
                                </div>
                            </form>
    </div>
</div>
</div>
<!-- end page title end breadcrumb -->
</div> <!-- end container -->
</div>
<!-- end wrapper -->
 <script src="<?php echo base_url(); ?>assets/js/pages/administration/client_type.js" type="text/javascript"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
         var _baseUrl ='<?php echo base_url(); ?>';
         client_typejs.Load(_baseUrl);
     })
 </script>