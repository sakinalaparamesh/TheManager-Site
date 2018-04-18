<!-- Page-Title -->

<div class="container-fluid">
    <div id="comment" class="col-md-12" style="display:none;">Please enter comments</div>

    <div class="card-box">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="frm_disable">

                    <input type="hidden" name="jobid" id="jobid" value="<?= $jobid ?>">

                    <div class="form-group row">
                        <label for="address" class="col-md-3">Comment
                        </label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="jobs_disable_comment" rows="3" name="jobs_disable_comment" required></textarea>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <label class="col-md-2"></label>
                        <div class=" col-md-4 col-md-offset-2">
                            <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                                SUBMIT
                            </button>
                            <!--                                <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                                                CANCEL
                                                            </button>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
</div> <!-- end container -->

<!-- end wrapper -->

<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
        $("#btnSubmit").click(function () {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _baseUrl + 'Jobs/jobDisableAction',
                data: $('#frm_disable').serialize(),
//                dataType: 'json',
                success: function (data) {
                    $.LoadingOverlay("hide");

                    var obj = JSON.parse(data);

                    if (obj.isError == "N") {

                        location.reload();
                    } else {
                        $("#comment").text(obj.message);
                        $("#comment").show();
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $("#comment").text("Technical error occured");
                    $("#comment").show();
                }
            })
        });
    })
</script>

