<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <?php echo $this->breadcrumbs->show(); ?>
                    </div>
                    <h4 class="page-title"><?php echo $title; ?></h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" id="frmsubscription">
                        <input type="hidden" name="subscriptions_id" value="<?= $sub_id ?>"/>
                        <div class="form-group row">
                            <label for="subscriptions_prd_id" class="col-md-2">Product Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <select id="subscriptions_prd_id" class="form-control input-sm" name="subscriptions_prd_id" required="">
                                    <?php foreach ($Products->result_array() as $list) { ?>
                                        <option value="<?= $list['productid'] ?>"><?= $list['productname'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subscriptions_company_name" class="col-md-2">Company Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="subscriptions_company_name" parsley-type="name" class="form-control input-sm" id="subscriptions_company_name" placeholder="Company Name" value="<?= @$product_info->subscriptions_company_name ?>">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="subscriptions_reg_number" class="col-md-2">Company Registration Number<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="subscriptions_reg_number" name="subscriptions_reg_number" type="text" placeholder="Company Registration Number" required="" class="form-control input-sm" value="<?= @$product_info->subscriptions_reg_number ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subscriptions_cmp_email" class="col-md-2">Company Email<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="subscriptions_cmp_email" required="" name="subscriptions_cmp_email" type="text" placeholder="Company Email"  class="form-control input-sm" value="<?= @$product_info->subscriptions_cmp_email ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subscriptions_cmp_phone" class="col-md-2">Company Phone Number<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="subscriptions_cmp_phone" required="" name="subscriptions_cmp_phone" type="text" placeholder="Company Phone Number"  class="form-control input-sm" value="<?= @$product_info->subscriptions_cmp_phone ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2">Company Point of contact<span class="text-danger">*</span></label>
                            <div class="col-md-2">
                                <input id="subscriptions_cmp_pc_pname" name="subscriptions_cmp_pc_pname" type="text" placeholder="Person Name"  class="form-control input-sm" value="<?= @$product_info->subscriptions_cmp_pc_pname ?>">
                            </div>
                            <div class="col-md-2">
                                <input id="subscriptions_cmp_pc_pemail" name="subscriptions_cmp_pc_pemail" type="text" placeholder="Person Email"  class="form-control input-sm" value="<?= @$product_info->subscriptions_cmp_pc_pemail ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subscriptions_cmp_login" class="col-md-2">Company Login</label>
                            <div class="col-md-4">
                                <input id="subscriptions_cmp_login" name="subscriptions_cmp_login" type="text" placeholder="Company Login"  class="form-control input-sm" value="<?= @$product_info->product_id ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label lable-font">Is <span class="text-danger">*</span></label> 
                            <div class="col-md-4">
                                <input type="radio" name="subscriptions_cmp_type" value="1"  checked> &nbsp; Individual &nbsp;&nbsp;
                                <input type="radio" name="subscriptions_cmp_type" value="2"  > &nbsp; Group
                            </div>
                        </div>

                        <div class="form-group row parent_cn" style="display:none;">
                            <label for="subscriptions_cmp_parent" class="col-md-2">Parent Company Name<span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <select id="subscriptions_cmp_parent" class="form-control input-sm" name="subscriptions_cmp_parent">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subscriptions_cmp_address" class="col-md-2">Communication Address</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="subscriptions_cmp_address" rows="3" name="subscriptions_cmp_address"><?= @$product_info->subscriptions_cmp_address ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 control-label lable-font">Status <span class="text-danger">*</span></label> 
                            <div class="col-md-4">
                                <input type="radio" name="subscriptions_status" value="1"  checked> &nbsp; Just Subscribed &nbsp;&nbsp;
                                <input type="radio" name="subscriptions_status" value="2"  > &nbsp; In progress &nbsp;&nbsp;
                                <input type="radio" name="subscriptions_status" value="3" > &nbsp; Ready for activate
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class=" col-md-4 col-md-offset-2">
                                <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                                    SUBMIT
                                </button>
                                <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                    CANCEL
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';

        $('input[type=radio][name=subscriptions_cmp_type]').change(function () {

            if (this.value == '2') {
                $.LoadingOverlay("show");
                $.ajax({
                    type: "GET",
                    url: _baseUrl + 'Clients/getClients',
                    data: {pid: $("#subscriptions_prd_id").val()},
                    dataType: 'json',
                    success: function (data) {
                        $.LoadingOverlay("hide");
//                        console.log(data);
                        var html = '';
                        for (var i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i]['clientid'] + '">' + data[i]['clientname'] + '</option>';
                        }
                        document.getElementById("subscriptions_cmp_parent").innerHTML = html;
                        $(".parent_cn").show();
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        alert("Error");
                        alert(xhr.responseText);
                    }
                });

            }
        });
        
        subscription.Load(_baseUrl);
    })
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/add_subscription.js" type="text/javascript"></script>
