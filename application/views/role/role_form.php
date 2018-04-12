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
                    <form role="form" id="frmrole">
                        <input type="hidden" id="roleid" name="roleid" value="<?= (isset($info->roleid)) ? @$info->roleid : "" ?>">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="txtRoleName" class="col-md-2">Role Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" required="" name="rolename" parsley-type="name" class="form-control input-sm" id="txtRoleName" placeholder="Role Name" value="<?= @$info->rolename ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                                <div class="form-group row">
                                                       
                                                            <label for="Role_code" class="col-md-2">Role code<span class="text-danger">*</span></label>
                                                            <div class="col-md-4">
                                                                <input id="txtRoleCode" name="rolecode" type="text" placeholder="Role code" required="" class="form-control input-sm">
                                                            </div>
                                                        </div>-->
                        <!--                        <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group row">
                                                            <label for="hori-pass2" class="col-md-4">Description
                                                                <span class="text-danger">*</span></label>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" id="txtRoleDescription" rows="5" name="roledescription"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-group row">
                                                            <label for="txtDisplayname" class="col-md-2">Display Name<span class="text-danger">*</span></label>
                                                            <div class="col-md-4">
                                                                <input type="text" required="" name="displayname" parsley-type="name" class="form-control input-sm" id="txtDisplayname" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                </div>-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="row">

                        <div class="col-md-6 controllers_role p-l-20" data-spy="scroll">
                            <h4>Modules</h4>
                            <?php foreach ($controller_list as $list) { ?>

                                <div class="col-md-12">

                                    <div class="controller">
                                        <?php if (count($actions[$list['controllerid']]) > 0) { ?>
                                            <div class="text-dark font-13 m-b-15 m-t-20"><b> <?= $list['displayname'] ?> </b> </div>
                                            <input type="hidden" name="controller_ids[]" value="<?= $list['controllerid'] ?>"/>
                                            <?php foreach ($actions[$list['controllerid']] as $info) { ?> 
                                                <div class="checkbox checkbox-inverse form-check-inline">
                                                    <input type="checkbox" class="chk_module" id="inlineCheckbox_<?= $info['actionid'] ?>"  <?php
                                                    if (isset($role_privileges)) {
                                                        echo (dataCompare(@$role_privileges->action_id, $info['actionid'])) ? "checked" : "";
                                                    }
                                                    ?> data-ControllerId="<?= $list['controllerid'] ?>" value="<?= $info['actionid'] ?>" name="<?= $list['controllerid'] ?>[]">
                                                    <label for="inlineCheckbox_<?= $info['actionid'] ?>" > <?= $info['actiondisplayname'] ?> </label>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div> 
                                </div>

                            <?php } ?>
                        </div>

                        <div class="col-md-6 controllers_role p-l-20" data-spy="scroll">
                            <h4>Tiles</h4>
                            <?php foreach ($menus['parents'] as $parent) { ?>


                                <div class="col-md-12">

                                    <div class="controller">
                                        <?php if (count($menus['childs'][$parent['menu_id']]) > 0) { ?>
                                            <div class="text-dark font-13 m-b-15 m-t-20"><b><?= $parent['menu_name'] ?> </b> </div>
                                            <input type="hidden" name="parent_ids[]" value="<?= $parent['menu_id'] ?>" />
                                            <div class="checkbox checkbox-inverse form-check-inline">
                                                <?php foreach ($menus['childs'][$parent['menu_id']] as $list) { ?>


                                                    <input type="checkbox" class="chk_tiles" id="menu_<?= $list['menu_id'] ?>"  value="<?= $list['menu_id'] ?>" name="<?= $parent['menu_id'] ?>[]"
                                                           data-chk_tilespar="<?= $parent['menu_id'] ?>" <?php
                                                           if (isset($role_menuprivileges)) {
                                                               echo (dataCompare(@$role_menuprivileges->menu_id, $list['menu_id'])) ? "checked" : "";
                                                           }
                                                           ?>>
                                                    <label for="menu_<?= $list['menu_id'] ?>" > <?= $list['menu_name'] ?> </label>

                                                <?php }
                                            }
                                            ?>
                                        </div>
                                    </div> 
                                </div>

<?php } ?>
                        </div>

                    </div>




                    <div class="form-group row m-t-30 ">
                        <div class=" col-md-4 col-md-offset-2">
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
    <!-- end page title end breadcrumb -->
</div>

<!-- end wrapper -->
<script src="<?php echo base_url(); ?>assets/js/pages/role/role_js.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
        rolejs.Load(_baseUrl);
    })
</script>

