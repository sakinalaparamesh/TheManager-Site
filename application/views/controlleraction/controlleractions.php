<div class="wrapper">
    <div class="container-fluid">
        <div class="row">            
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <?php echo $this->breadcrumbs->show(); ?>
                    </div>
                    <h4 class="page-title">Controller Action Names</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12 text-right m-b-10">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('controlleraction/addOrEdit'); ?>"><i class="fa fa-plus"></i>Add </a>
                </div>
                <div class="col-md-12" id="myListView">                            
                    <div class="box-body  table-responsive">
                        <table id="tblcontrolleraction" data-toggle="table" data-page-size="10" data-pagination="true"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="width:100%;">
                            <thead>
                                <tr>
                                    <th data-priority="1"></th>
                                    <th data-priority="2">S.No</th>
                                    <th data-priority="2">Controller name</th>
                                    <th data-priority="3">Controller Action Name </th>
                                    <th data-priority="4">Action Code Name</th>
                                    <th data-priority="4">Action Display Name</th>
                                    <th data-priority="5">Status</th>

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
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        controlleractionGridJS.Load(url);


    });//ready
    function openSidebar(actionid) {
        $.LoadingOverlay("show");
//        alert(departmentid);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Controlleraction/getControlleractionFullDetailsAjax') ?>",
            data: {"actionid": actionid},
            //data: form_data,
            success: function (response) { //alert(response);                
                $("#DetailsView").html(response);
                $.LoadingOverlay("hide");
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
<script src="<?= base_url() ?>assets/js/pages/controlleraction/controlleraction_grid.js" type="text/javascript"></script>