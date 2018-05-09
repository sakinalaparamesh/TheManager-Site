var subscription = (function () {

    var _Url;
    var _Load = function (url) {
        _Url = url;



        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveRoleDetails);
    }

    var SaveRoleDetails = function () {
        var validator = $('#frmsubscription').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/saveSubscription',
                data: $('#frmsubscription').serialize(),

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
        $('#frmsubscription').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                subscriptions_prd_id: {
                    validators: {
                        notEmpty: {
                            message: 'The product is required and cannot be empty'
                        }
                    }
                },
                subscriptions_company_name: {
                    validators: {
                        notEmpty: {
                            message: 'The company name is required and cannot be empty'
                        }
                    }
                },
                subscriptions_reg_number: {
                    validators: {
                        notEmpty: {
                            message: 'The company registration number is required and cannot be empty'
                        }
                    }
                },
                subscriptions_cmp_email: {
                    validators: {
                        notEmpty: {
                            message: 'The company email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The Email  is not valid'
                        }
                    }
                },
                subscriptions_cmp_phone: {
                    validators: {
                        notEmpty: {
                            message: 'The company phone number is required and cannot be empty'
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
                subscriptions_cmp_pc_pname: {
                    validators: {
                        notEmpty: {
                            message: 'The person name is required and cannot be empty'
                        }
                    }
                },
                subscriptions_cmp_pc_pemail: {
                    validators: {
                        notEmpty: {
                            message: 'The person email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The Email  is not valid'
                        }
                    }
                }

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

