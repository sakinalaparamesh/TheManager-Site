var MenuGridJS = (function () {

    var _url;
    var _csrf_token_name;
    var _csrf_hash;
    var _tbldepartment;
    var _Load = function (Url, csrf_token_name, csrf_hash) {
        _url = Url;
        _csrf_token_name = csrf_token_name;
        _csrf_hash = csrf_hash;
        _tbldepartment = $("#tbl_menus");
        LoadMenus();
    }
    var LoadMenus = function () {
        _tbldepartment.DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": _url + "Administration/getAllMenus",
                "dataType": "json",
                "type": "POST",
                "data": {_csrf_token_name: _csrf_hash}
            },
            "order": [[1, 'asc']],
            "columns": [
                {mRender: function (data, type, row) {
                        var link = "";

                        link = '<input type="checkbox" name="menu_id[]" value="' + row.menu_id + '"/>';
                        return link;
                    }, orderable: false},
                {"data": "menu_id", "orderable": true},
                {"data": "menu_name", "orderable": true},
                {"data": "display_name", "orderable": true},
                {
                    mRender: function (data, type, row) {
                        var isparent = "";
                        if (row.isparent == '1') {
                            isparent = "<span class='text-success'>Parent Menu</span>";
                        } else {
                            isparent = "<span class='text-warning'>Child Menu</span>"
                        }
                        return isparent;
                    }, orderable: false},
                {
                    mRender: function (data, type, row) {
                        var status = "";
                        if (row.isactive == 'Y') {
                            status = "<span class='text-success'>Active</span>";
                        } else {
                            status = "<span class='text-warning'>In-active</span>"
                        }
                        return status;
                    }, orderable: false},
//                {mRender: function (data, type, row) {
//                        var result = "";
//                        result += '<a href="' + _url + 'Department/addOrEdit/' + row.departmentid + '">Edit</a>';
//                        result += '<a href="' + _url + 'Department/delete_department/' + row.departmentid + '">Delete</a>';
//                        return result;
//                    }, orderable: false},
            ], "fnRowCallback": function (nRow, aData, iDisplayIndex) {
//console.log("Hello");
                var index = iDisplayIndex + 1;
                $('td:eq(1)', nRow).html(index);
                return nRow;
            }



        });
    }

    return {Load: _Load}
})();