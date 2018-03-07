<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="administration.php">Administration</a></li>
                    <li class="breadcrumb-item active">Employees</li>
                </ol>
            </div>
            <h4 class="page-title">Employees</h4>
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
    <a class="btn btn-default btn-sm" href="employee_form.php">Add <i class="fa fa-plus-add"></i></a>
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
            <th data-field="date">Designation</th>
            <th data-field="amount">  Mobile </th>
            <th data-field="name">Email</th>
            
        </tr>
        </thead>


        <tbody>
        <tr class="openView">
            <td></td>
            <td>1</td>
            <td>Divya</td>
            <td>Ui Designer</td>
            <td>+919177463111</td>
            <td>divya@provalley.net</td>  
        </tr>
        <tr class="openView">
            <td></td>
            <td>2</td>
            <td>Shruthi</td>
            <td>Ui Designer</td>
            <td>+919177463111</td>
            <td>Shruthi@provalley.net</td>  
        </tr>
        <tr class="openView">
            <td></td>
            <td>3</td>
            <td>Mahender</td>
            <td>Digital Marketing</td>
            <td>+919177463111</td>
            <td>Mahender@provalley.net</td>  
        </tr>
        <tr class="openView">
            <td></td>
            <td>1</td>
            <td>Divya</td>
            <td>Ui Designer</td>
            <td>+919177463111</td>
            <td>divya@provalley.net</td>  
        </tr>
        <tr class="openView">
            <td></td>
            <td>2</td>
            <td>Shruthi</td>
            <td>Ui Designer</td>
            <td>+919177463111</td>
            <td>Shruthi@provalley.net</td>  
        </tr>
        </tbody>
    </table>
</div>
</div>
<div class="col-md-3 mini" style="display: none">
     <div class="panel panel-info">
      <div class="panel-heading color-dark">  
        <div class="text-right"><span class="fa fa-close closemini"></span></div>
        <p>Employee Details</p>
    </div>
      <div class="panel-body">
                        <div class="modal-wrapper">
                            <div class="modal-text">
                                <form class="form-horizontal" role="form"> 
                                <div class="form-group">
                                     <label class="col-md-3 control-label">Name :</label>
                                        <span class="col-md-8 view_form">Divya</span>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Designation :</label>
                                        <span class="col-md-8 view_form">UI Designer</span>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Mobile :</label>
                                        <span class="col-md-8 view_form">9177251110</span>
                                 </div>
                                 <div class="form-group">
                                     <label class="col-md-3 control-label">Email :</label>
                                        <span class="col-md-8 view_form">divya@provalley.net</span>
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