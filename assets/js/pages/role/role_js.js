var rolejs = (function () {

    var _RoleName;
    var id;
    var _displayname;
    var _Url;
    var _btnSubmit;
    var _Load = function (url) {
        _Url = url;
        /*
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
         })*/

        _RoleName = $("#txtRoleName");
        id = $("#roleid");
        _displayname = $("#txtDisplayname");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveRoleDetails);
    }

    var SaveRoleDetails = function () {


        var tileids = "";

        var ParentTileIds = [];


        $('.chk_tiles').each(function (index) {
            if ($(this).is(':checked')) {

                tileids += $(this).val() + ",";
                var _ParentTileId = $(this).attr("data-chk_tilespar");
                if (jQuery.inArray(_ParentTileId, ParentTileIds) == -1) {
                    tileids += _ParentTileId + ",";
                    ParentTileIds.push(_ParentTileId);
                }

            }
        });
        var RoleJson = {};
        RoleJson.chk_module = [];
        RoleJson.chk_tiles = tileids;

        RoleJson.rolename = _RoleName.val();
        RoleJson.id = id.val();


        $('.chk_module').each(function (index) {
            if ($(this).is(':checked')) {
                var _ControllerAction = {};
                _ControllerAction.ModuleId = $(this).val();
                _ControllerAction.ControllerId = $(this).attr("data-ControllerId");
                RoleJson.chk_module.push(_ControllerAction);
            }
        });



//        alert(moduleIds);
        var validator = $('#frmrole').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'Role/saveRole',
                data: {RoleJson: RoleJson},
                dataType: 'json',
                success: function (data) {
                    $.LoadingOverlay("hide");
//                                console.log(data);
//                    var obj = JSON.parse(data);
//                                console.log(data.message);
//                                alert(data['message']);
                    if (data['isError'] == "N") {

                        swal({
                            title: "Success",
                            text: data['message'],
                            type: "success"
                        },
                                function () {
                                    window.location.href = _Url + 'Role';
                                });
                    } else {
                        swal({
                            title: "Error",
                            text: data['message'],
                            type: "error"
                        });


                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    swal({
                        title: "Error",
                        text: "Technical Error Occured",
                        type: "error"
                    });
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

