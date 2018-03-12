<!-- Page-Title -->
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group pull-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="employees.php">Roles List</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Roles</h4>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row">
                <div class="col-md-12">
                    <form role="form" id="frmrole">
                        <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group row">
                            <label for="department_list" class="col-md-4">Departments<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select id="department_list" class="form-control input-sm" name="departmentid">
                                    <?php foreach($department_list as $list){ ?>
                                    <option value="<?=$list['departmentid']?>"><?=$list['departmentname']?></option>
 <?php } ?>
                                </select>
                            </div>
                        </div>
                            
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                            <label for="txtRoleName" class="col-md-2">Role Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="rolename" parsley-type="name" class="form-control input-sm" id="txtRoleName" placeholder="Role Name">
                            </div>
                        </div>
                        </div>
                            </div>

                        
                        
                        <!--                                <div class="form-group row">
                                                       
                                                            <label for="Role_code" class="col-md-2">Role code<span class="text-danger">*</span></label>
                                                            <div class="col-md-4">
                                                                <input id="txtRoleCode" name="rolecode" type="text" placeholder="Role code" required="" class="form-control input-sm">
                                                            </div>
                                                        </div>-->
                        <div class="row">
                            <div class="col-md-3">
                                 <div class="form-group row">
                            <label for="hori-pass2" class="col-md-4">Description
                                <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="txtRoleDescription" rows="5" name="roledescription"></textarea>
                            </div>
                        </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group row">
                            <label for="txtDisplayname" class="col-md-2">Display Name<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="displayname" parsley-type="name" class="form-control input-sm" id="txtDisplayname" placeholder="">
                            </div>
                        </div>
                            </div>
                                
                        </div>
                         </div>
            </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="controllers_role" data-spy="scroll">
                            <div class="row">
                            <div class="col-md-5">
                            <div class="controller">
                                <div class="text-dark font-13 m-b-15 m-t-20"><b> Controller 1 </b> </div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label for="inlineCheckbox1"> Add </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox2" value="option1">
                                            <label for="inlineCheckbox2"> Edit </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox3" value="option1">
                                            <label for="inlineCheckbox3"> List </label>
                                        </div>
                                <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox13" value="option1">
                                            <label for="inlineCheckbox13"> Download </label>
                                        </div>
                       </div> 
                                </div>
                            <div class="col-md-6">
                            <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 2 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox4" value="option1">
                                            <label for="inlineCheckbox4"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox5" value="option1">
                                            <label for="inlineCheckbox5"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox6" value="option1">
                                            <label for="inlineCheckbox6"> Add </label>
                                            </div>
                                             <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox13" value="option1">
                                            <label for="inlineCheckbox13"> Download </label>
                                        </div>
                                        
                       </div>
                            </div>
                                </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 3 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox7" value="option1">
                                            <label for="inlineCheckbox7"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox8" value="option1">
                                            <label for="inlineCheckbox8"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox9" value="option1">
                                            <label for="inlineCheckbox9"> Add </label>
                                        </div>
                            <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox13" value="option1">
                                            <label for="inlineCheckbox13"> Download </label>
                                        </div>
                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 4 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox7" value="option1">
                                            <label for="inlineCheckbox7"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox8" value="option1">
                                            <label for="inlineCheckbox8"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox9" value="option1">
                                            <label for="inlineCheckbox9"> Add </label>
                                        </div>
                       </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-5">
                                    <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 3 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox7" value="option1">
                                            <label for="inlineCheckbox7"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox8" value="option1">
                                            <label for="inlineCheckbox8"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox9" value="option1">
                                            <label for="inlineCheckbox9"> Add </label>
                                        </div>
                            <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox13" value="option1">
                                            <label for="inlineCheckbox13"> Download </label>
                                        </div>
                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 4 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox7" value="option1">
                                            <label for="inlineCheckbox7"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox8" value="option1">
                                            <label for="inlineCheckbox8"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox9" value="option1">
                                            <label for="inlineCheckbox9"> Add </label>
                                        </div>
                       </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-5">
                                    <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 3 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox7" value="option1">
                                            <label for="inlineCheckbox7"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox8" value="option1">
                                            <label for="inlineCheckbox8"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox9" value="option1">
                                            <label for="inlineCheckbox9"> Add </label>
                                        </div>
                            <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox13" value="option1">
                                            <label for="inlineCheckbox13"> Download </label>
                                        </div>
                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="controller">
                           <div class="text-dark font-13 m-b-15 m-t-20"> <b> Controller 4 </b></div>
                       <div class="checkbox checkbox-inverse form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox7" value="option1">
                                            <label for="inlineCheckbox7"> View </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox8" value="option1">
                                            <label for="inlineCheckbox8"> List </label>
                                        </div>
                       <div class="checkbox checkbox-inverse  form-check-inline">
                                            <input type="checkbox" id="inlineCheckbox9" value="option1">
                                            <label for="inlineCheckbox9"> Add </label>
                                        </div>
                       </div>
                                </div>
                            </div>
                            
                           
                            
                            
                            
                            
                            
                       </div>
                        
                        <div class="form-group row m-t-30 ">
                            <div class=" col-md-4 col-md-offset-2">
                                <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                                    SUBMIT
                                </button>
                                <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                    CANCEL
                                </button>
                            </div>
                        </div>
                        
                        </div>
                </div>
                    
                    </form>
                </div>
           
        </div>
        <!-- end page title end breadcrumb -->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->
<script src="<?php echo base_url(); ?>assets/js/pages/role/role_js.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var _baseUrl = '<?php echo base_url(); ?>';
        rolejs.Load(_baseUrl);
    })
</script>