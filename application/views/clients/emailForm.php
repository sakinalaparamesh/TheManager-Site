<form role="form" id="template_form" method="post">
    
    <!--<input type="hidden" name="branchid" value="<?php //echo $details[0]['branchid']; ?>">-->
    <!--<input type="hidden" name="clientid" value="<?php //echo $details[0]['clientid']; ?>">-->
    
    <div class="form-group row">
        <label for="template_id" class="col-md-4">Email Template<span class="text-danger">*</span></label>
        <div class="col-md-8">
            <select name="template_id" id="template_id">
                <option value="">Select Email Template</option>
                <?php foreach($templates_list as $tmpl){ ?>
                <option value="<?php echo $tmpl['template_id']; ?>"><?php echo $tmpl['template_title']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="form-group row ">
        <label class="col-md-4"></label>
        <div class=" col-md-8">
            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit" onclick="ValidateTemplate();">
                Send
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

    function ValidateTemplate() {
        
        
        var template_id = $("#template_id").val();
        var allids = new Array();
        //var clientid = new Array();
       // var branchid = new Array();
        //var contactid = new Array();
        
        var allidsjson = [];
        
        $('input[name^="client_check"]').each(function() {
            if($(this).is(":checked")){
                //allids.push("clientid" : $(this).data('clientid'), "branchid" : $(this).data('branchid'));
                //allids.push($(this).data('branchid'));
                //allids.push($(this).data('contactid'));
                //allidsjson = { "allids" :[{"clientid" : $(this).data('clientid'), "branchid" : $(this).data('branchid'), "contactid" : $(this).data('contactid')}]};
                allidsjson.push({ "clientid" : $(this).data('clientid'), "branchid" : $(this).data('branchid'), "contactid" : $(this).data('contactid') });
            }
        });
        //alert(allids);

        var validator = $('#template_form').data('bootstrapValidator');
        validator.validate();
        //alert(validator.isValid()); return false;
        var _Url = "<?php echo base_url(); ?>";
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'clients/sendEmailAjax',
                //data: $('#template_form').serialize(),
                data: { template_id : template_id, allids : allidsjson },
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
<script src="<?php echo base_url(); ?>assets/validations/templateValidation.js" type="text/javascript"></script>