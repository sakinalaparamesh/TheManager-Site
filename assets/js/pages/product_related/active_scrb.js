var subscription = (function () {

    var _Url;
    var _Load = function (url) {
        _Url = url;
        _btnSubmit = $("#btnSubmit2");
        _btnSubmit3 = $("#btnSubmit3");
        _btnSubmit4 = $("#btnSubmit4");
        _btnSubmit5 = $("#btnSubmit5");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', activeSubscription);
        _btnSubmit3.on('click', activeSubscription3);
        _btnSubmit4.on('click', activeSubscription4);
        _btnSubmit5.on('click', activeSubscription5);
    }

    var activeSubscription = function () {
        var validator = $('#frmsubscription2').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/activateSubscription',
                data: $('#frmsubscription2').serialize(),

                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
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
    var activeSubscription3 = function () {
       
       
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/activateSubscription',
                data: $('#frmsubscription3').serialize(),

                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
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
    var activeSubscription4 = function () {
        
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/activateSubscription',
                data: $('#frmsubscription4').serialize(),

                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
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
    var activeSubscription5 = function () {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'ProductSubscriptions/activateSubscription',
                data: $('#frmsubscription5').serialize(),

                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
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
    var FormValidator = function () {
        $('#frmsubscription2').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                scrb_act_or_de_pay_by: {
                    validators: {
                        notEmpty: {
                            message: 'The paid by is required and cannot be empty'
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

