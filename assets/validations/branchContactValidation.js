function ValidateForm(){
    
    $('#branch_contact_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            personname: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required and cannot be empty'
                    }
                }
            },
            designation: {
                validators: {
                    notEmpty: {
                        message: 'The Designation is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Id is required and cannot be empty'
                    }
                }
            },
            greetings: {
                validators: {
                    notEmpty: {
                        message: 'The Greetings is required and select any one'
                    }
                }
            }
            

        }
    });//bootstrapValidator
}



