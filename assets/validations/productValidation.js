var productjs= (function(){
    var _ProductName;
    var _ProductCode;
    var _ProductDescription;
    var _Url;
    var _Load = function(url){
        _Url =url;
        _ProductName = $("#txtProductName");
        _ProductCode = $("#txtProductCode");
        _ProductDescription = $("#txtProductDescription");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function(){
        _btnSubmit.on('click',SaveProductDetails);
    }
    
    var SaveProductDetails = function(){
        var ProductJson = {};
        ProductJson.ProductName = _ProductName.val();
        ProductJson.ProductCode = _ProductCode.val();
        ProductJson.ProductDescription = _ProductDescription.val();
        //alert(_ProductName.val());
         var validator = $('#frmproduct').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
           $.ajax({
                        type: "POST",
                        url: _Url+'product/saveProduct',
                        data: { ProductData : ProductJson },
                        dataType: 'json',
                        success: function (data) {
                            alert("data saved successfully");
                            window.location.href = _Url+'product';
                        },
                        error: function (xhr, textStatus, errorThrown) {
                              alert("Error");
                              alert(xhr.responseText);
                        }
                    })
        }
       
    }
    var FormValidator = function(){
     $('#frmproduct').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            productname: {
                validators: {
                    notEmpty: {
                        message: 'The Product Name is required and cannot be empty'
                    }
                }
            },
             productcode: {
                validators: {
                    notEmpty: {
                        message: 'The Product Code is required and cannot be empty'
                    }
                }
            }
           
        }
    });//bootstrapValidator
    }
    return {Load : _Load }
    
})();

