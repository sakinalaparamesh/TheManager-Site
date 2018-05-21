<div class="card-box">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="frmsubscription">
                <input type="hidden" name="scrb_id" value="<?= $subsrc_id ?>"/>
                
                <div class="form-group row">
                    <label for="scrb_act_or_de_comments" class="col-md-5">Comments</label>
                    <div class="col-md-7">
                        <textarea class="form-control" id="scrb_act_or_de_comments" rows="3" name="scrb_act_or_de_comments"><?= @$product_info->scrb_act_or_de_comments ?></textarea>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="scrb_deact_date" class="col-md-5">Date of deactivation</label>
                    <div class="col-md-7">
                        <input id="scrb_deact_date" name="scrb_deact_date" type="text" placeholder="Date of deactivation"  class="form-control input-sm datepicker_common" value="<?= @$product_info->scrb_act_or_de_paid_on ?>">
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
        subscription.Load(_baseUrl);
    })
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/deactive_scrb.js" type="text/javascript"></script>