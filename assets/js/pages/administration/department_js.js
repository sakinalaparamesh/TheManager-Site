var departmentjs = (function () {
    var _Departmentid;
    var _DepartmentName;
    var _DepartmentCode;
    var _DepartmentDescription;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _Departmentid = $("#txtDepartmentid");
        _DepartmentName = $("#txtDepartmentName");
        _DepartmentCode = $("#txtDepartmentCode");
        _DepartmentDescription = $("#txtDepartmentDescription");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveDepartmentDetails);
    }

    var SaveDepartmentDetails = function () {
        var DepartmentJson = {};
        DepartmentJson.departmentid = _Departmentid.val();
        DepartmentJson.DepartmentName = _DepartmentName.val();
        DepartmentJson.DepartmentCode = _DepartmentCode.val();
        DepartmentJson.DepartmentDescription = _DepartmentDescription.val();
//        alert(_DepartmentName.val());
        var validator = $('#frmdepartment').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'Department/saveDepartment',
                data: {DepartmentData: DepartmentJson},
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
        $('#frmdepartment').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                departmentname: {
                    validators: {
                        notEmpty: {
                            message: 'The departmentname is required and cannot be empty'
                        }
                    }
                },
                departmentcode: {
                    validators: {
                        notEmpty: {
                            message: 'The departmentcode is required and cannot be empty'
                        }
                    }
                }

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

