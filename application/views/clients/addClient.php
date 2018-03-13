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
        <div class="col-md-12 text-center progress-loader">&nbsp;</div>
    </div>
<div class="row">
    <div class="col-md-12">
        <form id="MyForm" method="post" enctype="multipart/form-data" action="<?php echo base_url('clients/addClient'); ?>" class="form-horizontal" novalidate="" role="form">
            
            <input type="hidden" name="clientid" value="<?php echo $details[0]['clientid']; ?>">   
            
            <div class="form-group row">
                <label for="clientname" class="col-md-2">Name<span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" name="clientname" id="clientname" value="<?php echo $details[0]['clientname']; ?>" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="clientcode" class="col-md-2">Code</label>
                <div class="col-md-4">
                    <input type="text" class="form-control input-sm" name="clientcode" id="clientcode" value="<?php echo $details[0]['clientcode']; ?>" placeholder="Code">
                </div>
            </div>
            <div class="form-group row">
                <label for="client_type" class="col-md-2">Client Type<span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <select name="client_type" id="client_type" class="form-control input-sm">
                        <option value="">Select Client Type</option>
                        <?php foreach ($clientTypes as $ct){?>
                            <option value="<?php echo $ct['clientTypeId'] ?>" <?php if($ct['clientTypeId'] == $details[0]['client_type']){ echo 'selected="selected"'; } ?>><?php echo $ct['clientType'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="clientdescription" class="col-md-2"> Description</label>
                <div class="col-md-4">
                    <textarea class="form-control" name="clientdescription" id="clientdescription" rows="3"><?php echo $details[0]['clientdescription']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2"></label>
                <div class="col-md-4">
                    <div class="checkbox checkbox-inverse">
                        <input type="checkbox" name="is_individual" id="chk_is_individual" data-parsley-multiple="checkbox2" value="Y" <?php if($details[0]['clientdescription'] == 'Y'){ echo 'checked="checked"';} ?>>
                        <label for="chk_is_individual">
                              Individual
                        </label>
                    </div>
                </div>
            </div>
             <div class="form-group row">
                <label for="isactive" class="col-md-2"> Status<span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <div class="radio">
                        <div class="radio  form-check-inline">
                            <input type="radio" name="isactive" id="rb_isactive1" <?php if($details[0]['isactive'] == 'Y'){ echo 'checked="checked"'; }?> value="Y">
                            <label for="rb_isactive1"> Active </label>
                        </div>
                        <div class="radio form-check-inline">
                            <input type="radio" name="isactive" id="rb_isactive2" <?php if($details[0]['isactive'] == 'N'){ echo 'checked="checked"'; }?> value="N" disabled="">
                            <label for="rb_isactive2"> InActive </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row ">
                <label class="col-md-2"></label>
                <div class=" col-md-4">
                    <button type="submit" name="formSubmit" id="formSubmit" class="btn btn-default waves-effect waves-light btn-sm" onclick="ValidateMyForm();">
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
   
    ValidateForm();

});//ready
function ValidateMyForm(){
        var validator = $('#MyForm').data('bootstrapValidator');
              validator.validate();
              //alert(validator.isValid()); return false;
             if(validator.isValid()){

                  $("html").addClass( "loading" );
                  $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('clients/addClientAjax'); ?>", 
                      data: $('#MyForm').serialize(),
                      //data: form_data,
                      success: function(response){ //alert(response); return false; 

                          var json = $.parseJSON(response);
                          
                          $("html").removeClass( "loading" );
                         if(json.isError == 'N'){ 
                             //alert(json.isError); 
                             alert(json.message);
                              /*swal(
                                   {
                                    title: "Client Registration!",
                                    text: json.message,
                                    type: "success",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Ok",
                                    closeOnConfirm: false
                                  },
                                  function(){
                                    //window.location.reload();
                                    window.location.href = "<?php //echo base_url('clients'); ?>";
                                  }
                                 );*/
                                 window.location.href = "<?php echo base_url('clients'); ?>";
                         }else{
                            alert(json.message);
                            //swal("Client Registration!", json.message, "error");
                         }
                      },
                      error: function(){
                          alert('failure');
                          //swal("Client Registration!", 'Technical Error occured while saving..Please contact admin', "error");
                      }
                  });
             };
      }
</script>
<script src="<?php echo base_url(); ?>assets/validations/clientValidation.js"></script>