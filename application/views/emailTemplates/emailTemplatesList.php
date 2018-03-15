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
<!-- <label for="" class="col-md-1">Email<span class="text-danger">*</span></label> -->
<!--<div class="col-md-3">
<input type="email" required=""  class="form-control input-sm" id="" placeholder="Search">
</div>
<div class="col-md-1 m-b-10">
    <a class="btn btn-inverse btn-sm" href="javascript:">Search <i class="fa fa-search"></i></a>
</div>-->
<div class="col-md-12 text-right m-b-10 pull-right">
    <a class="btn btn-default btn-sm" href="<?php echo base_url('add-email-template'); ?>">Add <i class="fa fa-plus"></i></a>
<!--    <a class="btn btn-default btn-sm" href="<?php //echo base_url('add-branch'); ?>">Add Branch <i class="fa fa-plus"></i></a>
    <a class="btn btn-default btn-sm" href="<?php //echo base_url('add-contact'); ?>">Add Contact <i class="fa fa-plus"></i></a>-->
</div>

<div class="col-md-12" id="myListView"> 

    <table id="tableId" data-toggle="table" data-page-size="10" data-pagination="true" class="table table-bordered dataTable no-footer dtr-inline table-condensed table-responsive" style="white-space: nowrap; width:100%;">
        <thead>
            <tr>
                <th data-priority="1" data-field="state" data-checkbox="true"><input type="checkbox" name="rowcheck" id="rowcheck"></th>
                <th data-priority="2" data-switchable="false">S.No</th>
                <th data-priority="3">Date</th>
                <th data-priority="4">Title</th>
                <th data-priority="5">Subject</th>
                <th data-priority="6">Created By</th>
<!--                <th data-priority="1">Created On</th>
                <th data-priority="1">Status</th>-->
                <th data-priority="3" class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>

        </tbody>
    </table>


    </div>
<div class="col-md-3 mini" id="DetailsView" style="display: none">&nbsp;</div>

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

</div>
</div>
<!-- end page title end breadcrumb -->
</div> <!-- end container -->
</div>
<!-- end wrapper -->

<script type="text/javascript">

    $(document).ready(function(){

        var url = "<?php echo base_url(); ?>";
        var csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';

        GridJS.Load(url, csrf_token_name, csrf_hash);
        //SaveBranchDetailsJS.Load(url);
        //branchjs.Load(url);
          
    });//ready
    
//    function openSidebar(clientId, branchId, contactId){
//        
//        //alert(clientId+' '+branchId+ '' + contactId);
//        $.ajax({
//            type: "POST",
//            url: "<?php //echo base_url('emailTemplates/getClientFullDetailsAjax') ?>", 
//            data: { "clientId" : clientId, "branchId" : branchId, "contactId" : contactId },
//            //data: form_data,
//            success: function(response){ //alert(response);
//                $("#DetailsView").html(response);
//            },
//            error: function(){
//                //alert("failure");
//            }   
//        });//ajax
//        
//        document.getElementById("myListView").classList.remove("col-md-12");
//        document.getElementById("myListView").classList.add("col-md-9");
//        document.getElementById("DetailsView").style.display = "block";
//     }

</script>
<script src="<?php echo base_url().'assets/datatables-grid/EmailTemplatesGridJS.js'; ?>"></script>
