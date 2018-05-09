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
                        <table   id="tblsub"  data-toggle="table" data-page-size="10" data-pagination="true"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="white-space: nowrap; width:100%;">
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
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script type="text/javascript">

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        subscriptionGridJS.Load(url);


    });
</script>
<script src="<?= base_url() ?>assets/js/pages/product_related/subscriptions_list.js" type="text/javascript"></script>