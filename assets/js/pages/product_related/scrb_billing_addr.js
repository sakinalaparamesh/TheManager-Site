var subscription_billing = (function () {

    var _Url;
    var _Load = function (url) {
        _Url = url;
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', activeSubscription);
    }

    var activeSubscription = function () {
        var validator = $('#frm_billing_conf').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/billingConfigSubscriptionUpdate',
                data: $('#frm_billing_conf').serialize(),

                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj=JSON.parse(data);
//                                console.log(data);
                    if (obj.isError == "N") {
                        swal({
                            title: "Success",
                            text: obj.message,
                            type: "success"
                        },
                                function () {
                                    window.location.href = _Url + 'ProductSubscriptions';
                                });
                    } else {
                        swal({
                            title: "Error",
                            text: obj.message,
                            type: "error"
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Error");
                    alert(xhr.responseText);
                }
            })
        }

    }
    var FormValidator = function () {
        $('#frm_billing_conf').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                billing_address_contact_person: {
                    validators: {
                        notEmpty: {
                            message: 'The Person name is required and cannot be empty'
                        }
                    }
                },
                billing_address_contact_person_email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The Email  is not valid'
                        }
                    }
                },
                billing_address_contact_person_mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The Phone Number is required and cannot be empty'
                        },
                        integer: {
                            message: 'Phone Number should have only digits'
                        },
                        stringLength: {
                            message: 'Phone Number should have 7-10 digits',
                            min: 7,
                            max: 10
                        }
                    }
                },
                billing_address:{
                    validators: {
                        notEmpty: {
                            message: 'The billing address is required and cannot be empty'
                        }
                    }
                }
            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

