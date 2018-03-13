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
<div class="col-md-12 text-right m-b-10">
    <a class="btn btn-default btn-sm" href="<?php echo base_url('Agent/addOrEdit'); ?>">Add <i class="fa fa-plus-add"></i></a>
</div>
<div class="col-md-12 test">                            
<div class="table-responsive">
<table id="tblagent" class="table-bordered table-condensed table-hovered">
        <thead>
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="id" data-switchable="false">S.No</th>
            <th data-field="name">Agent Name </th>
            <th data-field="company">User Company </th>
            <th data-field="data">Contact number </th>
            <th data-field="data">Email </th>
            <th data-field="data">Status</th>
                       
        </tr>
        </thead>


        <tbody>
       
        
        </tbody>
    </table>
</div>
</div>
<!--<div class="col-md-3 mini" style="display: none">
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
                                    <span class="nav-user">
                                        
                                    <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                               
                                    </span> 
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

  </div>-->
</div>
</div>
<!-- end page title end breadcrumb -->
</div> <!-- end container -->
</div>
<!-- end wrapper -->
<script type="text/javascript">

    $(document).ready(function () {

        var url = "<?= base_url() ?>";

        agentGridJS.Load(url);


    });//ready

</script>
<script src="<?= base_url() ?>assets/js/pages/agent/agent_grid.js" type="text/javascript"></script>