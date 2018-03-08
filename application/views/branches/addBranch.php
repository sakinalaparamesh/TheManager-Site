<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="clients.php">Client List</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h4 class="page-title">Branch Registration</h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form role="form" id="branch_form">
                                <div class="form-group row">
                                    <label for="branchLocation" class="col-md-2">Branch Location<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" required="" parsley-type="name" class="form-control input-sm" id="branchLocation" placeholder="Name" name="branchLocation">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="branchAddress" class="col-md-2"> Address <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="branchAddress" rows="3" name="branchAddress"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="branchPhone" class="col-md-2"> Phone No <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" parsley-type="name" class="form-control input-sm" id="branchPhone" placeholder="IC/PassportNumber" name="branchPhone">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-1 col-md-offset-2"><div class="checkbox checkbox-inverse">
                                            <input id="checkbox2" type="checkbox" checked="">
                                            <label for="checkbox2">
                                                  Exclusieve Agent
                                            </label>
                                        </div> </label>
                                    
                                </div> -->
                                <div class="form-group row">
                                    <label for="branchFax" class="col-md-2">   Fax No  <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" parsley-type="name" class="form-control input-sm" id="branchFax" placeholder="Contact No " name="branchFax">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="branchEmail" class="col-md-2">   Email  <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" parsley-type="name" class="form-control input-sm" id="branchEmail" placeholder="Email" name="branchEmail">
                                    </div>
                                </div>
                               
                                
                                <div class="form-group row ">
                                    <label class="col-md-2"></label>
                                    <div class=" col-md-4">
                                        <button type="submit" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
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
<script src="<?php echo base_url(); ?>assets/js/pages/administration/branches_form.js" type="text/javascript"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
         var _baseUrl ='<?php echo base_url(); ?>';
         branchjs.Load(_baseUrl);
     })
 </script>