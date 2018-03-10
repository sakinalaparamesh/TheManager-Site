var client_typejs = (function () {
    
    var _configuration_name;
    var _configuration_description;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _configuration_name = $("#configuration_name");
        _configuration_description = $("#configuration_description");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveClienttypsDetails);
    }

    var SaveClienttypsDetails = function () {
        var ClienttypsJson = {};
        
        ClienttypsJson.configuration_name = _configuration_name.val();
        ClienttypsJson.configuration_description = _configuration_description.val();
        
//        alert(_DepartmentName.val());
        var validator = $('#client_type').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'Clients/saveClientTypes',
                data: {ClienttypsJson: ClienttypsJson},
                dataType: 'json',
                success: function (data) {

                    $.LoadingOverlay("hide");
//                                console.log(data);
                    if (data['isError'] == "N") {
                        alert(data['message']);
                    }else{
                        alert(data['message']);
                    }
                },
                error: function (data) {

                }
            })
        }

    }
    var FormValidator = function () {
        $('#client_type').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                configuration_name: {
                    validators: {
                        notEmpty: {
                            message: 'The client type name is required and cannot be empty'
                        }
                    }
                }

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

