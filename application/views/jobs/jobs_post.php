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
                    <form role="form" id="jobs_form">
                        <input type="hidden" id="jobs_id"  value="<?=(isset($info->jobs_id))?$info->jobs_id:""?>">
                        <div class="form-group row">
                            <label for="jobs_title" class="col-md-2">Job Title
                                <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="jobs_title" name="jobs_title" value="<?= @$info->jobs_title ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="jobs_position" class="col-md-2">Designation<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="jobs_position" id="jobs_position"  parsley-type="name" class="form-control input-sm" placeholder="Job Position" value="<?= @$info->jobs_position ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_skillset" class="col-md-2">Skill set<span class="text-danger"></span></label>
                            <!--                            <div class="col-md-4">
                                                            <input type="text" required="" name="jobs_position" parsley-type="name" class="form-control input-sm" id="jobs_position" placeholder="Job Position" value="<?= @$info->jobs_position ?>">
                                                        </div>-->
                            <div class="col-md-4">
                                <select id="jobs_skillset" class="select2 select2-multiple select2" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true">
                                    <?php foreach ($skillset_list as $list) { ?>
                                        <option value="<?= $list['configuration_id'] ?>" <?=(strpos(@$info->jobs_skillset,$list['configuration_id'])!== false)?"selected":""?>><?= $list['configuration_name'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_description" class="col-md-2">Job Description
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="jobs_description" rows="3" name="jobs_description"><?= @$info->jobs_description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_experience_min" class="col-md-2">Minimum years
                                <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" id="jobs_experience_min" name="jobs_experience_min" value="<?= @explode("-", $info->jobs_experience)[0] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_experience_max" class="col-md-2">Maximum years
                                <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input type="number" class="form-control" id="jobs_experience_max" name="jobs_experience_max" value="<?= @@explode("-", $info->jobs_experience)[1] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_contact_email" class="col-md-2">Contact person email
                                <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input type="email" class="form-control" id="jobs_contact_email" name="jobs_contact_email" value="<?= @$info->jobs_contact_email ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="jobs_numberofposition" class="col-md-2">Number of Positions<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="number" required="" name="jobs_numberofposition" parsley-type="name" class="form-control input-sm" id="jobs_numberofposition" placeholder="Job Position" value="<?= @$info->jobs_numberofposition ?>">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="jobs_position_startdate" class="col-md-2">Start date <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input id="jobs_position_startdate" name="jobs_position_startdate" type="text" placeholder="Posting start date" class="form-control input-sm datepicker_common" value="<?= date("Y-m-d", strtotime(@$info->jobs_position_startdate)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_position_enddate" class="col-md-2">End date
                                <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input id="jobs_position_enddate" name="jobs_position_enddate" type="text" placeholder="End date" class="form-control input-sm datepicker_common" value="<?= date("Y-m-d", strtotime(@$info->jobs_position_enddate)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_joiningdate" class="col-md-2">Joining Date
                                <span class="text-danger"></span></label>
                            <div class="col-md-4">
                                <input id="jobs_joiningdate" name="jobs_joiningdate" type="text" placeholder="Joining Date" class="form-control input-sm datepicker_common" value="<?= date("Y-m-d", strtotime(@$info->jobs_joiningdate)) ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_country" class="col-md-2">Country
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <select class="form-control" name="jobs_country" id="jobs_country">
                                    <?php foreach ($country_list as $list) { ?>
                                        <option value="<?= $list['configuration_id'] ?>" <?=(@$info->jobs_country==$list['configuration_id'])?"selected":""?>><?= $list['configuration_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jobs_eligibilitycriteria" class="col-md-2">Job Eligibility Criteria
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="jobs_eligibilitycriteria" rows="3" name="jobs_eligibilitycriteria"><?= @$info->jobs_eligibilitycriteria ?></textarea>
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
<script src="<?php echo base_url(); ?>assets/js/pages/jobs/jobsform_js.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            placeholder: 'Select an option'
        });
        var todaysDate = new Date();
        $('.datepicker_common').datepicker({
            autoclose: true,
            format: 'mm/dd/yyyy',
//            endDate: todaysDate,
            todayBtn: "linked",
            todayHighlight: true
        });
        CKEDITOR.replace('jobs_eligibilitycriteria');
        var _baseUrl = '<?php echo base_url(); ?>';
        jobsjs.Load(_baseUrl);
    })
</script>
