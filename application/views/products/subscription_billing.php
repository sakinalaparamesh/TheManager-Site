<style>
    #abc input{
        padding:5px 0px 0px 5px;
        margin-top:10px;
        margin-left:24px !important;
    }
    .xyz{
        margin-left:10px;
    }
    .remove_field{
        padding: 1px 6px;
        margin: 10px;
        color:white;
        background-color:#c94b4b;
    }
    a .remove_field{
        text-decoration:none!important;
    }
    .hide{ display: none; }
</style>

<div class="card-box">
    <div class="row">
        <div class="col-md-12">
            <form role="form" id="billconfig_form">
                
                <input type="hidden" name="scrb_id" id="subscription_id" value="<?= $subsrc_id ?>"/>
                <input type="hidden" name="sub_billing_id" id="billing_configid"  value="<?php echo $details->sub_billing_id; ?>">
                
                <div class="form-group row">
                    <label for="company_name" class="col-md-4">Company Name<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-sm" name="company_name" id="company_name" value="<?php echo $details->subscriptions_company_name; ?>" placeholder="Company name" parsley-type="company_name"  readonly>
                    </div>
                </div>
<!--                <div class="form-group row">
                    <label for="measuring_unit" class="col-md-4">Measuring Unit<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control input-sm" name="measuring_unit" id="measuring_unit" value="<?php echo $config_info['measuring_unit']; ?>" placeholder="Measuring unit" parsley-type="measuring_unit" readonly>
                    </div>
                </div>-->
                <div class="form-group row">
                    <label for="recurring_duration" class="col-md-4">Billing Recurring Duration </label>
                    <div class="col-md-8">
                    <div class="radio form-check-inline">
                        <input type="radio" name="recurring_duration" id="recurring_duration_yearly" value="1" <?php if($details->sub_billing_recurrign_duration == 1){ echo 'checked'; } ?>>
                        <label for="recurring_duration_yearly"> Yearly</label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" name="recurring_duration" id="recurring_duration_monthly" value="2" <?php if($details->sub_billing_recurrign_duration == 2){ echo 'checked'; } ?>>
                        <label for="recurring_duration_monthly"> Monthly  </label>
                    </div>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="" class="col-md-3 control-label lable-font"></label> 
                    <div class="col-md-5">
                        <input type="radio" name="billing_type" id="billing_type_fixed" value="1" <?php if($details->sub_billing_type == 1){ echo 'checked'; } ?>> &nbsp; Fixed &nbsp;&nbsp;
                        <input type="radio" name="billing_type" id="billing_type_slab" value="2" <?php if($details->sub_billing_type == 2){ echo 'checked'; }else{echo 'checked';} ?>> &nbsp;Slab
                    </div>
                </div>
                
                <div id="parent_form" style="display:none;">
                    <div class="form-group row">
                        <label for="fixed_bill_rate" class="col-md-4">Amount<span class="text-danger">*</span></label>
                        <div class="col-md-3">
                            <input type="text" name="fixed_bill_rate" id="fixed_bill_rate" value="<?php echo $details->sub_billing_amount; ?>" placeholder="Enter Amount" class="form-control input-sm">
                        </div>
                        <div class="col-md-3">  /month</div>
                    </div>
                </div>
                
                <div id="child_form" style="display:none;">
                    <div class="row input_fields_wrap" id="abc">
                        
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-3 text-center">From</div>
                        <div class="col-md-2 text-center">To</div>
                        <div class="col-md-3 text-center">Rate</div>
                        
                        <?php 
                        $slablist= json_decode($details->sub_billing_slabs,TRUE);
                        if(count($slablist)>0){
                            $i=0;
                            foreach($slablist as $slb){ ?>
                            <div class="form-group row">
                                <label class="col-md-3"></label>
                                <div class="input col-md-9" >
                                    <input class="col-md-2" type="text" name="slab_from[]" value="<?php echo $slb['s_from']; ?>">
                                    <span class="xyz"><input class="col-md-2" type="text" name="slab_to[]" value="<?php echo $slb['s_to']; ?>"></span>
                                    <span class="xyz"><input class="col-md-2" type="text" name="slab_rate[]" value="<?php echo $slb['s_rate']; ?>"></span>
                                    <?php if($i == 0){ ?>
                                        <button class="add_field_button btn-success" style="margin-top:10px;">ADD</button>
                                    <?php }else{?>
                                        <a href="#" class="remove_field" style=""><i class="fa fa-times"></i></a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php $i++; }}else{ ?>
                            <div class="form-group row">
                                <label class="col-md-3"></label>
                                <div class="input col-md-9" >
                                    <input class="col-md-2" type="text" name="slab_from[]" value="">
                                    <span class="xyz"><input class="col-md-2" type="text" name="slab_to[]" value=""></span>
                                    <span class="xyz"><input class="col-md-2" type="text" name="slab_rate[]" value=""></span>
                                    <button class="add_field_button btn-success" style="margin-top:10px; margin-right: 94px;">ADD</button>
                                </div>
                            </div>
                        <?php } ?>
                        
                        <div class="form-group row hide" id="slabTemplate">
                            <label class="col-md-3"></label>
                            <div class="input col-md-9" >
                                <input class="col-md-2" type="text" name="slab_from[]" value="">
                                <span class="xyz"><input class="col-md-2" type="text" name="slab_to[]" value=""></span>
                                <span class="xyz"><input class="col-md-2" type="text" name="slab_rate[]" value=""></span>
                                <a href="#" class="remove_field" style="margin-right: 94px;"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="effective_from" class="col-md-4">Effective from<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" name="effective_from" id="effective_from" value="<?php echo date("Y-m-d", strtotime($details->sub_billing_effective_from)); ?>" placeholder="date" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="billing_currency" class="col-md-4">Billing Currency<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" name="billing_currency" id="billing_currency" value="<?php echo $details->sub_billing_currency; ?>" placeholder="Billing Currency" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group row ">
                   
                    <div class=" col-md-12 text-center">
                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">SUBMIT</button>
                        <!--<button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">CANCEL</button>-->
                        <button type="button" class="btn btn-inverse waves-effect m-l-5 btn-sm" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="<?php echo base_url(); ?>assets/js/pages/product_related/billing_config_validation.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
        billingConfigJS.Load(_baseUrl);
    });
