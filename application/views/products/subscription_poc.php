<div class="card-box">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="frm_pocscription">
                <input type="hidden" name="subscription_id" value="<?= $subsrc_id ?>"/>
                <input type="hidden" name="poc_id" value="<?= @$details->poc_id ?>"/>
                <div class="form-group row">
                    <label for="poc_name" class="col-md-2">Name<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="poc_name" parsley-type="name" class="form-control input-sm" id="poc_name" placeholder="Name" value="<?= @$details->poc_name ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="poc_email" class="col-md-2">Email<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="poc_email" parsley-type="name" class="form-control input-sm" id="poc_email" placeholder="Email" value="<?= @$details->poc_email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="poc_phone" class="col-md-2">Phone<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="poc_phone" parsley-type="name" class="form-control input-sm" id="poc_phone" placeholder="Phone number" value="<?= @$details->poc_phone ?>">
                    </div>
                </div>

                <div class="form-group row ">
                    <div class=" col-md-12 text-center">
                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                            SUBMIT
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
        subscriptionpoc.Load(_baseUrl);
    });
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/scrb_poc.js" type="text/javascript"></script>