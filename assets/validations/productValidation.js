var productjs = (function () {
    var _productid;
    var _ProductName;
    var _ProductCode;
    var _ProductDescription;
    var _productlogo;
    var _Url;
    var _Load = function (url) {
        _Url = url;
        _productid=$("#productid");
        _ProductName = $("#txtProductName");
        _ProductCode = $("#txtProductCode");
        _ProductDescription = $("#txtProductDescription");
        _productlogo = $("#productlogo")
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveProductDetails);
    }

    var SaveProductDetails = function () {
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
        formData.append('ProductId', _productid.val());
        formData.append('ProductName', _ProductName.val());
        formData.append('ProductCode', _ProductCode.val());
        formData.append('ProductDescription', _ProductDescription.val());
//        formData.append('productlogo',_productlogo.val());


        var validator = $('#frmproduct').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'product/saveProduct',
                processData: false,
                contentType: false,
                data: formData,
//                        dataType: 'json',
                success: function (data) {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(data);
//                                console.log(obj.message);
                    if (obj.isError == "N") {
                        alert(obj.message);
                         window.location.href = _Url+'product';
                    } else {
                        alert(obj.message);
                       
                    }
//                            window.location.href = _Url+'product';
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Error");
                    alert(xhr.responseText);
                }
            })
        }

    }
    var FormValidator = function () {
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
    return {Load: _Load}

})();

