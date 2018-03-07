$(document).ready(function() { 
        
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
//            clientcode: {
//                validators: {
//                    notEmpty: {
//                        message: 'The Client Code is required and cannot be empty'
//                    }
//                }
//            },
//            clientdescription: {
//                validators: {
//                    notEmpty: {
//                        message: 'The Description is required and cannot be empty'
//                    }
//                }
//            },
            is_active: {
                validators: {
                    notEmpty: {
                        message: 'The Status is required and cannot be empty'
                    }
                }
            }
        }
    });//bootstrapValidator
});//ready