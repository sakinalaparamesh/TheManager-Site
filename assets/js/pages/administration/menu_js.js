var menujs = (function () {
    var _parent_id;
    var _controller_id;
    var _menu_name;
    var _display_name;
    var _description;
    var _menu_url;
    var _menu_icon;
    var _menu_order;
    var _menu_color;
//    var _isactive;
//    var _isparent;
    var _Url;
    var _Load = function (url) {
        _Url = url;
//        _isparent = $("input[name='IsParentMenu']:checked");
        _parent_id = $("#menu_id");
        _controller_id = $("#controllerid");
        _menu_name = $("#name");
        _display_name = $("#displayName");
        _description = $("#description");
        _menu_url = $("#menuURL");
        _menu_icon = $("#MenuIcon");
        _menu_order = $("#menuOrder");
        _menu_color = $("#menuColor");
//        _isactive=$("input[name='is_active']:checked");
        _btnSubmit = $("#btnSubmit");
        FormValidator();
        _LoadEvents();
    }
    var _LoadEvents = function () {
        _btnSubmit.on('click', SaveMenuDetails);
    }

    var SaveMenuDetails = function () {
        var MenuJson = {};
        MenuJson.isparent = $("input[name='IsParentMenu']:checked").val();
        MenuJson.parent_id = _parent_id.val();
        MenuJson.controller_id = _controller_id.val().toString();
        MenuJson.menu_name = _menu_name.val();
        MenuJson.display_name = _display_name.val();
        MenuJson.description = _description.val();
        MenuJson.menu_url = _menu_url.val();
        MenuJson.menu_icon = _menu_icon.val();
        MenuJson.menu_order = _menu_order.val();
        MenuJson.menu_color = _menu_color.val();
        MenuJson.isactive = $("input[name='is_active']:checked").val();
//        alert($("input[name='IsParentMenu']:checked").val());
        var validator = $('#MenuForm').data('bootstrapValidator');
        validator.validate();
        if (validator.isValid()) {
            $.LoadingOverlay("show");
            $.ajax({
                type: "POST",
                url: _Url + 'Administration/saveMenu',
                data: {MenuJson: MenuJson},
                dataType: 'json',
                success: function (data) {

                    $.LoadingOverlay("hide");
//                                console.log(data);
                    if (data['isError'] == "N") {
                        alert(data['message']);
                    }else{
                        alert(data['message']);
                    }
                },
                error: function (data) {

                }
            })
        }

    }
    var FormValidator = function () {
        $('#MenuForm').bootstrapValidator({
            
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The controller is required and cannot be empty'
                        }
                    }
                },
                displayName: {
                    validators: {
                        notEmpty: {
                            message: 'The menu icon is required and cannot be empty'
                        }
                    }
                },
                menuOrder: {
                    validators: {
                        notEmpty: {
                            message: 'The menu order is required and cannot be empty'
                        }
                    }
                },
                controllerid: {
                    validators: {
                        notEmpty: {
                            message: 'The role is required and cannot be empty'
                        }
                    }
                },
                menu_id: {
                    validators: {
                        notEmpty: {
                            message: 'The parent menu is required and cannot be empty'
                        }
                    }
                },
                menuURL: {
                    validators: {
                        notEmpty: {
                            message: 'The menu url is required and cannot be empty'
                        }
                    }
                }
                

            }
        });//bootstrapValidator
    }
    return {Load: _Load}

})();

