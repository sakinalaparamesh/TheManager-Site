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
                        "order": [[ 3, 'asc' ]],
		"columns": [
                            //{ "data": "ClientId", "orderable": false},
                            { 
                            mRender: function (data, type, row) {
                                var client_checkbox = "";
                                //if(row.BranchId){
                                    client_checkbox = '<input type="checkbox" name="client_check[]" data-clientid="'+row.ClientId+'" data-branchid="'+row.BranchId+'" data-contactid="'+row.ContactId+'" >';
                                //}
                                return client_checkbox; },orderable: false 
                            },
                            { "data": "ClientId", "orderable": false },
                            { "data": "PersonName", "orderable": true },
                            { "data": "ClientName", "orderable": true },
                            { "data": "BranchName", "orderable": true },
                            { "data": "Mobile", "orderable": true },
                            { "data": "ClientId", "orderable": false,"visible":false },
                            { "data": "BranchId", "orderable": false,"visible":false },
                            { "data": "ContactId", "orderable": false,"visible":false },
//                            { 
//                            mRender: function (data, type, row) {
//                                var link = "";
//                                link = link + '<a href="'+_url+'clients/addClient/'+ row.ClientId +'" class="btn btn-primary action_btn_padding"><span class="Edit" title="Edit"><i class="fa fa-pencil"></i></span></a> &nbsp; &nbsp;';
//                                link = link + '<a href="'+_url+'clients/deleteClient/'+ row.ClientId +'" class="btn btn-danger action_btn_padding"><span class="Delete" title="Delete"><i class="fa fa-trash"></i></span></a>&nbsp; &nbsp;';
//                                link = link + '<a href="'+_url+'clients/deleteClient/'+ row.ClientId +'" class="btn btn-success action_btn_padding"><span title="List of Branches"><i class="fa fa-list"></i></span></a>';
//                                link = link + '<a class="btn btn-success action_btn_padding" onclick="openSidebar();"><span title="List of Branches"><i class="fa fa-list"></i></span></a>';
//                                return link; },orderable: false 
//                            },
                ],
               
//               columnDefs: [  {
//                "targets": [ 4 ],
//                "visible": false,
//                "searchable": false
//                 } ],
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    var info = dt.page.info();
                    $('td', nRow).eq(1).html(iDisplayIndex + 1 + info.page * info.length);
                    $(nRow).addClass( "openView" );
                      //$('td:eq(0),td:eq(1),td:eq(2),td:eq(3),td:eq(4)', nRow).addClass( "openView" );
                    $('td:eq(5)', nRow).addClass( "text-center" );
                    return nRow;   
                },
                
		});//datatable 
           
            $("#tableId tbody").on("click","tr", function(){ 
                var _row = $(this);
                var _ClientId  = dt.row(_row).data()["ClientId"];
                var _BranchId  = dt.row(_row).data()["BranchId"];
                var _ContactId = dt.row(_row).data()["ContactId"];    
                //alert(_ClientId +" "+_BranchId+" "+_ContactId);
                openSidebar(_ClientId, _BranchId, _ContactId);
           });
//           $("#tableId tbody").on("click",'input[name^="client_check"]', function(){ 
//                  
//                var _row = $(this);
//                console.log('ClientId:'+_row.data('clientid')+' BranchId:'+_row.data('branchid')+' ContactId:'+_row.data('contactid'))
//           });

                
	}
	
	return { Load: _Load }
})();


