var jobsjs = (function () {
    var _jobs_skillset;
    var _jobs_numberofposition;
    var _jobs_position;
    var _jobs_joiningdate;
    var _jobs_position_startdate;
    var _jobs_position_enddate;
    var _jobs_country;
    var _jobs_description;
    var _jobs_eligibilitycriteria;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _jobs_numberofposition=$("#jobs_numberofposition");
        _jobs_skillset = $("#jobs_skillset");
        _jobs_position = $("#jobs_position");
        _jobs_joiningdate = $("#jobs_joiningdate");
        _jobs_position_startdate = $("#jobs_position_startdate");
        _jobs_position_enddate = $("#jobs_position_enddate");
        _jobs_country = $("#jobs_country");
        _jobs_description = $("#jobs_description");
        _jobs_eligibilitycriteria = $("#jobs_eligibilitycriteria");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveJobDetails);
    }

    var SaveJobDetails = function () {
        var jobJson = {};
        jobJson.jobs_numberofposition = _jobs_numberofposition.val();
        jobJson.jobs_skillset = _jobs_skillset.val().toString();
        jobJson.jobs_position = _jobs_position.val();
        jobJson.jobs_joiningdate = _jobs_joiningdate.val();
        jobJson.jobs_position_startdate = _jobs_position_startdate.val();
        jobJson.jobs_position_enddate = _jobs_position_enddate.val();
        jobJson.jobs_country = _jobs_country.val();
        jobJson.jobs_description = _jobs_description.val();
        jobJson.jobs_eligibilitycriteria = CKEDITOR.instances['jobs_eligibilitycriteria'].getData();
        console.log(jobJson);
        var validator = $('#jobs_form').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'Jobs/saveJob',
                data: {jobJson: jobJson},
                dataType: 'json',
                success: function (data) {

                    $.LoadingOverlay("hide");
                    window.location.href = _Url+'Jobs';
//                                console.log(data);
                    if (data['isError'] == "N") {
                        alert(data['message']);
                    } else {
                        alert(data['message']);
                    }
                },
                error: function (data) {

                }
            })
        }

    }
    var FormValidator = function () {
        $('#jobs_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                jobs_position: {
                    validators: {
                        notEmpty: {
                            message: 'The jobs position is required and cannot be empty'
                        }
                    }
                },
                jobs_description: {
                    validators: {
                        notEmpty: {
                            message: 'The jobs description is required and cannot be empty'
                        }
                    }
                }

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