</script>

<script type="text/javascript">
    function delete_dis(res) {
        var img = $(res).parent('.dis_img').attr('id');
        $(res).parent('.dis_img').remove();
    }
    function delete_block(res) {
        $(res).parent('.block').remove();
    }
    var _baseUrl = '<?php echo base_url(); ?>';
    
    $(document).ready(function () {

        $('.add_more').click(function (e) {
            e.preventDefault();
            var par = "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            var action = "$(this).parent('.uploadfl').next('.upload-file-info').html($(this).val());";
            var field = '<div class="block" style="margin-top:10px !important;">' +
                    '<div style="position:relative;">' +
                    '<a class="btn btn-primary uploadfl" href="javascript:;">Choose File...' +
                    '<input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=' + 0 + ');-ms-filter:' + par + ';opacity:0;background-color:transparent;color:transparent;" name="file[]" size="40"  onchange="' + action + '">' +
                    '</a>&nbsp;' +
                    '<span class="label label-info upload-file-info"></span>' +
                    '</div>' +
                    '<a class="delete-clr float-right"  style="position:relative;" onclick="delete_block(this)"><i class="fa fa-remove"></i></a>' +
                    '</div>';

            $(this).before(field);

        });
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        
        <?php if($details->sub_billing_type == 1){ ?>
            $('#parent_form').show();
        <?php }else{ ?>
            $('#child_form').show();
        <?php } ?>
        $("input[name='billing_type']").click(function () {
            var billingTypeStatus = $("input[name='billing_type']:checked").val();
            if (billingTypeStatus == 1) {
                $('#parent_form').show();
                $('#child_form').hide();
            } else {
                $('#parent_form').hide();
                $('#child_form').show();
            }
        });
    })
</script>
<script>
    $(document).ready(function () {
//        var max_fields = 50; //maximum input boxes allowed
//        var wrapper = $(".input_fields_wrap"); //Fields wrapper
//        var add_button = $(".add_field_button"); //Add button ID
//
//        var x = 1; //initlal text box count
//        $(add_button).click(function (e) { //on add input button click
//            e.preventDefault();
//            if (x < max_fields) { //max input box allowed
//                x++; //text box increment
//                $(wrapper).append('<div class="form-group row"><label class="col-md-3"></label><div class="input col-md-9"><input class="col-md-2" type="text" name="slab_from[]" value="" /><span class="xyz"><input class="col-md-2" type="text" name="slab_to[]" value="" /></span><span class="xyz"><input class="col-md-2" type="text" name="slab_rate[]" value="" /></span><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div></div>'); //add input box
//            }
//        });
//
//        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
//            e.preventDefault();
//            $(this).parent('div').remove();
//            x--;
//        })
    });
</script>