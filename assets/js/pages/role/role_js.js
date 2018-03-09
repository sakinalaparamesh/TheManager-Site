var rolejs = (function () {
    var _Departmentid;
    var _RoleName;
    var _RoleDescription;
    var _displayname;
    var _Url;
    var _Load = function (url) {
        _Url = url;

        $.ajax({
            type: "GET",
            url: _Url + 'Department/getDepartmentsForDdl',

            dataType: 'json',
            success: function (data) {
//                console.log(data);
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i]['departmentid'] + '">' + data[i]['departmentname'] + '</option>';
                }
                document.getElementById("department_list").innerHTML = html;
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error");
                alert(xhr.responseText);
            }
        })
        _Departmentid = $("#department_list");
        _RoleName = $("#txtRoleName");
        _RoleDescription = $("#txtRoleDescription");
        _displayname=$("#txtDisplayname");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveRoleDetails);
    }

    var SaveRoleDetails = function () {
        var RoleJson = {};
        RoleJson.departmentid = _Departmentid.val();
        RoleJson.RoleName = _RoleName.val();
        RoleJson.RoleDescription = _RoleDescription.val();
        RoleJson.displayname =_displayname.val();
//        alert(_RoleName.val());
        var validator = $('#frmrole').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.ajax({
                type: "POST",
                url: _Url + 'Role/saveRole',
                data: {RoleData: RoleJson},
                dataType: 'json',
                success: function (data) {
                    alert("data saved successfully");
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Error");
                    alert(xhr.responseText);
                }
            })
        }

    }
    var FormValidator = function () {
        $('#frmrole').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                rolename: {
                    validators: {
                        notEmpty: {
                            message: 'The Rolename is required and cannot be empty'
                        }
                    }
                },
             displayname: {
                validators: {
                    notEmpty: {
                        message: 'The Displayname is required and cannot be empty'
                    }
                }
            }

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

