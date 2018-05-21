var subscriptionGridJS = (function () {

    var _url;
    var _csrf_token_name;
    var _csrf_hash;
    var _tblproduct;
    var _Load = function (Url, csrf_token_name, csrf_hash) {
        _url = Url;
        _csrf_token_name = csrf_token_name;
        _csrf_hash = csrf_hash;
        _tblproduct = $("#tblsub");
        LoadProducts();
    }
    var LoadProducts = function () {
        var dt = _tblproduct.DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": _url + "ProductSubscriptions/getAllSubscriptions",
                "dataType": "json",
                "type": "POST",
                "data": {_csrf_token_name: _csrf_hash}
            },
            "order": [[1, 'asc']],
            "columns": [

                {mRender: function (data, type, row) {
                        var link = "";

                        link = '<input type="checkbox" name="ids[]" value="' + row.subscriptions_id + '"/>';
                        return link;
                    }, orderable: false},
                {"data": "subscriptions_id", "orderable": true},
                {"data": "subscriptions_code", "orderable": true},
                {"data": "subscriptions_company_name", "orderable": true},
                {"data": "productname", "orderable": true},
             /*   {
                    mRender: function (data, type, row) {
                        var status = "";
                        if (row.isactive == 'Y') {
                            status = "<span class='text-success'>Active</span>";
                        } else {
                            status = "<span class='text-warning'>In-active</span>"
                        }
                        return status;
                    }, orderable: false},*/
            ],
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                //console.log("Hello");
                var index = iDisplayIndex + 1;
                $('td:eq(1)', nRow).html(index);
                return nRow;
            }

        });
        $("#tblsub tbody").on("click", "tr", function () {
            var _row = $(this);
            var _id = dt.row(_row).data()["subscriptions_id"];
//                alert(_id);
            openSidebar(_id);
        });
    }
    return {Load: _Load}
})();