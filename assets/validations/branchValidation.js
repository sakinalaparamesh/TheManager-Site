function ValidateForm(){
    
    $('#branch_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            branchLocation: {
                validators: {
                    notEmpty: {
                        message: 'The branch location is required and cannot be empty'
                    }
                }
            },
            branchAddress: {
                validators: {
                    notEmpty: {
                        message: 'The branch address is required and cannot be empty'
                    }
                }
            }

        }
    });//bootstrapValidator
}



