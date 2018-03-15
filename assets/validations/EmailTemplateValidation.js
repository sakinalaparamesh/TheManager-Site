function ValidateForm(){
	
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
            },
            template_type: {
                validators: {
                    notEmpty: {
                        message: 'The Template Type is required and please select template type'
                    }
                }
            },
            'productids[]': {
                   validators: {
                       callback: {
                           message: 'Please Select Products',
                           callback: function(value, validator, $field) {
                               var template_type = $('#MyForm').find('[name="template_type"]:checked').val();
                               return (template_type !== 'product') ? true : (value !== '');
                           }
                       }
                   }
               },

        }
    }).on('change', '[name="template_type"]', function(e) {
                $('#MyForm').formValidation('revalidateField', 'productids[]');
        })
        .on('success.field.bv', function(e, data) {
            if (data.field === 'productids[]') {
                var template_type = $('#MyForm').find('[name="template_type"]:checked').val();
                // User choose given template_type
                if (template_type !== 'product') {
                    // Remove the success class from the container
                    data.element.closest('.form-group').removeClass('has-success');

                    // Hide the tick icon
                    data.element.data('bv.icon').hide();
                }
            }
        });//bootstrapValidator
        }