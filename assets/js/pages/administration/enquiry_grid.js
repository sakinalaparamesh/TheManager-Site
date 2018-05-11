var GridJS = (function () {

    var _url;
    var _csrf_token_name;
    var _csrf_hash;
    var _tbldepartment;
    var _Load = function (Url, csrf_token_name, csrf_hash) {
        _url = Url;
        _csrf_token_name = csrf_token_name;
        _csrf_hash = csrf_hash;
        _tbldepartment = $("#tbl_enq");
        LoadMenus();
    }
    var LoadMenus = function () {
        _tbldepartment.DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": _url + "Administration/getAllEnquiries",
                "dataType": "json",
                "type": "POST",
                "data": {_csrf_token_name: _csrf_hash}
            },
            "order": [[1, 'asc']],
            "columns": [
                {mRender: function (data, type, row) {
                        var link = "";

                        link = '<input type="checkbox" name="enquiries_id[]" value="' + row.enquiries_id + '"/>';
                        return link;
                    }, orderable: false},
                {"data": "productname", "orderable": true},
                {"data": "productname", "orderable": true},
                {"data": "enquiries_name", "orderable": true},
                {"data": "enquiries_company", "orderable": true},
                {"data": "enquiries_email", "orderable": true},
                {"data": "enquiries_phone", "orderable": true},
                {"data": "created_on", "orderable": true},
                {"data": "enquiries_message", "orderable": true},
            ], "fnRowCallback": function (nRow, aData, iDisplayIndex) {

                var index = iDisplayIndex + 1;
                $('td:eq(1)', nRow).html(index);
                return nRow;
            }



        });
    }

    return {Load: _Load}
})();