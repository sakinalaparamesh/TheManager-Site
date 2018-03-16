var userjs = (function () {
    var _Username;
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
    
    var _Load = function (url) {
        _Url = url;
        _user_countryid = $("#user_countryid");
//        _role_id=$("#role_id");
        _Username = $("#txtusername");
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
        _btnSubmit.on('click', SaveUserDetails);
    }

    var SaveUserDetails = function () {
        var logoImg = $('input[name="profilepic"]').get(0).files[0];

        var formData = new FormData();
        formData.append('profilepic', logoImg);

//        var UserJson = {};
//        UserJson.user_countryid = _user_countryid.val();
//        UserJson.role_id = _role_id.val();
//        UserJson.Username = _Username.val();
//        UserJson.Company = _Company.val();
//        UserJson.Passportnumber = _Passportnumber.val();
//        UserJson.Exclusieveagent = _Exclusieveagent.val();
//        UserJson.Contactno = _Contactno.val();
//        UserJson.Email = _Email.val();
//        UserJson.Address = _Address.val();
//        UserJson.comments = _comments.val();

        formData.append('Username', _Username.val());
        formData.append('user_countryid',_user_countryid.val());
        formData.append('Company',_Company.val());
        formData.append('Passportnumber',_Passportnumber.val());
        formData.append('Contactno',_Contactno.val());
        formData.append('Email',_Email.val());
        formData.append('Address',_Address.val());
        formData.append('comments',_comments.val());
//        console.log(formData.agentdata);
        var validator = $('#frmuser').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
//            alert("hello" + validator.isValid());
            $.ajax({
                type: "POST",
                url: _Url + 'user/saveUser',
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
//                                console.log(obj.message);
                    if (obj.isError == "N") {
                        alert(obj.message);
                         window.location.href = _Url+'user';
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
        $('#frmuser').bootstrapValidator({
//container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The Username is required and cannot be empty'
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

