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
                    <a class="btn btn-default btn-sm" href="<?php echo base_url('product/addOrEdit'); ?>">Add <i class="fa fa-plus-add"></i></a>
                </div>
                <div class="col-md-12 ">                            
                    <div class="box-body  table-responsive">
                        <table   id="tblproduct"  class="table  table-hover table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th data-priority="1"></th>
                                    <th data-priority="2">S.No</th>
                                    <th data-priority="3">Product Name </th>
                                    <th data-priority="4">Product code</th>
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

        ProductGridJS.Load(url);


    });//ready

</script>
<script src="<?= base_url() ?>assets/datatables-grid/ProductsGridJS.js" type="text/javascript"></script>