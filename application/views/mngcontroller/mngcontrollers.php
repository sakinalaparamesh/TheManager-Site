<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <?php echo $this->breadcrumbs->show(); ?>
                    </div>
                    <h4 class="page-title">Controllers List</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">   
                <?php // if(checkPrivileges("mngcontroller","addoredit")){ ?>
                <div class="col-md-12 text-right m-b-10">
                <a class="btn btn-default btn-sm" href="<?php echo base_url('mngcontroller/addOrEdit'); ?>">Add controller<i class="fa fa-plus-add"></i></a>
                 </div>
                 <?php // } ?>
                <div class="col-md-12" id="myListView">                            
                    <div class="box-body  table-responsive">
                        <table id="tblmngcontroller" data-toggle="table" data-page-size="10" data-pagination="true"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="width:100%;">
                            <thead>
                                <tr>
                                    <th data-priority="1"></th>
                                    <th data-priority="2">S.No</th>
                                    <th data-priority="3">Name </th>
                                    <th data-priority="4">Display Name</th>
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
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script type="text/javascript">

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        mngcontrollerGridJS.Load(url);


    });//ready
    function openSidebar(controllerid) {
        $.LoadingOverlay("show");

//        alert(controllerid);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('mngcontroller/getmngcontrollerFullDetailsAjax') ?>",
            data: {"controllerid": controllerid},
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
<script src="<?= base_url() ?>assets/js/pages/mngcontroller/mngcon_grid.js" type="text/javascript"></script>