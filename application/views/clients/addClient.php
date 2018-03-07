<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <?php echo $this->breadcrumbs->show(); ?>
            </div>
            <h4 class="page-title">Client Registration</h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form id="MyForm" method="post" enctype="multipart/form-data" action="<?php echo base_url('clients/addClient'); ?>" class="form-horizontal" novalidate="" role="form">
            
            <input type="hidden" name="clientid" value="<?php echo $details[0]['clientid']; ?>">   
            
            <div class="form-group row">
                <label for="clientname" class="col-md-2">Name<span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" name="clientname" id="clientname" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="clientcode" class="col-md-2">Code</label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" name="clientcode" id="clientcode" placeholder="Code">
                </div>
            </div>
            <div class="form-group row">
                <label for="clientdescription" class="col-md-2"> Description</label>
                <div class="col-md-4">
                    <textarea class="form-control" name="clientdescription" id="clientdescription" rows="3"></textarea>
                </div>
            </div>
             <div class="form-group row">
                <label for="isactive" class="col-md-2"> Status<span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <div class="radio">
                        <div class="radio  form-check-inline">
                            <input type="radio" name="isactive" id="rb_isactive1" <?php if($details[0]['isactive'] == 1){ echo 'checked="checked"'; }?> value="1">
                            <label for="rb_isactive1"> Active </label>
                        </div>
                        <div class="radio form-check-inline">
                            <input type="radio" name="isactive" id="rb_isactive2" <?php if($details[0]['isactive'] == 0){ echo 'checked="checked"'; }?> value="0" disabled="">
                            <label for="rb_isactive2"> InActive </label>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="form-group row">
                <label class="col-md-2"></label>
                <div class="col-md-4">
                    <div class="checkbox checkbox-inverse">
                        <input id="checkbox2" type="checkbox" checked="" data-parsley-multiple="checkbox2">
                        <label for="checkbox2">
                              Individual
                        </label>
                    </div>
                </div>
            </div>-->

            <div class="form-group row ">
                <label class="col-md-2"></label>
                <div class=" col-md-4">
                    <!--<button type="submit" name="formSubmit" class="btn btn-default waves-effect waves-light btn-sm" id="success-alert">-->
                    <button type="submit" name="formSubmit" class="btn btn-default waves-effect waves-light btn-sm" >
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

<script>
     $(document).ready(function(){
        //alert('Hello');


});
</script>
<script src="<?php echo base_url(); ?>assets/validations/clientValidation.js"></script>