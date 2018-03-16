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
                <div class="col-md-12 text-right m-b-10 pull-right">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('department/addOrEdit'); ?>">Add Department <i class="fa fa-plus"></i></a>
                </div>
                <div class="col-md-12" id="myListView">                            
                    <div class="box-body  table-responsive">
                        <table   id="tbldepartment" data-toggle="table" data-page-size="10" data-pagination="true"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="white-space: nowrap; width:100%;">
                            <thead>
                                <tr>
                                    <th data-priority="1" data-field="state" data-checkbox="true"><input type="checkbox" name="rowcheck" id="rowcheck"></th>
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
<div class="col-md-3 mini" id="DetailsView">&nbsp;</div>
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
    function openSidebar(departmentid) {

//        alert(departmentid);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Department/getDepartmentFullDetailsAjax') ?>",
            data: {"departmentid": departmentid},
            //data: form_data,
            success: function (response) { //alert(response);
                $("#DetailsView").html(response);
            },
            error: function () {
//                alert("failure");
            }
        });//ajax

        document.getElementById("myListView").classList.remove("col-md-12");
        document.getElementById("myListView").classList.add("col-md-9");
        document.getElementById("DetailsView").style.display = "block";
    }
</script>
<script src="<?= base_url() ?>assets/js/pages/administration/dep_grid.js" type="text/javascript"></script>