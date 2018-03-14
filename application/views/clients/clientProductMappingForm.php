<form role="form" id="client_product_mapping_form" method="post">
    
    <input type="hidden" name="clientid" value="<?php echo $clientid; ?>">
    <input type="hidden" name="id" value="<?php echo $details[0]['id']; ?>">
    
    <div class="form-group row">
        <label for="clientname" class="col-md-3">Client Name</label>
        <div class="col-md-9">
            <?php echo $details[0]['clientname']; ?>
        </div>
    </div>    
    <?php /*  ?>
    <div class="form-group row">
        <label for="products" class="col-md-3">Products</label>
        <div class="col-md-9">
            <?php foreach($products as $prod){ ?>
            <input type="checkbox" name="products[]" id="products_<?php echo $prod['productid'];  ?>" value="<?php echo $prod['productid']; ?>" <?php if(in_array($prod['productid'],$details[0]['productid'])){ echo 'checked="checked"'; } ?> class="form-control input-sm">
            <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="" width="50">
            <?php echo $prod['productname']; ?>
            <?php } ?>
        </div>
    </div><?php */ ?>
    <div class="form-group row">
        <label for="products" class="col-md-3">Products</label>
        <div class="col-md-9">
            <?php if(count($details) > 0){
                foreach($details as $dt){ ?>
            <input type="checkbox" name="products[]" id="products_<?php echo $dt['productid'];  ?>" value="<?php echo $dt['productid']; ?>" <?php if($dt['clientid']){ echo 'checked="checked"'; } ?> class="form-control input-sm">
            <img class="rounded-circle" src="<?php echo base_url() ?>assets/images/users/avatar-6.jpg" alt="" width="50">
            <?php echo $dt['productname']; ?>
            <?php } } ?>
        </div>
    </div>
    <div class="form-group row ">
        <label class="col-md-4"></label>
        <div class=" col-md-8">
            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit" onclick="ValidateClientProductMapping();">
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
    
    function ValidateClientProductMapping() {

        var validator = $('#client_product_mapping_form').data('bootstrapValidator');
        validator.validate();
        //alert(validator.isValid()); return false;
        var _Url = "<?php echo base_url(); ?>";
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'clients/saveClientProductMapping',
                data: $('#client_product_mapping_form').serialize(),
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
<script src="<?php echo base_url(); ?>assets/validations/clientProductMappingValidation.js" type="text/javascript"></script>