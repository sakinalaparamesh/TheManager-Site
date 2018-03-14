<form role="form" id="branch_form" method="post">
    
    <input type="hidden" name="branchid" value="<?php echo $details[0]['branchid']; ?>">
    <input type="hidden" name="clientid" value="<?php echo $details[0]['clientid']; ?>">
    
    <div class="form-group row">
        <label for="branchLocation" class="col-md-4">Branch Location<span class="text-danger">*</span></label>
        <div class="col-md-8">
            <input type="text" class="form-control input-sm" id="branchLocation" placeholder="Branch Location" name="branchLocation" value="<?php echo $details[0]['location']; ?>">
            <span class="text-danger" id="branchLocationErr">&nbsp;</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="branchAddress" class="col-md-4"> Address <span class="text-danger" >*</span></label>
        <div class="col-md-8">
            <textarea class="form-control" id="branchAddress" rows="3" name="branchAddress"><?php echo $details[0]['address']; ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="branchPhone" class="col-md-4"> Phone No </label>
        <div class="col-md-8">
            <input type="text"   class="form-control input-sm" id="branchPhone" placeholder="Phone No" name="branchPhone" value="<?php echo $details[0]['phonenumber']; ?>">
        </div>
    </div>
    <!-- <div class="form-group row">
        <label for="inputEmail3" class="col-md-1 col-md-offset-2"><div class="checkbox checkbox-inverse">
                <input id="checkbox2" type="checkbox" checked="">
                <label for="checkbox2">
                      Exclusieve Agent
                </label>
            </div> </label>

    </div> -->
    <div class="form-group row">
        <label for="branchFax" class="col-md-4">   Fax No  </label>
        <div class="col-md-8">
            <input type="text"   class="form-control input-sm" id="branchFax" placeholder="Fax No " name="branchFax" value="<?php echo $details[0]['faxnumber']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="branchEmail" class="col-md-4">   Email  </label>
        <div class="col-md-8">
            <input type="text"   class="form-control input-sm" id="branchEmail" placeholder="Email" name="branchEmail" value="<?php echo $details[0]['email']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="weburl" class="col-md-4">Web URL</label>
        <div class="col-md-8">
            <input type="text" name="weburl" id="weburl" class="form-control input-sm" placeholder="Web URL" value="<?php echo $details[0]['weburl']; ?>">
        </div>
    </div>

    <div class="form-group row ">
        <label class="col-md-4"></label>
        <div class=" col-md-8">
            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit" onclick="ValidateBranch();">
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
    
    function ValidateBranch() {

        var validator = $('#branch_form').data('bootstrapValidator');
        validator.validate();
        //alert(validator.isValid()); return false;
        var _Url = "<?php echo base_url(); ?>";
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'clients/saveBranchAjax',
                data: $('#branch_form').serialize(),
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
                    alert(data);
                }
            })
        }

    }
</script>
<script src="<?php echo base_url(); ?>assets/validations/branchValidation.js" type="text/javascript"></script>