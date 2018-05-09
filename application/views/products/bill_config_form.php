<style>
	 #abc input{
		padding:5px 0px 0px 5px;
		margin-top:10px;
		margin-left:30px !important;
		
	}
	.xyz{
	margin-left:20px;
	}
	.remove_field{
	
	
    padding: 1px 8px;
    margin: 10px;
	color:white;
	background-color:#c94b4b;
	
	}
	a .remove_field{
	text-decoration:none!important;
	}
</style>
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
                    <form role="form" id="frmproduct">
                        <input type="hidden" id="productid"  value="<?= (isset($product_info->productid)) ? @$product_info->productid : "" ?>">
                        <div class="form-group row">
                            <label for="txtProductName" class="col-md-2">Company Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="productname" parsley-type="name" class="form-control input-sm" id="txtProductName" placeholder="Company Name" value="<?= @$product_info->productname ?>"  readonly>
                            </div>
                        </div>
                         <div class="form-group row">
                           
                             <label for="" class="col-md-2">Measuring Unit</label>
                                                <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked>
                                                    <label for="inlineRadio1"> Condo</label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                                                    <label for="inlineRadio2"> Unit  </label>
                                                </div>
                                                 <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio3" value="option3" name="radioInline">
                                                    <label for="inlineRadio3"> Users </label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio4" value="option4" name="radioInline">
                                                    <label for="inlineRadio4"> Company </label>
                                                </div>
                        </div> 
                                
                            <div class="form-group row">
                                    <label for="" class="col-md-2 control-label lable-font"></label> 
                                    <div class="col-md-5">
                                        <input type="radio" name="IsParentMenu" value="1"  > &nbsp; Fixed &nbsp;&nbsp;
                                        <input type="radio" name="IsParentMenu" value="0" checked> &nbsp;Slab
                                    </div>
                                </div>
                                <div id="parent_form" style="display:none;">


                                </div>
                                <div id="child_form" style="display:none;">
                                 <div class="input_fields_wrap" id="abc">
                                     <div class="form-group row">
                                     <label class="col-md-2"></label>
    
<div class="input col-md-10" >
    From slab:<input type="text" name="mytext[]" >
    <span class="xyz">To slab:<input type="text" name="mytext[]" ></span>
 <button class="add_field_button btn-success" style="margin-top:20px;">ADD</button>


    </div>
                                    
</div>
                                        </div>
                                    


                                </div>
                        <div class="form-group row">

                            <label for="Product_code" class="col-md-2"></label>
                            <div class="col-md-4">
                                <input id="txtProductCode" name="amount" type="text" placeholder="Enter Amount" required="" class="form-control input-sm" value="<?= @$product_info->productcode ?>">
                            </div>
                           
                        </div>
                       

                        <div class="form-group row">

                            <label for="Product_code" class="col-md-2">Billing Currency<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="txtProductCode" name="productcode" type="text" placeholder="Billing Currency" required="" class="form-control input-sm" value="<?= @$product_info->productcode ?>">
                            </div>
                        </div><div class="form-group row">
                           
                             <label for="" class="col-md-2">Billing Recurring Duration </label>
                                                <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio6" value="option6" name="radioInline" checked >
                                                    <label for="inlineRadio6"> Yearly</label>
                                                </div>
                                                <div class="radio form-check-inline">
                                                    <input type="radio" id="inlineRadio7" value="option7" name="radioInline">
                                                    <label for="inlineRadio7"> Monthly  </label>
                                                </div>
                                                
                        </div>
                        
                     
           

                        <div class="form-group row ">
                            <label  class="col-md-2"></label>
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
<script src="<?php echo base_url(); ?>assets/validations/productValidation.js" type="text/javascript"></script>

<script type="text/javascript">
                                    function delete_dis(res) {
                                        var img = $(res).parent('.dis_img').attr('id');
//        $.LoadingOverlay("show");
                                        $(res).parent('.dis_img').remove();
//        alert(img);
//        $.ajax({
//            type: "POST",
//            url: _Url + 'EmailTemplates/deleteImage',
//            data: {img: img},
//            success: function (data) {
//                $.LoadingOverlay("hide");
//                $(res).parent('.dis_img').remove();
//                alert("Deleted successfully");
//            },
//            error: function (data) {
//            }
//        })

                                    }
                                    function delete_block(res) {

                                        $(res).parent('.block').remove();
                                    }
                                    var _baseUrl = '<?php echo base_url(); ?>';
                                    $(document).ready(function () {

                                        productjs.Load(_baseUrl);

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
                                        /* $('.add_more').click(function (e) {
                                         e.preventDefault();
                                         var field = "<div class='block' style='margin-top:10px !important;'>" +
                                         "<div style='position:relative;'>" +
                                         "<a class='btn btn-primary' href='javascript:;'>Choose File..." +
                                         "<input type='file' style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';opacity:0;background-color:transparent;color:transparent;' name='file[]' size='40'  onchange='$('#upload-file-info').html($(this).val());'>" +
                                         "</a>&nbsp;" +
                                         "<span class='label label-info' id='upload-file-info'></span>" +
                                         "</div>" +
                                         "<a class='delete-clr float-right'  style='position:relative;' onclick='delete_block(this)'><i class='fa fa-remove'></i></a>" +
                                         "</div>";
                                         $(this).before(field);
                                         //                                                    $(this).before("<div class='block'><input name='file[]' type='file'/><a class='delete-clr float-right' onclick='delete_block(this)'>X</a></div>");
                                         });*/
                                    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#child_form').show();
        $("input[name='IsParentMenu']").click(function () {
            var ParentMenuStatus = $("input[name='IsParentMenu']:checked").val();
            if (ParentMenuStatus == 1) {
                $('#IsParentMenu').show();
                $('#child_form').hide();
            } else {
                $('#parent_form').hide();
                $('#child_form').show();
            }
        });
        var _baseUrl = '<?php echo base_url(); ?>';
        menujs.Load(_baseUrl);
    })
</script>
<script>
$(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><label class="col-md-2"></label><div class="col-md-9">From Slab:<input type="text" name="mytext[]"/><span class="xyz">To Slab<input type="text" name="mytext[]"/></span><a href="#" class="remove_field"><i class="fa fa-times"></i></a></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>