function ValidateForm(){
    
    $('#client_product_mapping_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'products[]': {
                validators: {
                    notEmpty: {
                        message: 'The Product is required and please select products'
                    }
                }
            }
        }
    });//bootstrapValidator
}



