var mngcontrollerjs = (function () {
    var _controllerid;
    var _controllername;
    var _displayname;
    var _description;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _controllerid=$("#mngcontrollerid");
        _controllername = $("#txtmngControllerName");
        _displayname = $("#txtmngcontrollerdisplayname");
        _description = $("#txtmngcontrollerDescription");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SavemngcontrollerDetails);
    }

    var SavemngcontrollerDetails = function () {
        var mngcontrollerJson = {};
        mngcontrollerJson.controllerid = _controllerid.val();
        mngcontrollerJson.controllername = _controllername.val();
        mngcontrollerJson.displayname = _displayname.val();
        mngcontrollerJson.description = _description.val();
//        alert(_controllername.val());
        var validator = $('#frmmngcontroller').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'mngcontroller/savemngcontroller',
                data: {mngcontrollerData: mngcontrollerJson},
                dataType: 'json',
                success: function (data) {
                    $.LoadingOverlay("hide");
//                                console.log(data);
                    if (data['isError'] == "N") {
                        alert(data['message']);
                        window.location.href = _Url + 'mngcontroller';
                    } else {
                        alert(data['message']);
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
        $('#frmmngcontroller').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                mngcontrollername: {
                    validators: {
                        notEmpty: {
                            message: 'The Controller Name is required and cannot be empty'
                        }
                    }
                },
                mngcontrollerdisplayname: {
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

