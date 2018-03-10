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
    <div class="col-md-12">
        <form role="form" id="frmagent">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="agentname" id="txtagentname" parsley-type="txtagentname" class="form-control input-sm"  placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="agentname" id="txtagentname" parsley-type="txtagentname" class="form-control input-sm"  placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="agentname" id="txtagentname" parsley-type="txtagentname" class="form-control input-sm"  placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtcompany" class="col-md-2">Company<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="company" id="txtcompany" parsley-type="txtcompany" class="form-control input-sm"  placeholder="Company">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtpassportno" class="col-md-2"> Passport Number </label>
                                    <div class="col-md-4">
                                        <input type="text" name="passportno" id="txtpassportno" parsley-type="txtpassportno" class="form-control input-sm" placeholder="IC/PassportNumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2"></label>
                                    <label for="cheexclusieveegent" class="col-md-1 col-md-offset-2"><div class="checkbox checkbox-inverse">
                                            <input name="exclusiveagent" id="cheexclusieveegent" type="checkbox" checked="">
                                            <label for="cheexclusieveegent">
                                                  Exclusive Agent
                                            </label>
                                        </div> </label>
                                    
                                </div>
                                <div class="form-group row">
                                    <label for="txtcontactno" class="col-md-2">   Contact No  <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="contactno" id="txtcontactno"  parsley-type="contactno" class="form-control input-sm" placeholder="Contact No ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtemail" class="col-md-2">   Email  <span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" name="email" id="txtemail" parsley-type="txtemail" class="form-control input-sm" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtaddress" class="col-md-2"> Address </label>
                                    <div class="col-md-4">
                                        <textarea name="address" id="txtaddress" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="txtcomments" class="col-md-2">   Comments  </label>
                                    <div class="col-md-4">
                                        <textarea name="comments" id="txtcomments" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                               
                                    <label for="profilepic" class="col-md-2"> Profile Pic </label>
                                    <div class="col-md-4">
                                        <input type="file" name="profilepic" id="profilepic" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);"/>
                                         <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0" class="btn btn-primary "> <span class="buttonText">Choose file</span></label></span></div>
                                </div>
                               
                                
                                <div class="form-group row ">
                                    <label class="col-md-2"></label>
                                    <div class=" col-md-4 col-md-offset-2">
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
<script src="<?php echo base_url(); ?>assets/validations/agentValidation.js" type="text/javascript"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
         var _baseUrl ='<?php echo base_url(); ?>';
         agentjs.Load(_baseUrl);
     })
 </script>