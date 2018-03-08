<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="administration.php">Administration</a></li>
                            <li class="breadcrumb-item active">Departments</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Departments</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">            
                <div class="col-md-12 ">                            
                    <div class="box-body  table-responsive">
                        <table   id="tbldepartment"  class="table  table-hover table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th data-priority="5"></th>
                                    <th data-priority="1">S.No</th>
                                    <th data-priority="2">Name </th>
                                    <th data-priority="3">Department code</th>
                                    <th data-priority="4">Status</th>
                                    <!--<th data-priority="5">Action</th>-->
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

        DepartmentGridJS.Load(url);


    });//ready

</script>
<script src="<?= base_url() ?>assets/js/pages/administration/dep_grid.js" type="text/javascript"></script>