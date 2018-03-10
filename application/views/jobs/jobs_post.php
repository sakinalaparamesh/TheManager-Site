<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="">Jobs List</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h4 class="page-title">Job Post</h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form role="form" id="frmdepartment">
            <input type="hidden" id="txtDepartmentid"  value="<?=(isset($department_info->departmentid))?$department_info->departmentid:""?>">
                                <div class="form-group row">
                                    <label for="txtDepartmentName" class="col-md-2">Job Position<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" required="" name="departmentname" parsley-type="name" class="form-control input-sm" id="txtDepartmentName" placeholder="Job Position" value="<?=@$department_info->departmentname?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                               
                                    <label for="Department_code" class="col-md-2">Posting start date <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input id="txtDepartmentCode" name="departmentcode" type="text" placeholder="Posting start date" required="" class="form-control input-sm" value="<?=@$department_info->departmentcode?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">End date
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                       <input id="txtDepartmentCode" name="departmentcode" type="text" placeholder="End date" required="" class="form-control input-sm" value="<?=@$department_info->departmentcode?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">Joining Date
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                       <input id="txtDepartmentCode" name="departmentcode" type="text" placeholder="Joining Date" required="" class="form-control input-sm" value="<?=@$department_info->departmentcode?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">Country
                                        <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                       <select class="form-control">
                                                        <option>Malaysia</option>
                                                        <option>India</option>
                                                        <option>China</option>
                                                        <option>USA</option>
                                                        <option>UK</option>
                                                    </select>
                                    </div>
                                </div>
                               
                                <div class="form-group row ">
                                    <label  class="col-md-2"></label>
                                    <div class=" col-md-4">
                                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
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
 <script src="<?php echo base_url(); ?>assets/js/pages/administration/department_js.js" type="text/javascript"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
         var _baseUrl ='<?php echo base_url(); ?>';
         departmentjs.Load(_baseUrl);
     })
 </script>
