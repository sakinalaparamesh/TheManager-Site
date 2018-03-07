<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="administration.php">Administration</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Roles</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">            
                <div class="col-md-12 ">                            
                    <div class="box-body  table-responsive">
                        <table   id="tblrole"  class="table  table-hover table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th data-priority="1"></th>
                                    <th data-priority="2">S.No</th>
                                    <th data-priority="3">Role Name </th>
                                    <th data-priority="3">Role Description </th>
<!--                                    <th data-priority="4">Role code</th>-->
                                    <th data-priority="5">Status</th>

                                </tr>
                            </thead>


                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script type="text/javascript">

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        RoleGridJS.Load(url);


    });//ready

</script>
<script src="<?= base_url() ?>assets/js/pages/role/role_grid.js" type="text/javascript"></script>