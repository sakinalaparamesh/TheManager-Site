<style>
    input[type=radio] {
        margin-left: 1px;
    }
</style>
<div class="form-group row">
    <label for="subscriptions_status_drop" class="col-md-2">Select Action<span class="text-danger"></span></label>
    <div class="col-md-7">
        <select id="subscriptions_status_drop" class="form-control input-sm" name="subscriptions_status_drop">
            <option value="0">Please select status</option>
            <?php if ($company->subscriptions_status < 2) { ?>
                <option value="2">Paid Amount</option>
            <?php }if ($company->subscriptions_status < 3) { ?>
                <option value="3">Ready For Use</option>
            <?php }if ($company->subscriptions_status < 4) { ?>
                <option value="4">Active</option>
            <?php } ?>
            <option value="5">DeActive</option>
        </select>
    </div>
</div>

<div id="act_2" style="display:none">
    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="frmsubscription2">
                    <input type="hidden" name="scrb_id" value="<?= $subsrc_id ?>"/>
                    <input type="hidden" name="subscriptions_status" value="2"/>
                    <div class="form-group row">
                        <label for="subscriptions_company_name" class="col-md-5">Company Name<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="text" readonly="" name="subscriptions_company_name" parsley-type="name" class="form-control input-sm" id="subscriptions_company_name" placeholder="Company Name" value="<?= @$company->subscriptions_company_name ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="scrb_act_or_de_pay_by" class="col-md-5">Paid By<span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input id="scrb_act_or_de_pay_by" name="scrb_act_or_de_pay_by" type="text" placeholder="Paid By" required="" class="form-control input-sm" value="<?= @$product_info->scrb_act_or_de_pay_by ?>">
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
                            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit2">
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
</div>
<div id="act_3" style="display:none">
    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="frmsubscription3">
                    <input type="hidden" name="scrb_id" value="<?= $subsrc_id ?>"/>
                    <input type="hidden" name="subscriptions_status" value="3"/>
                    <div class="form-group row">
                        <label for="scrb_act_or_de_comments" class="col-md-5">Comments</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="scrb_act_or_de_comments" rows="3" name="scrb_act_or_de_comments"><?= @$product_info->scrb_act_or_de_comments ?></textarea>
                        </div>
                    </div>
                    <!--                <div class="form-group row">
                                        <label for="scrb_deact_date" class="col-md-5">Date of deactivation</label>
                                        <div class="col-md-7">
                                            <input id="scrb_deact_date" name="scrb_deact_date" type="text" placeholder="Date of deactivation"  class="form-control input-sm datepicker_common" value="<?= @$product_info->scrb_act_or_de_paid_on ?>">
                                        </div>
                                    </div>-->
                    <div class="form-group row ">
                        <div class=" col-md-12 text-center">
                            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit3">
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
</div>
<div id="act_4" style="display:none">
    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="frmsubscription4">
                    <input type="hidden" name="scrb_id" value="<?= $subsrc_id ?>"/>
                    <input type="hidden" name="subscriptions_status" value="4"/>
                    <div class="form-group row">
                        <label for="scrb_act_or_de_comments" class="col-md-5">Comments</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="scrb_act_or_de_comments" rows="3" name="scrb_act_or_de_comments"><?= @$product_info->scrb_act_or_de_comments ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class=" col-md-12 text-center">
                            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit4">
                                SUBMIT
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="act_5" style="display:none">
    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="frmsubscription5">
                    <input type="hidden" name="scrb_id" value="<?= $subsrc_id ?>"/>
                    <input type="hidden" name="subscriptions_status" value="5"/>
                    <div class="form-group row">
                        <label for="scrb_act_or_de_comments" class="col-md-5">Comments</label>
                        <div class="col-md-7">
                            <textarea class="form-control" id="scrb_act_or_de_comments" rows="3" name="scrb_act_or_de_comments"><?= @$product_info->scrb_act_or_de_comments ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class=" col-md-12 text-center">
                            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit5">
                                SUBMIT
                            </button>

                        </div>
                    </div>
                </form>
            </div>
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
                if ($(this).val() == '2') {
                    $(".scrb_cheque_no").show();
                } else {
                    $(".scrb_cheque_no").hide();
                }
            } else {
                $(".parent_cn").hide();
                $(".scrb_cheque_no").hide();
            }
        });
        $("#subscriptions_status_drop").change(function () {
            var val = $(this).val();
            switch (val) {
                case "2":
                    $("#act_2").show();
                    $("#act_3").hide();
                    $("#act_4").hide();
                    $("#act_5").hide();
                    break;
                case "3":
                    $("#act_2").hide();
                    $("#act_3").show();
                    $("#act_4").hide();
                    $("#act_5").hide();
                    break;
                case "4":
                    $("#act_2").hide();
                    $("#act_3").hide();
                    $("#act_4").show();
                    $("#act_5").hide();
                    break;
                case "5":
                    $("#act_2").hide();
                    $("#act_3").hide();
                    $("#act_4").hide();
                    $("#act_5").show();
                    break;
                default:
                    $("#act_2").show();
                    $("#act_3").show();
                    $("#act_4").show();
                    $("#act_5").show();
            }
        });
        subscription.Load(_baseUrl);
    })
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/active_scrb.js" type="text/javascript"></script>