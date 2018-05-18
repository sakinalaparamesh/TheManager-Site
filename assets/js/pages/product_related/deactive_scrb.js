var subscription = (function () {

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
        var validator = $('#frmsubscription').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/deactivateSubscription',
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
                scrb_act_date: {
                    validators: {
                        notEmpty: {
                            message: 'The Date of activation is required and cannot be empty'
                        }
                    }
                },
                scrb_act_or_de_paid_amt: {
                    validators: {
                        notEmpty: {
                            message: 'The Initial paid amount is required and cannot be empty'
                        }
                    }
                },
                scrb_act_or_de_paymethod: {
                    validators: {
                        notEmpty: {
                            message: 'The Payment Methods is required and cannot be empty'
                        }
                    }
                },
                scrb_bank_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Bank name is required and cannot be empty'
                        }
                    }
                },
                scrb_act_or_de_trn_ref_num: {
                    validators: {
                        notEmpty: {
                            message: 'The Transaction Reference Number is required and cannot be empty'
                        }
                    }
                }
            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

