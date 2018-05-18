var billingConfigJS = (function () {
    var _subscription_id;
    var _billing_configid;
    var _company_name;
    var _measuring_unit;
    var _recurring_duration;
    var _billing_type;
    var _fixed_bill_rate;
    var _slab_from;
    var _slab_to;
    var _slab_rate;
    var _effective_from;
    var _billing_currency;
    var _Url;
    var max_fields = 50;

    var _Load = function (url) {
        _Url = url;
        _subscription_id = $("#subscription_id");
        _billing_configid = $("#billing_configid");
        _company_name = $("#company_name");
        _measuring_unit = $("#measuring_unit");
        //_recurring_duration = $("#recurring_duration");
        //_billing_type = $("#billing_type")
        _fixed_bill_rate = $("#fixed_bill_rate");
        //_slab_from = $("input[name='slab_from[]']").map(function(){return $(this).val();}).get();
        //_slab_to = $("input[name='slab_to[]']");
        //_slab_rate = $("input[name='slab_rate[]']");
        _effective_from = $("#effective_from");
        _billing_currency = $("#billing_currency");
        _btnSubmit = $("#btnSubmit");
        
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        var todaysDate = new Date();
//        _effective_from.datepicker({
//            autoclose: true,
//            format: 'mm/dd/yyyy',
//            //endDate: todaysDate,
//            todayBtn: "linked",
//            todayHighlight: true
//        });
        _effective_from.datepicker().on('changeDate', function(e) {
            // Revalidate the date field
            $('#billconfig_form').bootstrapValidator('revalidateField', 'effective_from');
        });
        _btnSubmit.on('click', SaveBillingConfigDetails);
        //dynamic validation for slabs
//        var template = $('#line_1').clone();
//        $('.add_field_button').click(function () {
//            var rowId = $('.slab_box').length + 1;
//            //alert(rowId);
//            var validator = $('#billconfig_form').data('bootstrapValidator');
//            var klon = template.clone();          
//            klon.attr('id', 'line_' + rowId)
//                //.insertAfter($('.slab_box').last())
//                .find('input')
//                .each(function () {
//                    $(this).attr('id', $(this).attr('id').replace(/_(\d*)$/, "_"+rowId));
//                    validator.addField($(this));
//                })                   
//        });
        //alert("Hello");
    }

    var SaveBillingConfigDetails = function () {

        var formData = new FormData();

        formData.append('subscription_id', _subscription_id.val());
        formData.append('billing_configid', _billing_configid.val());
        formData.append('company_name', _company_name.val());
        formData.append('measuring_unit', _measuring_unit.val());
        formData.append('recurring_duration', $("input[name='recurring_duration']:checked").val());
        formData.append('billing_type', $("input[name='billing_type']:checked").val());
        formData.append('fixed_bill_rate', _fixed_bill_rate.val());
        formData.append('slab_from', $("input[name='slab_from[]']").map(function(){return $(this).val();}).get());
        formData.append('slab_to', $("input[name='slab_to[]']").map(function(){return $(this).val();}).get());
        formData.append('slab_rate', $("input[name='slab_rate[]']").map(function(){return $(this).val();}).get());
        formData.append('effective_from', _effective_from.val());
        formData.append('billing_currency', _billing_currency.val());
        
        var validator = $('#billconfig_form').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            //  $.LoadingOverlay("show");
            // alert("hello" + validator.isValid());
            $.ajax({
                type: "POST",
                url: _Url + 'billing/saveBillConfigDetails',
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.isError == "N") {
                        swal({
                            title: "Success",
                            text: obj.message,
                            type: "success"
                        },
                                function () {
                                    window.location.href = _Url + 'CompanyInfo';
                                });
                    } else {
                        $.LoadingOverlay("hide");
                        swal({
                            title: "Error",
                            text: obj.message,
                            type: "error"
                        });
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    swal({
                        title: "Error",
                        text: "Technical error occured..!",
                        type: "error"
                    });
                }

            });
        }
    }
    var FormValidator = function () {
        $('#billconfig_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                recurring_duration: {
                    validators: {
                        notEmpty: {
                            message: 'The recurring duration is required, please select'
                        }
                    }
                },
                billing_type: {
                    validators: {
                        notEmpty: {
                            message: 'The billing type is required, please select'
                        }
                    }
                },
                fixed_bill_rate: {
                    validators: {
                        callback: {
                            message: 'Please enter valid amount',
                            callback: function(value, validator, $field) {
                                var billingTypeStatus = $('#billconfig_form').find('[name="billing_type"]:checked').val();
                                //return (billingTypeStatus !== '1') ? true : (value !== '');
                                var isValidField = ($.isNumeric( value ) == true && value > 0) ? true : false;
                                return (billingTypeStatus !== '1') ? true : (isValidField);
                            }
                        }
                    }
                },
//                'slab_from[]': {
//                   validators: {
//                       callback: {
//                           message: 'Invalid From value <br>',
//                           callback: function(value, validator, $field) {
//                               var billingTypeStatus = $('#billconfig_form').find('[name="billing_type"]:checked').val();
//                               //return (billingTypeStatus !== '2') ? true : (value !== '');
//                               var isValidField = ($.isNumeric( value ) == true && value > 0) ? true : false;
//                               return (billingTypeStatus !== '2') ? true : (isValidField);
//                           }
//                       }
//                   }
//               },
//                'slab_to[]': {
//                    validators: {
//                        callback: {
//                            message: 'Invalid To value <br>',
//                            callback: function(value, validator, $field) {
//                                var billingTypeStatus = $('#billconfig_form').find('[name="billing_type"]:checked').val();
//                                //return (billingTypeStatus !== '2') ? true : (value !== '');
//                                var isValidField = ($.isNumeric( value ) == true && value > 0) ? true : false;
//                                return (billingTypeStatus !== '2') ? true : (isValidField);
//                            }
//                        }
//                    }
//                } ,
//                'slab_rate[]': {
//                    validators: {
//                        callback: {
//                            message: 'Invalid Slab rate',
//                            callback: function(value, validator, $field) {
//                                var billingTypeStatus = $('#billconfig_form').find('[name="billing_type"]:checked').val();
//                                //return (billingTypeStatus !== '2') ? true : (value !== '');
//                                var isValidField = ($.isNumeric( value ) == true && value > 0) ? true : false;
//                                return (billingTypeStatus !== '2') ? true : (isValidField);
//                            }
//                        }
//                    }
//                },
                'slab_from[]': {
                    validators: {
                        notEmpty: {
                            message: 'From value is required <br>'
                        },
                        greaterThan: {
                            value: 1,
                            message: 'From value must be greater than or equal to 1 <br>'
                        }
                    }
                },
                'slab_to[]': {
                    validators: {
                        notEmpty: {
                            message: 'To value is required <br>'
                        },
                        greaterThan: {
                            value: 1,
                            message: 'To value must be greater than or equal to 1 <br>'
                        }
                    }
                },
                'slab_rate[]': {
                    validators: {
                        notEmpty: {
                            message: 'Rate is required <br>'
                        },
                        greaterThan: {
                            value: 1,
                            message: 'Rate must be greater than or equal to 1 <br>'
                        }
                    }
                },
                effective_from: {
                    validators: {
                        notEmpty: {
                            message: 'Effective-from is required'
                        }
                    }
                },
                billing_currency: {
                    validators: {
                        notEmpty: {
                            message: 'Billing currency is required'
                        }
                    }
                },
            }
        })
