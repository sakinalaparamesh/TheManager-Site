var agentjs = (function () {
    var _Agentname;
    var _Company;
    var _Passportnumber;
    var _Exclusieveagent;
    var _Contactno;
    var _Email;
    var _Address;
    var _comments;
    var _profilepic;
    var _user_countryid;
//    var _role_id;
    var _Url;
    /* $("#department_list").change(function () {
     var department_id;
     department_id=$(this).val();
     $.LoadingOverlay("show");
     //        alert(department_id);
     $.ajax({
     type: "GET",
     url: _Url + 'Role/getRolesbyDepartmentid',
     data: {department_id: department_id},
     dataType: 'json',
     success: function (data) {
     //                console.log(data);
     var html = '';
     for (var i = 0; i < data.length; i++) {
     html += '<option value="' + data[i]['roleid'] + '">' + data[i]['rolename'] + '</option>';
     }
     document.getElementById("role_id").innerHTML = html;
     $.LoadingOverlay("hide");
     },
     error: function (xhr, textStatus, errorThrown) {
     alert("Error");
     alert(xhr.responseText);
     }
     })
     })*/
    var _Load = function (url) {
        _Url = url;
        _user_countryid = $("#user_countryid");
//        _role_id=$("#role_id");
        _Agentname = $("#txtagentname");
        _Company = $("#txtcompany");
        _Passportnumber = $("#txtpassportno");
        _Exclusieveagent = $("#cheexclusieveegent");
        _Contactno = $("#txtcontactno");
        _Email = $("#txtemail");
        _Address = $("#txtaddress");
        _comments = $("#txtcomments");
        _profilepic = $("#profilepic");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveAgentDetails);
    }

    var SaveAgentDetails = function () {
        var logoImg = $('input[name="profilepic"]').get(0).files[0];

        var formData = new FormData();
        formData.append('profilepic', logoImg);

//        var AgentJson = {};
//        AgentJson.user_countryid = _user_countryid.val();
//        AgentJson.role_id = _role_id.val();
//        AgentJson.Agentname = _Agentname.val();
//        AgentJson.Company = _Company.val();
//        AgentJson.Passportnumber = _Passportnumber.val();
//        AgentJson.Exclusieveagent = _Exclusieveagent.val();
//        AgentJson.Contactno = _Contactno.val();
//        AgentJson.Email = _Email.val();
//        AgentJson.Address = _Address.val();
//        AgentJson.comments = _comments.val();

        formData.append('Agentname', _Agentname.val());
        formData.append('user_countryid',_user_countryid.val());
        formData.append('Company',_Company.val());
        formData.append('Passportnumber',_Passportnumber.val());
        formData.append('Contactno',_Contactno.val());
        formData.append('Email',_Email.val());
        formData.append('Address',_Address.val());
        formData.append('comments',_comments.val());
//        console.log(formData.agentdata);
        var validator = $('#frmagent').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
//            alert("hello" + validator.isValid());
            $.ajax({
                type: "POST",
                url: _Url + 'agent/saveAgent',
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
//                                console.log(obj.message);
                    if (obj.isError == "N") {
                        alert(obj.message);
                         window.location.href = _Url+'agent';
                    } else {
                        alert(obj.message);
                       
                    }
//                    location.reload();
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Error");
                    alert(xhr.responseText);
                }
            })
        }

    }
    var FormValidator = function () {
        $('#frmagent').bootstrapValidator({
//container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                agentname: {
                    validators: {
                        notEmpty: {
                            message: 'The agentname is required and cannot be empty'
                        }
                    }
                },
//                company: {
//                    validators: {
//                        notEmpty: {
//                            message: 'The company is required and cannot be empty'
//                        }
//                    }
//                },
//                exclusiveagent: {
//                    validators: {
//                        notEmpty: {
//                            message: 'The Exclusiveagent is required and cannot be empty'
//                        }
//                    }
//                },
                contactno: {
                    validators: {
                        notEmpty: {
                            message: 'The Contactno is required and cannot be empty'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The Email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The Email  is not valid'
                        }
                    }
                }


            }
        }); //bootstrapValidator
    }
    return {Load: _Load}

})();

