var subscriptionpoc = (function () {

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
        var validator = $('#frm_pocscription').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/pocSubscriptionUpdate',
                data: $('#frm_pocscription').serialize(),

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
        $('#frm_pocscription').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                poc_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Person name is required and cannot be empty'
                        }
                    }
                },
                poc_email: {
                    validators: {
                        notEmpty: {
                            message: 'The email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'The Email  is not valid'
                        }
                    }
                },
                poc_phone: {
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
                }
            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

