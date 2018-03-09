var branchjs = (function () {
    var _branchLocation;
    var _branchAddress;
    var _branchPhone;
    var _branchFax;
    var _branchEmail;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _branchLocation = $("#branchLocation");
        _branchAddress = $("#branchAddress");
        _branchPhone = $("#branchPhone");
        _branchFax = $("#branchFax");
        _branchEmail = $("#branchEmail");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveDepartmentDetails);
    }

    var SaveDepartmentDetails = function () {
        var BranchJson = {};
        BranchJson.location = _branchLocation.val();
        BranchJson.address = _branchAddress.val();
        BranchJson.phonenumber = _branchPhone.val();
        BranchJson.faxnumber = _branchFax.val();
        BranchJson.email = _branchEmail.val();
//        alert(_DepartmentName.val());
        var validator = $('#branch_form').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'Branches/saveBranchAjax',
                data: {BranchData: BranchJson},
                dataType: 'json',
                success: function (data) {

                    $.LoadingOverlay("hide");
//                                console.log(data);
                    if (data['isError'] == "N") {
                        alert(data['message']);
                    }else{
                        alert(data['message']);
                    }
                },
                error: function (data) {

                }
            })
        }

    }
    var FormValidator = function () {
        $('#branch_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                branchLocation: {
                    validators: {
                        notEmpty: {
                            message: 'The department location is required and cannot be empty'
                        }
                    }
                },
                branchAddress: {
                    validators: {
                        notEmpty: {
                            message: 'The department address is required and cannot be empty'
                        }
                    }
                }

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

