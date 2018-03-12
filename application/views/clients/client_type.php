<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="administration.php">Administration</a></li>
                            <li class="breadcrumb-item active">ClientTypes</li>
                        </ol>
                    </div>
                    <h4 class="page-title">ClientTypes</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">

                <div class="col-md-3">
                    <input type="email" required=""  class="form-control input-sm" id="" placeholder="Search">
                </div>
                <div class="col-md-1 m-b-10">
                    <a class="btn btn-inverse btn-sm" href="javascript:">Search <i class="fa fa-search"></i></a>
                </div>
                <div class="col-md-8 text-right m-b-10">
                    <a class="btn btn-default btn-sm" href="<?= base_url() ?>clients/clientTypeForm">Add <i class="fa fa-plus-add"></i></a>
                </div>
                <div class="col-md-12 test">                            
                    <div class="table-responsive">
                        <table   id="tblclienttype"  class="table  table-hover table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th data-priority="1"></th>
                                    <th data-priority="2">S.No</th>
                                    <th data-priority="3">Name </th>
                                    <th data-priority="4">Description </th>
                                    <th data-priority="5">Status </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 mini" style="display: none">
                    <div class="panel ">
                        <div class="panel-heading color-dark">  
                            <div class="text-right"><span class="fa fa-close closemini"></span></div>
                            <p>Employee Details</p>
                        </div>
                        <div class="panel-body">
                            <div class="modal-wrapper">
                                <div class="modal-text">
                                    <form class="form-horizontal" role="form">
                                        <div class="action_icons"> 
                                            <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-pencil"></i> </button>
                                            <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-trash"></i> </button>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Department </label>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Code </label>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label f-w-normal">Description </label>

                                        </div>

                                    </form>
                                </div>
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

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        ClienttypeGridJS.Load(url);


    });//ready
function getClientTypeDetailsAjax(clientId, branchId, contactId){
        
        //alert(clientId+' '+branchId+ '' + contactId);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('clients/getClientFullDetailsAjax') ?>", 
            data: { "clientId" : clientId, "branchId" : branchId, "contactId" : contactId },
            //data: form_data,
            success: function(response){ //alert(response);
                $("#DetailsView").html(response);
            },
            error: function(){
                //alert("failure");
            }   
        });//ajax
        
        document.getElementById("myListView").classList.remove("col-md-12");
        document.getElementById("myListView").classList.add("col-md-9");
        document.getElementById("DetailsView").style.display = "block";
     }
</script>
<script src="<?= base_url() ?>assets/js/pages/administration/clienttype_grid.js" type="text/javascript"></script>