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
			 "url": _url + "emailTemplates/getAllTemplates",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 3, 'asc' ]],
		"columns": [
                            { "data": "id", "orderable": false},
                            { "data": "id", "orderable": false},
                            { "data": "date", "orderable": true },
                            { "data": "template_title", "orderable": true },
                            { "data": "subject", "orderable": true },
                            { "data": "createdby", "orderable": true },
                            { 
                            mRender: function (data, type, row) {
                                var link = "";
                                link = link + '<a href="'+_url+'add-email-template/'+ row.id +'" class="btn btn-primary action_btn_padding"><span class="Edit" title="Edit"><i class="fa fa-pencil"></i></span></a> &nbsp; &nbsp;';
                                return link; },orderable: false 
                            },
                ],
               
//               columnDefs: [  {
//                "targets": [ 4 ],
//                "visible": false,
//                "searchable": false
//                 } ],
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    var info = dt.page.info();
                    $('td', nRow).eq(0).html('<input type="checkbox" name="rowcheck" id="rowcheck">');
                    $('td', nRow).eq(1).html(iDisplayIndex + 1 + info.page * info.length);
                    $(nRow).addClass( "openView" );
                      //$('td:eq(0),td:eq(1),td:eq(2),td:eq(3),td:eq(4)', nRow).addClass( "openView" );
                    $('td:eq(5), td:eq(6)', nRow).addClass( "text-center" );
                    return nRow;   
                },
		});
           
                
	}
	
	return { Load: _Load }
})();


