var GridJS = (function () {
	
	var _url;
	var _csrf_token_name;
	var _csrf_hash;
	var _tableId;
	var _Load = function (Url, csrf_token_name, csrf_hash) {
            _url = Url;
            _csrf_token_name = csrf_token_name;
            _csrf_hash = csrf_hash;
            _tableId = $("#tableId");
		LoadDatatable();
    }
	var LoadDatatable = function () {
	   var dt = _tableId.DataTable({
                        responsive: true,
			"processing": true,
			"serverSide": true,
			"ajax":{
			 "url": _url + "clients/getAllClients",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 1, 'asc' ]],
		"columns": [
                            { "data": "clientid", "orderable": false },
                            { "data": "clientname", "orderable": true },
                            { "data": "clientcode", "orderable": true },
                            { "data": "CreatedOn", "orderable": true },
                            { 
                            mRender: function (data, type, row) {
                                var status = "";
                                if(row.Status == 1){ status ="<span class='text-success'>Active</span>"; }
                                else{ status = "<span class='text-warning'>In-active</span>" }
                                return status; },orderable: false 
                            },
                            { 
                            mRender: function (data, type, row) {
                                var link = "";
                                link = link + '<a href="'+_url+'menu/addMenu/'+ row.clientid +'"><span class="Edit" "title="Edit"><i class="fa fa-pencil"></i></span></a> &nbsp; &nbsp;';
                                link = link + '<a href="'+_url+'menu/deleteMenu/'+ row.clientid +'"><span class="Delete" "title="Delete"><i class="fa fa-trash"></i></span></a>';
                                return link; },orderable: false 
                            },
                ],
               
               columnDefs: [ {
                    targets: 3,
                    render: function ( data, type, row ) {
                        return data.length > 30 ?
                        data.substr( 0, 30 ) +'…' :
                        data;
                    }
                } ],
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    var info = dt.page.info();
                    $('td', nRow).eq(0).html(iDisplayIndex + 1 + info.page * info.length);
                    $(nRow).addClass( "openView" );
                    //$('td:eq(0),td:eq(1),td:eq(2),td:eq(3),td:eq(4)', nRow).addClass( "openView" );
                    return nRow;   
                },
		});
                
	}
	
	return { Load: _Load }
})();