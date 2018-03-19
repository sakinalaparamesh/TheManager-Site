var jobsGridJS = (function () {
    var _url;
    var _csrf_token_name;
    var _csrf_hash;
    var tbljobs;
    var _Load = function (Url, csrf_token_name, csrf_hash) {
        _url = Url;
        _csrf_token_name = csrf_token_name;
        _csrf_hash = csrf_hash;
        _tbljobs = $("#tbljobs");
        Loadjobs();
    }
    var Loadjobs = function () {
        var dt = _tbljobs.DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": _url + "Jobs/getAllJobs",
                "dataType": "json",
                "type": "POST",
                "data": {_csrf_token_name: _csrf_hash}
            },
            "order": [[1, 'asc']],
            "columns": [

                {mRender: function (data, type, row) {
                        var link = "";

                        link = '<input type="checkbox" name="con[]" value="' + row.jobs_id + '"/>';
                        return link;
                    }, orderable: false},
                {"data": "jobs_position", "orderable": true},
                {"data": "jobs_position", "orderable": true},
                {"data": "jobs_numberofposition", "orderable": true},
                {"data": "jobs_joiningdate", "orderable": true},
                {"data": "jobs_position_startdate", "orderable": true},
                {"data": "jobs_id", "orderable": true, "visible": false},
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
            ], "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                //console.log("Hello");
                var index = iDisplayIndex + 1;
                $('td:eq(1)', nRow).html(index);
                return nRow;
            }



        });
        $("#tbljobs tbody").on("click", "tr", function () {
            var _row = $(this);
            var _jobid = dt.row(_row).data()["jobs_id"];
//                alert(_jobid);
            openSidebar(_jobid);
        });

    }

    return {Load: _Load}
})();
