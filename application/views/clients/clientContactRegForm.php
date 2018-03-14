<form role="form" id="branch_contact_form" method="post">
    
        <input type="hidden" name="branchcontactid" value="<?php echo $details[0]['branchcontactid']; ?>">
        <input type="hidden" name="clientbranchid" value="<?php echo $details[0]['clientbranchid']; ?>">
        <input type="hidden" name="ProfilePicPath1" value="<?php echo $details[0]['profilepic']; ?>">
        <input type="hidden" name="greetings1" value="<?php echo $details[0]['greetings']; ?>">
        <input type="hidden" name="isbillingcontact1" value="<?php echo $details[0]['isbillingcontact']; ?>">
    
        <div class="form-group row">
            <label for="title" class="col-md-4">Title<span class="text-danger">*</span></label>
            <div class="col-md-8">
                <input type="text" name="title" id="title" placeholder="Title" parsley-type="title" class="form-control input-sm" value="<?php echo $details[0]['title']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="personname" class="col-md-4">Name<span class="text-danger">*</span></label>
            <div class="col-md-8">
                <input type="text" name="personname" id="personname" placeholder="Name" parsley-type="personname" class="form-control input-sm" value="<?php echo $details[0]['personname']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="designation" class="col-md-4">Designation<span class="text-danger">*</span></label>
            <div class="col-md-8">
                <input type="text" name="designation" id="designation" parsley-type="designation" placeholder="Designation" class="form-control input-sm" value="<?php echo $details[0]['designation']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="mobilenumber" class="col-md-4">Mobile</label>
            <div class="col-md-8">
                <input type="text" name="mobilenumber" id="mobilenumber" placeholder="Mobile" parsley-type="mobilenumber" class="form-control input-sm" value="<?php echo $details[0]['mobilenumber']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4"> Email<span class="text-danger">*</span></label>
            <div class="col-md-8">
                <input type="text" name="email" id="email" parsley-type="email" class="form-control input-sm"  placeholder="Email" value="<?php echo $details[0]['email']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="greetings" class="col-md-4"> Greetings<span class="text-danger">*</span></label>
            <div class="col-md-8">
                <div class="radio">
                    <div class="radio  form-check-inline">
                    <input type="radio" name="greetings" id="rd_greetings1" value="Hari Raya" <?php if($details[0]['greetings'] == 'Hari Raya'){ echo 'checked="checked"'; }; ?>>
                    <label for="rd_greetings1"> Hari Raya </label>
                </div>
                <div class="radio form-check-inline">
                    <input type="radio" name="greetings" id="rd_greetings2" value="Deepavali" <?php if($details[0]['greetings'] == 'Deepavali'){ echo 'checked="checked"'; }; ?>>
                    <label for="rd_greetings2"> Deepavali </label>
                </div>
                <div class="radio  form-check-inline">
                    <input type="radio" name="greetings" id="rd_greetings3" value="Chinese New Year" <?php if($details[0]['greetings'] == 'Chinese New Year'){ echo 'checked="checked"'; }; ?>>
                    <label for="rd_greetings3"> Chinese New Year </label>
                </div>
                        </div>

            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-md-4"> Comments<span class="text-danger">*</span></label>
            <div class="col-md-8">
                <textarea name="comments" id="comments" class="form-control" rows="3"><?php echo $details[0]['comments']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">

            <label for="profilepic" class="col-md-4"> Profile Pic </label>
            <div class="col-md-8">
                <input type="file" name="profilepic" id="filestyle-0" class="filestyle col-md-3" data-buttonname="btn-primary"  tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                 <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0" class="btn btn-primary "> <span class="buttonText">Choose file</span></label></span></div>

        </div>
        <div class="form-group row">
          <label class="col-md-4"></label>
          <div class=" col-md-8 ">
          <div class="checkbox checkbox-inverse">
              <input type="checkbox" name="isbillingcontact" id="chk_isbillingcontact" value="Y">
                    <label for="chk_isbillingcontact">Billing Contact</label>
                </div>
                </div> 

        </div>


        <div class="form-group row ">
            <label class="col-md-4"></label>
            <div class="col-md-8">
                <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="success-alert" onclick="ValidateBranchContact();">
                    SUBMIT
                </button>
                <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                   CANCEL
                </button>
            </div>
        </div>
</form>
<script>
    $(document).ready(function(){ 
        
        ValidateForm();

    });//ready
    
    function ValidateBranchContact() { //alert("Hello");

        var validator = $('#branch_contact_form').data('bootstrapValidator');
        validator.validate();
        //alert(validator.isValid()); return false;
        var _Url = "<?php echo base_url(); ?>";
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'clients/saveBranchContactAjax',
                data: $('#branch_contact_form').serialize(),
                dataType: 'json',
                success: function (data) {
                    $.LoadingOverlay("hide");
                    
                    //console.log(data);
                    if (data['isError'] == "N") {
                        $("#CommonModal").modal('hide');
                        alert(data['message']);
                        window.location.href = "<?php echo base_url('clients') ?>";
                    }else{
                        alert(data['message']);
                    }
                },
                error: function (data) {
                    alert("Technical Error Occured");
                }
            })
        }

    }
</script>
<script src="<?php echo base_url(); ?>assets/validations/branchContactValidation.js" type="text/javascript"></script>
