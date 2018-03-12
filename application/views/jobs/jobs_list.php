<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="administration.php">Administration</a></li>
                            <li class="breadcrumb-item active">Jobs</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Jobs</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">   
                <div class="col-md-12 text-right m-b-10 pull-right">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('jobs_post'); ?>">Job Post <i class="fa fa-plus"></i></a>
</div>
                <div class="col-md-12 ">                            
                    <div class="box-body  table-responsive">
                        <table   id="tbldepartment" data-toggle="table" data-page-size="10" data-pagination="true"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="white-space: nowrap; width:100%;"">
                            <thead>
                                <tr>
                                    <th data-priority="1" data-field="state" data-checkbox="true"><input type="checkbox" name="rowcheck" id="rowcheck"></th>
                                    <th data-priority="1">S.No</th>
                                    <th data-priority="2">Job Position </th>
                                    <th data-priority="3"> Posting start date</th>
                                    <th data-priority="4">End date</th>
                                    <th data-priority="5">Joining Date</th> 
                                    <th data-priority="6">Country</th>  
                                    <th data-priority="6">Actions</th>
                                    
                                    
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