//        .on('change', '[name="billing_type"]', function(e) {
//                $('#billconfig_form').bootstrapValidator('revalidateField', 'fixed_bill_rate');
//                $('#billconfig_form').bootstrapValidator('revalidateField', 'slab_from[]');
//                $('#billconfig_form').bootstrapValidator('revalidateField', 'slab_to[]');
//                $('#billconfig_form').bootstrapValidator('revalidateField', 'slab_rate[]');
//        })
//        .on('success.field.bv', function(e, data) {
//            if (data.field === 'slab_from[]' || data.field === 'slab_to[]') {
//                var billingTypeStatus = $('#billconfig_form').find('[name="billing_type"]:checked').val();
//                // User choose given billingTypeStatus
//                if (billingTypeStatus !== '2') {
//                    // Remove the success class from the container
//                    data.element.closest('.form-group').removeClass('has-success');
//
//                    // Hide the tick icon
//                    data.element.data('bv.icon').hide();
//                }
//            }
//        });
        //bootstrapValidator
        // Add button click handler
        .on('click', '.add_field_button', function() {
            var $template = $('#slabTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template),
                $slab_from   = $clone.find('[name="slab_from[]"]');
                $slab_to     = $clone.find('[name="slab_to[]"]');
                $slab_rate   = $clone.find('[name="slab_rate[]"]');

            // Add new field
            $('#billconfig_form').bootstrapValidator('addField', $slab_from);
            $('#billconfig_form').bootstrapValidator('addField', $slab_to);
            $('#billconfig_form').bootstrapValidator('addField', $slab_rate);
        })

        // Remove button click handler
        .on('click', '.remove_field', function() {
            var $row    = $(this).parents('.form-group'),
                $slab_from = $row.find('[name="slab_from[]"]');
                $slab_to = $row.find('[name="slab_to[]"]');
                $slab_rate = $row.find('[name="slab_rate[]"]');

            // Remove element containing the slab_from
            $row.remove();

            // Remove field
            $('#billconfig_form').bootstrapValidator('removeField', $slab_from);
            $('#billconfig_form').bootstrapValidator('removeField', $slab_to);
            $('#billconfig_form').bootstrapValidator('removeField', $slab_rate);
        })

        // Called after adding new field
        .on('added.field.bv', function(e, data) {
            // data.field   --> The field name
            // data.element --> The new field element
            // data.slab_froms --> The new field slab_froms

            if (data.field === 'slab_from[]') {
                if ($('#billconfig_form').find(':visible[name="slab_from[]"]').length >= max_fields) {
                    $('#billconfig_form').find('.add_field_button').attr('disabled', 'disabled');
                }
            }
        })

        // Called after removing the field
        .on('removed.field.bv', function(e, data) {
           if (data.field === 'slab_from[]') {
                if ($('#billconfig_form').find(':visible[name="slab_from[]"]').length < max_fields) {
                    $('#billconfig_form').find('.add_field_button').removeAttr('disabled');
                }
            }
        });
        
    }
    return {Load: _Load}

})();

