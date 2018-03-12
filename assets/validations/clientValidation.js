  function ValidateForm(){   
    $('#MyForm').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            clientname: {
                validators: {
                    notEmpty: {
                        message: 'The Client Name is required and cannot be empty'
                    }
                }
            },
            client_type: {
                validators: {
                    notEmpty: {
                        message: 'The Client Type is required and please select Client Type'
                    }
                }
            },
            is_active: {
                validators: {
                    notEmpty: {
                        message: 'The Status is required and cannot be empty'
                    }
                }
            }
        }
    });//bootstrapValidator
  }
