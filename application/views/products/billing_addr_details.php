<div class="card-box">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="frm_billing_conf">
                <input type="hidden" name="subscription_id" value="<?= $subsrc_id ?>"/>
                <input type="hidden" name="billing_address_id" value="<?= @$details->billing_address_id ?>"/>
                <div class="form-group row">
                    <label for="billing_address_contact_person" class="col-md-2">Billing Contact Person Name<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="billing_address_contact_person" parsley-type="name" class="form-control input-sm" id="billing_address_contact_person" placeholder="Billing Contact Person Name" value="<?= @$details->billing_address_contact_person ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="billing_address_contact_person_email" class="col-md-2">Billing Contact Person Email<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="billing_address_contact_person_email" parsley-type="name" class="form-control input-sm" id="billing_address_contact_person_email" placeholder="Email" value="<?= @$details->billing_address_contact_person_email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="billing_address_contact_person_mobile" class="col-md-2">Billing Contact Person Phone<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="billing_address_contact_person_mobile" parsley-type="name" class="form-control input-sm" id="billing_address_contact_person_mobile" placeholder="Billing Contact Person Phone" value="<?= @$details->billing_address_contact_person_mobile ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="billing_address" class="col-md-2">Billing Address<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" required="" name="billing_address" parsley-type="name" class="form-control input-sm" id="billing_address" placeholder="Billing Address" value="<?= @$details->billing_address ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="billing_address_currency_code" class="col-md-2">Billing Currency Code<span class="text-danger"></span></label>
                    <div class="col-md-7">
                        <select id="billing_address_currency_code" class="form-control input-sm" name="billing_address_currency_code">
                            <option value="">Please select currency code</option>
                            <?php foreach($currency_codes as $list){ ?>
                            <option value="<?=$list->currency_codes_id?>" <?=($list->currency_codes_id==@$details->billing_address_currency_code)?"selected":""?>><?=$list->currency_code?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="billing_address_currency_display" class="col-md-2">Billing Currency Display<span class="text-danger"></span></label>
                    <div class="col-md-7">
                        <input type="text" name="billing_address_currency_display" parsley-type="name" class="form-control input-sm" id="billing_address_currency_display" placeholder="Billing Currency Display" value="<?= @$details->billing_address_currency_display ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-2 control-label lable-font">Billing Cycle <span class="text-danger">*</span></label> 
                    <div class="col-md-4">
                        <input type="radio" name="billing_address_billingcycle" value="1"  checked> &nbsp; Yearly &nbsp;&nbsp;
                        <input type="radio" name="billing_address_billingcycle" value="2"  > &nbsp; Semester
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
        subscription_billing.Load(_baseUrl);
    });
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/scrb_billing_addr.js" type="text/javascript"></script>