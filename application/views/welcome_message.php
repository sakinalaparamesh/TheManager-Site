<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">

                    </div>
                    <h4 class="page-title"></h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12 text-center progress-loader">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <form id="MyForm" method="post" enctype="multipart/form-data" action="<?= base_url() ?>Welcome/saveText" class="form-horizontal" novalidate="" role="form">


                        <div class="form-group row">
                            <label for="message" class="col-md-2"> Message<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="message" id="message" rows="40" cols="80"></textarea>
                            </div>
                        </div>



                        <div class="form-group row ">
                            <label class="col-md-2"></label>
                            <div class=" col-md-4">
                                <button type="submit" name="formSubmit" id="formSubmit" class="btn btn-default waves-effect waves-light btn-sm" onclick="ValidateMyForm();">
                                    save
                                </button>
                                <button type="button" onclick="previewTemplate()" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                    view
                                </button>
                                <button type="button" onclick="sendMail()" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                    send email
                                </button>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data">

                        <div class='block'>
                            <input name="file[]" type="file" />
                            <!--<input name="file_name[]" type="text" placeholder="Image Name"  class="file_name"/>-->
                            <a onclick="delete_block(this)">del</a>
                        </div>
                        <button class="add_more">Add More Files</button>
                        <input type="button" value="Upload File" id="upload"/>
                    </form>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
        <div id="images_append"></div>
        <!--Common Modal -->
        <div class="modal fade content-wrapper modal-right" id="CommonModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">


                    </div>

                </div>

            </div>
        </div>
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
<script>
var path = document.location.pathname;
var directory = path.substring(path.indexOf('/'), path.lastIndexOf('/'));
console.log(window.location.hostname+directory);

                                _Url = '<?= base_url() ?>';
                                function delete_block(res) {

                                    $(res).parent('.block').remove();
                                }
                                function delete_dis(res) {
                                    var img = $(res).parent('.dis_img').attr('id');
                                    alert(img);
                                    $.ajax({
                                        type: "POST",
                                        url: _Url + 'Welcome/deleteImage',
                                        data: {img: img},
                                        success: function (data) {
                                            $(res).parent('.dis_img').remove();
                                        },
                                        error: function (data) {
                                        }
                                    })

                                }
                                $(document).ready(function () {

                                    $('.add_more').click(function (e) {
                                        e.preventDefault();
                                        $(this).before("<div class='block'><input name='file[]' type='file'/><a onclick='delete_block(this)'>del</a></div>");
                                    });
                                    $('body').on('click', '#upload', function (e) {
                                        e.preventDefault();
//                                        var taskArray = new Array();
//                                        $(".file_name").each(function () {
//                                            var val = $(this).val();
//                                            taskArray.push(val);
//                                        });
                                        var formData = new FormData($(this).parents('form')[0]);
//                                        formData.append('file_names', taskArray);
                                        $.ajax({
                                            url: _Url + 'Welcome/uploadImages',
                                            type: 'POST',
                                            data: formData,
                                            cache: false,
                                            contentType: false,
                                            processData: false,
                                            success: function (data) {
                                                var obj = JSON.parse(data);
//                                                console.log(obj);
                                                var src_html = '';

                                                for (var i = 0; i < obj.length; i++) {

                                                    src_html += '<div class="dis_img" id="' + obj[i] + '"><img src="./template_images/' + obj[i] + '" alt="something" /><a onclick="delete_dis(this)">X</a></div>';
                                                }
                                                $('#images_append').append(src_html);
                                                $(".block").each(function () {
                                                    $(this).remove();
                                                });

                                            }
                                        });
                                        return false;
                                    })
                                });
                                function previewTemplate() {

                                    var msg = $("#message").val();
                                    $('.modal-title').html('Proview Template');
                                    $('.modal-body').html(msg);
                                    $('#CommonModal').modal({show: true});
//                                        $.ajax({
//                                            type: "POST",
//                                            url: _Url + 'Welcome/preview',
//                                            data: {message: msg},
//                                            success: function (data) {
//                                                $('.modal-title').html('Proview Template');
//                                                $('.modal-body').html(data);
//                                                $('#CommonModal').modal({show: true});
//                                            },
//                                            error: function (data) {
//                                            }
//                                        })
                                }
                                function sendMail() {

                                    var msg = $("#message").val();
                                    $.ajax({
                                        type: "POST",
                                        url: _Url + 'Welcome/sendEmail',
                                        data: {message: msg},
                                        success: function (data) {
//                                                alert(data);
                                            if (data == '1') {
                                                alert("email sent successfully.");
                                            } else {
                                                alert("Could not send email.");
                                            }
                                        },
                                        error: function (data) {
                                        }
                                    })
                                }
</script>

