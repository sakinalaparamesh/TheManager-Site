<style>
    .close-img{
        color: #fff!important;
        background-color: red!important;
        border-radius: 50px;
        margin-left: 5px;
        font-size: 17px;
        padding: 10px;
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
                <div class="col-md-12 text-center progress-loader">&nbsp;</div>
            </div>



            <form id="MyForm" method="post" enctype="multipart/form-data" action="" class="form-horizontal" novalidate="" role="form">
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo @$details[0]['id']; ?>">
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label for="template_id" class="control-label">Template ID<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control input-sm" name="template_id" id="template_id" value="<?php echo @$details[0]['template_id']; ?>" placeholder="Template ID" readonly="">
                            </div>
                        </div>            
                        <div class="form-group ">
                            <label for="template_title" class="control-label">Title<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control input-sm" name="template_title" id="template_title" value="<?php echo $details[0]['template_title']; ?>" placeholder="Title" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject" class="control-label">Subject<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" class="form-control input-sm" name="subject" id="subject" value="<?php echo $details[0]['subject']; ?>" placeholder="Subject">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="template_type" class="control-label"> Template Type<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <div class="radio">
                                    <div class="radio  form-check-inline">
                                        <input type="radio" name="template_type" id="rb_template_type1" <?php
                                        if ($details[0]['template_type'] == 'product') {
                                            echo 'checked="checked"';
                                        }
                                        ?> value="product">
                                        <label for="rb_template_type1"> Product </label>
                                    </div>
                                    <div class="radio form-check-inline">
                                        <input type="radio" name="template_type" id="rb_template_type2" <?php
                                        if ($details[0]['template_type'] == 'general') {
                                            echo 'checked="checked"';
                                        }
                                        ?> value="general">
                                        <label for="rb_template_type2"> General </label>
                                    </div>
                                    <div class="radio form-check-inline">
                                        <input type="radio" name="template_type" id="rb_template_type3" <?php
                                        if ($details[0]['template_type'] == 'greetings') {
                                            echo 'checked="checked"';
                                        }
                                        ?> value="greetings">
                                        <label for="rb_template_type3"> Greetings </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group " id="products_list_box"  <?php if ($details[0]['productids'] == '') echo 'style="display: none;"'; ?>>

                            <label for="products" class="control-label">Products<span class="text-danger">*</span></label>

                            <div class="col-md-12">
                                <div class="checkbox">
                                    <?php
                                    $productids = explode(",", $details[0]['productids']);
                                    foreach ($products as $prod) {
                                        ?>
                                        <div class="checkbox  form-check-inline">
                                            <input type="checkbox" name="productids[]" id="chk_productids_<?php echo $prod['productid']; ?>" <?php
                                            if (in_array($prod['productid'], $productids)) {
                                                echo "checked='checked'";
                                            }
                                            ?> value="<?php echo $prod['productid']; ?>">
                                            <label for="chk_productids_<?php echo $prod['productid']; ?>"> <?php echo $prod['productname']; ?> </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                        </div> 
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="message" class="control-label"> Message<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" id="message" required><?php echo $details[0]['message']; ?></textarea>
                            </div>
                        </div>

                    </div>
                </div> 
            </form>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-md-3">
                            Upload Images</label>
                        <div class="col-md-6">



                            <div class="checkbox checkbox-inverse form-check-inline">
                                <input type="checkbox" id="upload_gall" <?= (count($gallery) > 0) ? "checked" : "" ?>/>
                                <label for="upload_gall">  </label>
                            </div>

                            <div <?= (count($gallery) > 0) ? "" : "style='display:none'" ?> id="image_blocks">
                                <form enctype="multipart/form-data">
                                    <div class='block' style="margin-top:10px !important;">
                                        <!--<input name="file[]" type="file" />-->
                                        <div style="position:relative;">
                                            <a class='btn btn-primary' href='javascript:;'>
                                                Choose File...
                                                <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file[]" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                            </a>
                                            &nbsp;
                                            <span class='label label-info' id="upload-file-info"></span>
                                        </div>
                                        <a class="delete-clr float-right"  style="position:relative;" onclick="delete_block(this)"><i class="fa fa-remove"></i></a>
                                    </div>
                                    <button class="add_more btn btn-primary">Add More Files</button>
                                    <input type="button" class="uplod-file" value="Upload File" id="upload"/>
                                </form>
                            </div>
                        </div>

                        <div id="images_append">
                            <?php foreach ($gallery as $list) { ?>
                                <div class="dis_img" id="<?= $list['template_images_name'] ?>">
                                    <img src="<?= base_url() ?>template_images/<?= $list['template_images_name'] ?>" alt="something" style="width:60px;"/>
                                    <a class="close-img" onclick="delete_dis(this)">X</a><br/><?= $list['template_images_name'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-md-2"></label>
                <div class=" col-md-6">
                    <button type="button" name="formSubmit" id="formSubmit" class="btn btn-default waves-effect waves-light btn-sm" onclick="ValidateMyForm();">
                        SUBMIT
                    </button>
                    <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                        CANCEL
                    </button>
                    <button type="button" onclick="previewTemplate()" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                        view
                    </button>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<!--Common Modal -->
<!--<div class="modal fade content-wrapper modal-right"  role="dialog">
    <div class="modal-dialog">
         Modal content
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">


            </div>

        </div>

    </div>
</div>-->


<!-- Modal -->
<div class="modal fade" id="CommonModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    _Url = '<?= base_url() ?>';
    function delete_block(res) {

        $(res).parent('.block').remove();
    }
    function delete_dis(res) {
        var img = $(res).parent('.dis_img').attr('id');
        $.LoadingOverlay("show");
//        alert(img);
        $.ajax({
            type: "POST",
            url: _Url + 'EmailTemplates/deleteImage',
            data: {img: img},
            success: function (data) {
                $.LoadingOverlay("hide");
                $(res).parent('.dis_img').remove();
                alert("Deleted successfully");
            },
            error: function (data) {
            }
        })

    }

    function previewTemplate() {

        var msg = $("#message").val();
        $('.modal-title').html('Preview Template');
        $('.modal-body').html(msg);
        $('#CommonModal').modal({show: true});
//                                        $.ajax({
//                                            type: "POST",
//                                            url: _Url + 'Welcome/preview',
//                                            data: {message: msg},
//                                            success: function (data) {
//                                                $('.modal-title').html('Preview Template');
//                                                $('.modal-body').html(data);
//                                                $('#CommonModal').modal({show: true});
//                                            },
//                                            error: function (data) {
//                                            }
//                                        })
    }
    $(document).ready(function () {
        $('#upload_gall').click(function () {
            if ($(this).is(':checked')) {
                $("#image_blocks").show();
            } else {
                $("#image_blocks").hide();
            }
        });
        ValidateForm();

//        CKEDITOR.replace('message');

        $('.add_more').click(function (e) {
            e.preventDefault(); 
            var par="progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            var field = '<div class="block" style="margin-top:10px !important;">' +
                    '<div style="position:relative;">' +
                    '<a class="btn btn-primary" href="javascript:;">Choose File...' +
                    '<input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity='+0+');-ms-filter:'+par+';opacity:0;background-color:transparent;color:transparent;" name="file[]" size="40"  onchange="$("#upload-file-info").html($(this).val());">' +
                    '</a>&nbsp;' +
                    '<span class="label label-info" id="upload-file-info"></span>' +
                    '</div>' +
                    '<a class="delete-clr float-right"  style="position:relative;" onclick="delete_block(this)"><i class="fa fa-remove"></i></a>' +
                    '</div>';
//            $(this).before("<div class='block'><input name='file[]' type='file'/><a class='delete-clr float-right' onclick='delete_block(this)'>X</a></div>");
            $(this).before(field);

        });
        $('#upload').on('click', function (e) {
            e.preventDefault();
            var files_count = 0;
            $(".block").each(function () {
                files_count++;
            });

            var formData = new FormData($(this).parents('form')[0]);
            formData.append('id', $("input[name='id']").val());
            formData.append('files_count', files_count);
            $.LoadingOverlay("show");
            $.ajax({
                url: _Url + 'EmailTemplates/uploadImages',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);

                    var src_html = '';

                    for (var i = 0; i < obj.length; i++) {

                        src_html += '<div class="dis_img" id="' + obj[i] + '"><img src="<?= base_url() ?>template_images/' + obj[i] + '" alt="something" style="width:60px;"/><a class="close-img" onclick="delete_dis(this)">X</a><br/>' + obj[i] + '</div>';
                    }
                    $('#images_append').append(src_html);
                    $(".block").each(function () {
                        $(this).remove();
                    });

                }
            });
            return false;
        });

        $("input[name='template_type']").click(function () {
            var template_type = $("input[name='template_type']:checked").val();
            if (template_type == 'product') {
                $('#products_list_box').css({'display': 'block'});
            } else {
                $('#products_list_box').css({'display': 'none'});
            }
        });
//        $("input[name='template_title']").keyup(function () {
//
//            var template_title = $(this).val().trim().replace(/ /g, "_").toUpperCase();
//            $("#template_id").val(template_title);
//        });

    });//ready
    function ValidateMyForm() {
        var validator = $('#MyForm').data('bootstrapValidator');
        validator.validate();

        if (validator.isValid()) {


            var productids = new Array();
            var id = $("input[name='id']").val();
            var template_id = $("input[name='template_id']").val();
            var template_title = $("input[name='template_title']").val();
            var subject = $("input[name='subject']").val();
//            var message = CKEDITOR.instances['message'].getData();
            var message = $("#message").val();
            var template_type = $("input[name='template_type']:checked").val();
            $('input[name^="productids"]').each(function () {
                if ($(this).is(":checked")) {
                    productids.push($(this).val());
                }
            });
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('emailTemplates/createTemplate'); ?>",
                //data: $('#MyForm').serialize(),
                data: {id: id, template_id: template_id, template_title: template_title, subject: subject, message: message, template_type: template_type, productids: productids},
                //data: $('#MyForm').serialize() + "&CK_message=" + CK_message,
                dataType: 'json',
                success: function (data) { //alert(response); return false; 

                    //var json = $.parseJSON(response);
                    $.LoadingOverlay("hide");

                    if (data['isError'] == 'N') {
                        //alert(json.isError); 
                        alert(data['message']);
                        /*swal(
                         {
                         title: "Email Template!",
                         text: json.message,
                         type: "success",
                         showCancelButton: true,
                         confirmButtonClass: "btn-success",
                         confirmButtonText: "Ok",
                         closeOnConfirm: false
                         },
                         function(){
                         //window.location.reload();
                         window.location.href = "<?php //echo base_url('e-templates');                 ?>";
                         }
                         );*/
                        window.location.href = "<?php echo base_url('e-templates'); ?>";
                    } else {
                        alert(data['message']);
                        //swal("Email Template!", json.message, "error");
                    }
                },
                error: function (data) {
                    alert('Technical Error occured while saving..Please contact admin');
                    //swal("Email Template!", 'Technical Error occured while saving..Please contact admin', "error");
                }
            });
        }
    }
</script>
<script src="<?php echo base_url(); ?>assets/validations/EmailTemplateValidation.js"></script>
