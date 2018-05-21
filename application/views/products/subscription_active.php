<style>
    input[type=radio] {
            margin-left: 1px;
    }
</style>
<div class="card-box">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="frmsubscription">
                <input type="hidden" name="scrb_id" value="<?= $subsrc_id ?>"/>
                <div class="form-group row">
                    <label for="subscriptions_company_name" class="col-md-5">Company Name<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input type="text" readonly="" name="subscriptions_company_name" parsley-type="name" class="form-control input-sm" id="subscriptions_company_name" placeholder="Company Name" value="<?= @$company ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scrb_act_date" class="col-md-5">Date of activation<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input id="scrb_act_date" name="scrb_act_date" type="text" placeholder="Date of activation" required="" class="form-control input-sm datepicker_common" value="<?= @$product_info->scrb_act_date ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="scrb_act_or_de_paid_amt" class="col-md-5">Initial paid amount<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input id="scrb_act_or_de_paid_amt" required="" name="scrb_act_or_de_paid_amt" type="text" placeholder="Initial paid amount"  class="form-control input-sm" value="<?= @$product_info->scrb_act_or_de_paid_amt ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-5 control-label lable-font">Payment Methods <span class="text-danger">*</span></label> 
                    <div class="col-md-7">
                        <input type="radio" name="scrb_act_or_de_paymethod" value="1"  checked> &nbsp; Cash &nbsp;&nbsp;
                        <input type="radio" name="scrb_act_or_de_paymethod" value="2"  > &nbsp; Cheque&nbsp;&nbsp;
                        <input type="radio" name="scrb_act_or_de_paymethod" value="3"  > &nbsp; Online
                    </div>
                </div>
                <div class="form-group row scrb_cheque_no" style="display:none;">
                    <label for="scrb_cheque_no" class="col-md-5">Cheque Number<span class="text-danger">*</span></label>
                    <div class="col-md-7">
                        <input id="scrb_cheque_no" required="" name="scrb_cheque_no" type="text" placeholder="Cheque Number"  class="form-control input-sm" value="<?= @$product_info->scrb_cheque_no ?>">
                    </div>
                </div>
                <div class="parent_cn" style="display:none;">
                    <div class="form-group row">
                        <label for="scrb_bank_name" class="col-md-5">Bank name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input id="scrb_bank_name" required="" name="scrb_bank_name" type="text" placeholder="Bank name"  class="form-control input-sm" value="<?= @$product_info->scrb_bank_name ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="scrb_act_or_de_trn_ref_num" class="col-md-5">Transaction Reference Number<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input id="scrb_act_or_de_trn_ref_num" required="" name="scrb_act_or_de_trn_ref_num" type="text" placeholder="Transaction Reference Number"  class="form-control input-sm" value="<?= @$product_info->subscriptions_cmp_email ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scrb_act_or_de_pay_received_by" class="col-md-5">Payment Received By</label>
                    <div class="col-md-7">
                        <input id="scrb_act_or_de_pay_received_by" name="scrb_act_or_de_pay_received_by" type="text" placeholder="Payment Received By"  class="form-control input-sm" value="<?= @$product_info->scrb_act_or_de_pay_received_by ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scrb_act_or_de_paid_on" class="col-md-5">Paid on</label>
                    <div class="col-md-7">
                        <input id="scrb_act_or_de_paid_on" name="scrb_act_or_de_paid_on" type="text" placeholder="Paid on"  class="form-control input-sm datepicker_common" value="<?= @$product_info->subscriptions_cmp_email ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="scrb_act_or_de_comments" class="col-md-5">Comments</label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="scrb_act_or_de_comments" rows="3" name="scrb_act_or_de_comments"><?= @$product_info->scrb_act_or_de_comments ?></textarea>
                    </div>
                </div>

                <div class="form-group row ">
                    <div class=" col-md-12 text-center">
                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                            SUBMIT
                        </button>
<!--                        <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                            CANCEL
                        </button>-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
//        var todaysDate = new Date();
        $('.datepicker_common').datepicker({
            autoclose: true,
            format: 'mm/dd/yyyy',
//            endDate: todaysDate,
            todayBtn: "linked",
            todayHighlight: true
        });
        $("input[name=scrb_act_or_de_paymethod]").change(function () {
            if ($(this).val() != '1') {
                $(".parent_cn").show();
                if($(this).val()=='2'){
                   $(".scrb_cheque_no").show(); 
                }else{
                    $(".scrb_cheque_no").hide();
                }
            } else {
                $(".parent_cn").hide();
                $(".scrb_cheque_no").hide(); 
            }
        });
        subscription.Load(_baseUrl);
    })
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/active_scrb.js" type="text/javascript"></script>