<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <?php echo $this->breadcrumbs->show(); ?>
            </div>
            <h4 class="page-title">Clients</h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
<!-- <label for="" class="col-md-1">Email<span class="text-danger">*</span></label> -->
<div class="col-md-3">
<input type="email" required=""  class="form-control input-sm" id="" placeholder="Search">
</div>
<div class="col-md-1 m-b-10">
    <a class="btn btn-inverse btn-sm" href="javascript:">Search <i class="fa fa-search"></i></a>
</div>
<div class="col-md-8 text-right m-b-10">
    <a class="btn btn-default btn-sm" href="client_registration.php">Add Client <i class="fa fa-plus"></i></a>
    <a class="btn btn-default btn-sm" href="branch_registration.php">Add Branch <i class="fa fa-plus"></i></a>
    <a class="btn btn-default btn-sm" href="client_contact_registration.php">Add Contact <i class="fa fa-plus"></i></a>
</div>

<div class="col-md-12 test">                            
<div class="table-responsive">
<table     data-toggle="table"
           data-page-size="10"
           data-pagination="true" class="table-bordered table-condensed table-hovered" style="white-space: nowrap;">
        <thead class="text-white">
        <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="id" data-switchable="false">S.No</th>
            <th data-field="name">Name </th>
             <th data-field="companyname">Company Name </th>
            <th data-field="branch">Branch</th>
           
            <th data-field="mobile">Mobile </th>
            
            
        </tr>
        </thead>


        <tbody>
        <tr class="openView">
            <td></td>
            <td>1</td>
            <td>Divya</td>
           
            <td>Provalley </td>
            <td>Kukatpally </td>
            <td>9658965412</td>  
        </tr>
       
       
        
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
                                     <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-plus" title="Add Branch"></i> </button>
                                    <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-user" title="Add Contact"></i> </button>
                                     <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-pencil" title=" Edit"></i> </button>
                                     <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-dollar" title="Billing Contact"></i> </button>
                                    <button class="btn btn-icon waves-effect color-dark waves-light"> <i class="fa fa-trash" title="Inactive"></i> </button>
                                    </div>
                                    <div class="contact-card m-t-30">
                                <a class="pull-left" href="#">
                                    <img class="rounded-circle" src="assets/images/users/avatar-6.jpg" alt="">
                                </a>

                                <div class="member-info">

                                    <h4 class="m-t-0 m-b-5 header-title"><b>Bill Bertz</b></h4>
                                    <p class="text-muted">Branch manager</p>
                                    <p class="text-dark"><i class="md md-business m-r-10"></i><small>ABC company Pvt Ltd.</small></p>
                                     <p class="text-dark"><i class="md md-business m-r-10"></i><small>{Address}</small></p>
                                     <h4 class="m-t-0 m-b-5 header-title"><b>{Mobile}</b></h4>
                                     <p class="text-muted">Contact Number</p>
                                     <p class="text-muted">Email</p>
                                    <div class="m-t-20">
                                        <a href="#" class="btn btn-purple waves-effect waves-light btn-sm">Send email</a>
                                        <a href="#" class="btn btn-success waves-effect waves-light btn-sm m-l-5">Edit</a>
                                        <a href="#" class="btn btn-pink waves-effect waves-light btn-sm m-l-5">Call</a>
                                    </div>
                                </div>

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
