function ValidateForm() {

    $('#MyForm').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            template_title: {
                validators: {
                    notEmpty: {
                        message: 'The Title is required and cannot be empty'
                    }
                }
            },
            subject: {
                validators: {
                    notEmpty: {
                        message: 'The Subject is required and cannot be empty'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'The Message is required and cannot be empty'
                    }
                }
            }

        }
    });//bootstrapValidator
}