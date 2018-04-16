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
        <form id="frmcontrolleraction">
            <div class="form-group row">
                                    <label for="controller_list" class="col-md-2">Controllers<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <select id="controllerlist" class="form-control input-sm" name="controllerid">
                                    <option value="" selected="selected">Select controller</option>
                                    <?php foreach($controllerlist as $list){ ?>                                    
                                    <option value="<?=$list['controllerid']?>"><?=$list['controllername']?></option>
 <?php } ?>
                                </select>
                            </div>
                                </div>
                                <div class="form-group row">
                                    <label for="displayname" class="col-md-2">Controller Action Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="controlleractionname" id="txtcontrolleractionname" parsley-type="controlleractionname" class="form-control input-sm" placeholder="Controller action Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                               
                                    <label for="displayname" class="col-md-2">Action Code Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="actioncodename" id="txtactioncodename" placeholder="Actioncodename" class="form-control input-sm">
                                    </div>
                                </div>                          
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">Action display name
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="actiondisplayname" id="txtactiondisplayname" placeholder="ActionDisplayName" class="form-control input-sm">
                                    </div>
                                </div>
                               
                                <div class="form-group row ">
                                    <div class=" col-md-4 col-md-offset-2">
                                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
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
 <script src="<?php echo base_url(); ?>assets/js/pages/controlleraction/controlleraction_js.js" type="text/javascript"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
         var _baseUrl ='<?php echo base_url(); ?>';
         controlleractionjs.Load(_baseUrl);
     })
 </script>
