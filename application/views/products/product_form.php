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
                            <label for="txtProductName" class="col-md-2">Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="productname" parsley-type="name" class="form-control input-sm" id="txtProductName" placeholder="Product Name" value="<?= @$product_info->productname ?>">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="Product_code" class="col-md-2">Subscription code<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="txtProductCode" name="productcode" type="text" placeholder="Product code" required="" class="form-control input-sm" value="<?= @$product_info->productcode ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hori-pass2" class="col-md-2">Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="txtProductDescription" rows="3" name="productdescription"><?= @$product_info->productdescription ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_url" class="col-md-2">Product URL</label>
                            <div class="col-md-4">
                                <input id="product_url" name="product_url" type="text" placeholder="Product URL"  class="form-control input-sm" value="<?= @$product_info->product_url ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_id" class="col-md-2">Product ID</label>
                            <div class="col-md-4">
                                <input id="product_id" name="product_id" type="text" placeholder="Product ID"  class="form-control input-sm" value="<?= @$product_info->product_id ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3">
                                    Upload gallery</label>
                                <div class="col-md-6">


                                    <div>
                                        <form id="image_blocks" enctype="multipart/form-data">
                                            <div class='block' style="margin-top:10px !important;">
                                        <!--<input name="file[]" type="file" />-->
                                                <div style="position:relative;">
                                                    <a class='btn btn-primary uploadfl' href='javascript:;'>
                                                        Choose File...
                                                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file[]" size="40"  onchange='$(this).parent(".uploadfl").next(".upload-file-info").html($(this).val());'>
                                                    </a>
                                                    &nbsp;
                                                    <span class='label label-info upload-file-info'></span>


                                                    <!--                                                    <a class='btn btn-primary' href='javascript:;'>
                                                                                                            Choose File...
                                                                                                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file[]" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                                                                                        </a>
                                                                                                        &nbsp;
                                                                                                        <span class='label label-info' id="upload-file-info"></span>-->
                                                </div>
                                                <a class="delete-clr float-right"  style="position:relative;" onclick="delete_block(this)"><i class="fa fa-remove"></i></a>
                                            </div>
                                            <!--                                            <div class='block'>
                                                                                            <input name="file[]" type="file"/>
                                            
                                                                                            <a class="delete-clr float-right" onclick="delete_block(this)">X</a>
                                                                                        </div>-->
                                            <button class="add_more btn btn-primary">Add More Files</button>
                                            <input type="hidden" class="uplod-file" value="Upload File" id="upload"/>
                                        </form>
                                    </div>
                                </div>
                                <div id="images_append">
                                    <?php
                                    $gallerys = explode(",", $product_info->product_gallery);

                                    foreach ($gallerys as $list) {
                                        if ($list != "") {
                                            ?>
                                            <div class="dis_img" id="<?= $list ?>">
                                                <img src="<?= base_url() ?>manager_gallary/product/<?= $list ?>" alt="something" style="width:60px;"/>
                                                <a class="close-img" onclick="delete_dis(this)">X</a><br/><?= $list ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>

                            </div> 
                        </div>
                        <div class="form-group row">

                            <label for="productlogo" class="col-md-2"> Logo </label>
                            <div class="col-md-4">
                                <?php if ($product_info->product_logo != "" && $product_info->product_logo != NULL) { ?>
                                    <img src="<?php echo base_url() . 'manager_gallary/product/' . @$product_info->product_logo; ?>" alt="Logo Image" style="width:50px;heigh:50px">
                                <?php } ?>
                                <div style="position:relative;">
                                    <a class='btn btn-primary uploadfl' href='javascript:;'>
                                        Choose File...
                                        <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="productlogo" id="productlogo" size="40"  onchange='$(this).parent(".uploadfl").next(".upload-file-info").html($(this).val());'>
                                    </a>
                                    &nbsp;
                                    <span class='label label-info upload-file-info'></span>


                                    <!--                                    <a class='btn btn-primary' href='javascript:;'>
                                                                            Choose File...
                                                                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="productlogo" id="productlogo" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                                                        </a>
                                                                        &nbsp;
                                                                        <span class='label label-info' id="upload-file-info"></span>-->
                                </div>


<!--                                <input type="file" name="productlogo" id="productlogo"/>-->
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