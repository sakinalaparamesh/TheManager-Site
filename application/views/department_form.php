<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="employees.php">Departments List</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h4 class="page-title">Add Departments</h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form role="form" >
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" required="" parsley-type="name" class="form-control input-sm" id="inputEmail3" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                               
                                    <label for="Department_code" class="col-md-2">Department code<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input id="Department_code" type="text" placeholder="Department code" required="" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                               
                                    <label for="webSite" class="col-md-2">Status<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="Email" required="" parsley-type="url" class="form-control input-sm" id="webSite" placeholder="Status">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                     <label class="col-md-2"></label>
                                    <div class=" col-md-4 col-md-offset-2">
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