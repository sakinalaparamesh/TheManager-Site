<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <?php echo $this->breadcrumbs->show(); ?>
                    </div>
                    <h4 class="page-title">Add Controllers</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" id="frmmngcontroller">
                        <input type="hidden" id="controllerid" value="<?= (isset($mngcontroller_info->controllerid)) ? $mngcontroller_info->controllerid : "" ?>">
                        <div class="form-group row">
                            <label for="mngcontrollername" class="col-md-2">Controller Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" name="mngcontrollername" id="txtmngControllerName" parsley-type="mngcontrollername" class="form-control input-sm"  placeholder="Controller Name" value="<?= @$mngcontroller_info->controllername ?>">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="mngcontrollerdisplayname" class="col-md-2">Display Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input  type="text" name="mngcontrollerdisplayname" id="txtmngcontrollerdisplayname"placeholder="Display Name" class="form-control input-sm" value="<?= @$mngcontroller_info->displayname ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mngcontrollerDescription" class="col-md-2">Description
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="mngcontrollerDescription" id="txtmngcontrollerDescription" rows="3"><?= @$mngcontroller_info->description ?></textarea>
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
    </div>
</div>
<!-- end page title end breadcrumb -->
<script src="<?php echo base_url(); ?>assets/js/pages/mngcontroller/mngcontroller_js.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
        mngcontrollerjs.Load(_baseUrl);
    })
</script>
