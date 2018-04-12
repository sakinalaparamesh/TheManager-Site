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
                    <form id="MenuForm" method="post" action="" class="form-horizontal" novalidate="">
                        <div class="box-body">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <!--<input type="hidden" name="MenuId" value="">-->
                                <div class="form-group row ">
                                    <label for="name" class="col-md-3 control-label lable-font">Menu Name<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" id="name" value="" parsley-trigger="change" placeholder="Menu Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="displayName" class="col-md-3 control-label lable-font">Display Name<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="displayName" id="displayName" value="" parsley-trigger="change" placeholder="Display Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-3 control-label lable-font">Menu Description<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <textarea name="description" id="description" parsley-trigger="change" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MenuIcon" class="col-md-3 control-label lable-font">Menu Icon (Font Awesome Class Name)<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="MenuIcon" id="MenuIcon" value=""  placeholder="Menu Icon" class="form-control">
                                        <i class=""></i>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="menuColor" class="col-md-3 control-label lable-font">Menu Color<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="menuColor" id="menuColor" value="" parsley-trigger="change" placeholder="Menu Color" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-3 control-label lable-font">Is Parent Menu ? <span class="text-danger">*</span></label> 
                                    <div class="col-md-6">
                                        <input type="radio" name="IsParentMenu" value="1"  > &nbsp; YES &nbsp;&nbsp;
                                        <input type="radio" name="IsParentMenu" value="0" checked> &nbsp; NO
                                    </div>
                                </div>
                                <div id="parent_form" style="display:none;">

                                </div>
                                <div id="child_form" style="display:none;">

                                    <div class="form-group row">
                                        <label for="menu_id" class="col-md-3">Parent Menu List<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <select id="menu_id" class="form-control input-sm" name="menu_id" required>
                                                <option value="">Select parent menu</option>
                                                <?php foreach ($parentmenu_list as $list) { ?>
                                                    <option value="<?= $list['menu_id'] ?>"><?= $list['menu_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="menuURL" class="col-md-3 control-label lable-font">Menu URL (Ex: ControllerName/MethodName)<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="text" name="menuURL" id="menuURL" value="" parsley-trigger="change" placeholder="Menu URL" class="form-control" required>
                                        </div>
                                    </div>


                                </div>

<!--                                <div class="form-group row">
                                    <label for="controllerid" class="col-md-3 control-label lable-font">Roles<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <select id="controllerid" name="controllerid" class="select2 select2-multiple select2" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true">

                                            <?php foreach ($roles_list as $list) { ?>
                                                <option value="<?= $list['roleid'] ?>"><?= $list['rolename'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <i class=""></i>
                                    </div>
                                </div>-->

                                <div class="form-group row">
                                    <label for="menuOrder" class="col-md-3 control-label lable-font">Menu Order (After)<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="menuOrder" id="menuOrder" required>
                                            <option value="">Select Menu Order</option>
                                            <option value="0">First</option>
                                            <?php foreach ($childtmenu_list as $list) { ?>
                                                <option value="<?= $list['menu_id'] ?>"><?= $list['menu_name'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row  m-b-0">
                                    <label for="" class="col-md-3 control-label lable-font">Status<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <label class="radio-inline radio-font">

                                            <input type="radio" name="is_active"   value="Y" checked>Active
                                        </label>
                                        <label class="radio-inline radio-font">
                                            <input type="radio" name="is_active"  value="N">InActive
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                                            SUBMIT
                                        </button>
                                        <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                            CANCEL
                                        </button>
                                    </div>
                                </div>
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
<script src="<?php echo base_url(); ?>assets/js/pages/administration/menu_js.js" type="text/javascript"></script>

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
