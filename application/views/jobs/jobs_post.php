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
                        <div class="form-group row">
                            <label for="jobs_position" class="col-md-2">Designation<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="jobs_position" parsley-type="name" class="form-control input-sm" id="jobs_position" placeholder="Job Position" value="<?= @$info->jobs_position ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_position" class="col-md-2">Skill set<span class="text-danger">*</span></label>
                            <!--                            <div class="col-md-4">
                                                            <input type="text" required="" name="jobs_position" parsley-type="name" class="form-control input-sm" id="jobs_position" placeholder="Job Position" value="<?= @$info->jobs_position ?>">
                                                        </div>-->
                            <div class="col-md-4">
                                <select class="select2 select2-multiple select2" multiple="" data-placeholder="Choose ..." tabindex="-1" aria-hidden="true">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_description" class="col-md-2">Job Description
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="jobs_description" rows="3" name="jobs_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_numberofposition" class="col-md-2">Number of Positions<span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input type="text" required="" name="jobs_numberofposition" parsley-type="name" class="form-control input-sm" id="jobs_numberofposition" placeholder="Job Position" value="<?= @$info->jobs_numberofposition ?>">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="jobs_position_startdate" class="col-md-2">Start date <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="jobs_position_startdate" name="jobs_position_startdate" type="text" placeholder="Posting start date" required="" class="form-control input-sm" value="<?= @$info->jobs_position_startdate ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_position_enddate" class="col-md-2">End date
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="jobs_position_enddate" name="jobs_position_enddate" type="text" placeholder="End date" required="" class="form-control input-sm" value="<?= @$info->jobs_position_enddate ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_joiningdate" class="col-md-2">Joining Date
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <input id="jobs_joiningdate" name="jobs_joiningdate" type="text" placeholder="Joining Date" required="" class="form-control input-sm" value="<?= @$info->jobs_joiningdate ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jobs_country" class="col-md-2">Country
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <select class="form-control" name="jobs_country" id="jobs_country">
                                    <?php foreach ($country_list as $list) { ?>
                                        <option value="<?= $list['configuration_id'] ?>"><?= $list['configuration_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jobs_eligibilitycriteria" class="col-md-2">Job Eligibility Criteria
                                <span class="text-danger">*</span></label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="jobs_eligibilitycriteria" rows="3" name="jobs_eligibilitycriteria"></textarea>
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
        CKEDITOR.replace('jobs_eligibilitycriteria');
        var _baseUrl = '<?php echo base_url(); ?>';
        jobsjs.Load(_baseUrl);
    })
</script>
