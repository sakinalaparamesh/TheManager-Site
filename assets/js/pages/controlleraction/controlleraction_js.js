    var controlleractionjs= (function(){
    
    var _Controllerid;
    var _Controlleractionname;
    var _Actioncodename;
    var _Actiondisplayname;
    var _Url;
    var _Load = function(url){
        _Url =url;
        _Controllerid = $("#controllerlist");
        _Controlleractionname = $("#txtcontrolleractionname");
        _Actioncodename = $("#txtactioncodename");
        _Actiondisplayname = $("#txtactiondisplayname");
        _btnSubmit = $("#btnSubmit");
         FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function(){
        _btnSubmit.on('click',SavecontrolleractionDetails);
    }
    
    var SavecontrolleractionDetails = function(){
        var controlleractionJson = {};
        controlleractionJson.controllerid = _Controllerid.val();
        controlleractionJson.controlleractionname = _Controlleractionname.val();
        controlleractionJson.actioncodename = _Actioncodename.val();
        controlleractionJson.actiondisplayname = _Actiondisplayname.val();
//        alert(_Controlleractionname.val());
        var validator = $('#frmcontrolleraction').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            alert("validated form successfully");
           $.ajax({
                        type: "POST",
                            url: _Url+'Controlleraction/savecontrolleraction',
                        data: { ControlleractionData : controlleractionJson },
                        dataType: 'json',
                        success: function (data) {
                            alert("data saved successfully");
                          window.location.href = _Url+'controlleraction';
                        },
                        error: function (xhr, textStatus, errorThrown) {
                              alert("Error");
                              alert(xhr.responseText);
                              
                        }
                    });
        }
       
    }
    var FormValidator = function(){
        
     $('#frmcontrolleraction').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            controllerid: {
                validators: {
                    notEmpty: {
                        message: 'The Controller Name is required and cannot be empty'
                    }
                }
            },
            controlleractionname: {
                validators: {
                    notEmpty: {
                        message: 'The Controller Action Name is required and cannot be empty'
                    }
                }
            },
             actioncodename: {
                validators: {
                    notEmpty: {
                        message: 'The Actioncodename is required and cannot be empty'
                    }
                }
            },
             actiondisplayname: {
                validators: {
                    notEmpty: {
                        message: 'The Action Display Name is required and cannot be empty'
                    }
                }
            }           
        }
    });//bootstrapValidator
    }
    return {Load : _Load }
    
})();

