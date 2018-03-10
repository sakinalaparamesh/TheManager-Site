var agentjs= (function(){
    var _Agentname;
    var _Company;
    var _Passportnumber;
    var _Exclusieveagent;
    var _Contactno;
    var _Email;
    var _Address;
    var _comments;
    var _profilepic;
    var _Url;
    var _Load = function(url){
        _Url =url;
        _Agentname = $("#txtagentname");
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
    var _LoadEvents = function(){
        _btnSubmit.on('click',SaveAgentDetails);
    }
    
    var SaveAgentDetails = function(){
        var AgentJson = {};
        AgentJson.Agentname = _Agentname.val();
        AgentJson.Company = _Company.val();
        AgentJson.Passportnumber = _Passportnumber.val();
        AgentJson.Exclusieveagent = _Exclusieveagent.val();
        AgentJson.Contactno = _Contactno.val();
        AgentJson.Email = _Email.val();
        AgentJson.Address = _Address.val();
        AgentJson.comments = _comments.val();
        AgentJson.profilepic = _profilepic.val();
        var validator = $('#frmagent').data('bootstrapValidator');
        validator.validate();         
        if (validator.isValid()) {
             alert("hello"+validator.isValid());
           $.ajax({
                        type: "POST",
                        url: _Url+'agent/saveAgent',
                        data: { AgentData : AgentJson },
                        dataType: 'json',
                       success: function (data) {
                            alert("data saved successfully");
                             location.reload();
                        },
                        error: function (xhr, textStatus, errorThrown) {
                              alert("Error");
                              alert(xhr.responseText);
                        }
                    })
        }
       
    }
    var FormValidator = function(){
     $('#frmagent').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            agentname: {
                validators: {
                    notEmpty: {
                        message: 'The agentname is required and cannot be empty'
                    }
                }
            },
             company: {
                validators: {
                    notEmpty: {
                        message: 'The company is required and cannot be empty'
                    }
                }
            },
             exclusiveagent: {
                validators: {
                    notEmpty: {
                        message: 'The Exclusiveagent is required and cannot be empty'
                    }
                }
            },
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
    });//bootstrapValidator
    }
    return {Load : _Load }
    
})();

