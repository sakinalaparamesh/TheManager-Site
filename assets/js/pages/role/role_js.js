var rolejs= (function(){
    var _RoleName;
    var _RoleDescription;
    var _Url;
    var _Load = function(url){
        _Url =url;
        _RoleName = $("#txtRoleName");
        _RoleDescription = $("#txtRoleDescription");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function(){
        _btnSubmit.on('click',SaveRoleDetails);
    }
    
    var SaveRoleDetails = function(){
        var RoleJson = {};
        RoleJson.RoleName = _RoleName.val();
        RoleJson.RoleDescription = _RoleDescription.val();
        alert(_RoleName.val());
         var validator = $('#frmrole').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
           $.ajax({
                        type: "POST",
                        url: _Url+'Role/saveRole',
                        data: { RoleData : RoleJson },
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
    var FormValidator = function(){
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
//             rolecode: {
//                validators: {
//                    notEmpty: {
//                        message: 'The Rolecode is required and cannot be empty'
//                    }
//                }
//            }
           
        }
    });//bootstrapValidator
    }
    return {Load : _Load }
    
})();

