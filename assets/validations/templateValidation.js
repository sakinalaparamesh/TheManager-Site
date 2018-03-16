function ValidateForm(){
    
    $('#template_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            template_id: {
                validators: {
                    notEmpty: {
                        message: 'The Email Template is required and please select template'
                    }
                }
            }
        }
    });//bootstrapValidator
}



