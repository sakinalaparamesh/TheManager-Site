var productjs= (function(){
    var _ProductName;
    var _ProductCode;
    var _ProductDescription;
    var _ProductLogo;
    var _Url;
    var _Load = function(url){
        _Url =url;
        _ProductName = $("#txtProductName");
        _ProductCode = $("#txtProductCode");
        _ProductDescription = $("#txtProductDescription");
        _ProductLogo=$("#productlogo")
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function(){
        _btnSubmit.on('click',SaveProductDetails);
    }
    
    var SaveProductDetails = function(){
        var logoImg = $('input[name="productlogo"]').get(0).files[0];

        var formData = new FormData();
        formData.append('productlogo', logoImg);
        
//        var ProductJson = {};
//        ProductJson.ProductName = _ProductName.val();
//        ProductJson.ProductCode = _ProductCode.val();
//        ProductJson.ProductDescription = _ProductDescription.val();
//        ProductJson.ProductLogo=_ProductLogo.val();
//        
        //alert(_ProductName.val());
        formData.append('ProductName', _ProductName.val());
        formData.append('ProductCode',_ProductCode.val());
        formData.append('ProductDescription',_ProductDescription.val());
        formData.append('ProductLogo',_ProductLogo.val());
        
       
         var validator = $('#frmproduct').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
           $.ajax({
                        type: "POST",
                        url: _Url+'product/saveProduct',
                        processData: false,
                        contentType: false,
                        data:  formData,
//                        dataType: 'json',
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

