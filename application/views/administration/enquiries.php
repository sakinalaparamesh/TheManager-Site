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
                
                <div class="col-md-12 ">                            
                    <div class="box-body  table-responsive">
                        <table   id="tbl_enq" data-toggle="table" data-page-size="10" data-pagination="true"  class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="white-space: nowrap; width:100%;"">
                            <thead>
                                <tr>
                                    <th data-priority="1" data-field="state" data-checkbox="true"><input type="checkbox" name="rowcheck" id="rowcheck"></th>
                                    <th data-priority="1">S.No</th>
                                    <th data-priority="2">product Name </th>
                                    <th data-priority="3">Enquiry</th>
                                    <th data-priority="3">Company</th>
                                    <th data-priority="3">Email</th>
                                    <th data-priority="3">Phone</th>
                                    <th data-priority="4">Date/Time</th>
                                    <th data-priority="4">Message</th>
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

        GridJS.Load(url);


    });//ready

</script>
<script src="<?= base_url() ?>assets/js/pages/administration/enquiry_grid.js" type="text/javascript"></script>