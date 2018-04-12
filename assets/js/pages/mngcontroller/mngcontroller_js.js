var mngcontrollerjs = (function () {
    var _controllerid;
    var _controllername;
    var _displayname;
    var _description;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _controllerid=$("#controllerid");
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
                     swal({
                            title: "Success",
                            text: data['message'],
                            type: "success"
                        },
                        function () {
                            window.location.href = _Url + 'mngcontroller';
                        });                    } else {
                       
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

