<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="employees.php">Employees List</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h4 class="page-title">Add Employee</h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form role="form" >
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-1">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-5">
                                        <input type="text" required="" parsley-type="name" class="form-control input-sm" id="inputEmail3" placeholder="Name">
                                    </div>
                               
                                    <label for="hori-pass1" class="col-md-1">Designation<span class="text-danger">*</span></label>
                                    <div class="col-md-5">
                                        <input id="hori-pass1" type="text" placeholder="Designation" required="" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-1">Mobile
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-5">
                                        <input data-parsley-equalto="#hori-pass1" type="text" required="" placeholder="Mobile" class="form-control input-sm" id="hori-pass2">
                                    </div>
                               
                                    <label for="webSite" class="col-md-1">Email<span class="text-danger">*</span></label>
                                    <div class="col-md-5">
                                        <input type="Email" required="" parsley-type="url" class="form-control input-sm" id="webSite" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-default waves-effect waves-light btn-sm" id="success-alert">
                                            SUBMIT
                                        </button>
                                        <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                           CANCEL
                                        </button>
                                    </div>
                                </div>
                            </form>
    </div>
</div>
</div>
<!-- end page title end breadcrumb -->
</div> <!-- end container -->
</div>
<!-- end wrapper -->