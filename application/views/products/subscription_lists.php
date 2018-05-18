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
                <div class="col-md-12 text-right m-b-10">
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('ProductSubscriptions/addSubscription'); ?>">Add <i class="fa fa-plus-add"></i></a>
                </div>
                <div class="col-md-12" id="myListView">                            
                    <div class="box-body  table-responsive">
                        <table   id="tblsub"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="width:100%;">
                            <thead>
                                <tr>
                                    <th data-priority="1"></th>
                                    <th data-priority="2">S.No</th>
                                    <th data-priority="3">Subscription Code </th>
                                    <th data-priority="4">Company Name</th>
                                    <th data-priority="3">Product Name </th>
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
        <!--Common Modal -->
        <div class="modal fade content-wrapper modal-right" id="CommonModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">


                    </div>

                </div>

            </div>
        </div>
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script type="text/javascript">

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        subscriptionGridJS.Load(url);


    });
    function openSidebar(subsrc_id) {
        $.LoadingOverlay("show");
//        alert(departmentid);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ProductSubscriptions/detailsView') ?>",
            data: {"subsrc_id": subsrc_id},
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
    function activeSubscription(subsrc_id) {
        $.LoadingOverlay("show");
        $('.modal-title').html('');
        $('.modal-body').html('');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ProductSubscriptions/activeSubscription') ?>",
            data: {"subsrc_id": subsrc_id},
            success: function (response) { //alert(response);
                $('.modal-title').html('Active Subscription');
                $('.modal-body').html(response);
                //document.getElementByClass("modal-body").html(response);
                $('#CommonModal').modal({show: true});
                $.LoadingOverlay("hide");
            }
        });//ajax

    }
    function deactiveSubscription(subsrc_id) {
        $.LoadingOverlay("show");
        $('.modal-title').html('');
        $('.modal-body').html('');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ProductSubscriptions/deactiveSubscription') ?>",
            data: {"subsrc_id": subsrc_id},
            success: function (response) { //alert(response);
                $('.modal-title').html('Deactive Subscription');
                $('.modal-body').html(response);
                //document.getElementByClass("modal-body").html(response);
                $('#CommonModal').modal({show: true});
                $.LoadingOverlay("hide");
            }
        });//ajax

    }
    function billing(subsrc_id) {
        $.LoadingOverlay("show");
        $('.modal-title').html('');
        $('.modal-body').html('');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('ProductSubscriptions/billing') ?>",
            data: {"subsrc_id": subsrc_id},
            success: function (response) { //alert(response);
                $('.modal-title').html('Billing');
                $('.modal-body').html(response);
                //document.getElementByClass("modal-body").html(response);
                $('#CommonModal').modal({show: true});
                $.LoadingOverlay("hide");
            }
        });//ajax

    }
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/subscriptions_list.js" type="text/javascript"></script>