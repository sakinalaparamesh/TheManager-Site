var mngcontrollerGridJS = (function () {
	
	var _url;
	var _csrf_token_name;
	var _csrf_hash;
	var _tblmngcontroller;
	var _Load = function (Url, csrf_token_name, csrf_hash) {
            _url = Url;
            _csrf_token_name = csrf_token_name;
            _csrf_hash = csrf_hash;
            _tblmngcontroller = $("#tblmngcontroller");
		Loadmngcontrollers();
    }
	var Loadmngcontrollers = function () {
		 var dt =_tblmngcontroller.DataTable({
                        responsive: true,
			"processing": true,
			"serverSide": true,
			"ajax":{
			 "url": _url + "mngcontroller/getAllmngcontrollers",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 1, 'asc' ]],
		"columns": [    
                    
                    {mRender: function (data, type, row) {
                                var link = "";                                
                                
                            link = '<input type="checkbox" name="con[]" value="'+row.controllerid+'"/>';
                                return link;
                            }, orderable: false },
                            { "data": "controllerid", "orderable": true },
                            { "data": "controllername", "orderable": true },
                            { "data": "displayname", "orderable": true },                          
                            { 
                            mRender: function (data, type, row) {
                                var status = "";
                                if(row.isactive == 'Y'){ status ="<span class='text-success'>Active</span>"; }
                                else{ status = "<span class='text-warning'>In-active</span>" }
                                return status; },orderable: false },
                            
                ],"fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    //console.log("Hello");
                    var index = iDisplayIndex +1;
                    $('td:eq(1)',nRow).html(index);
                    return nRow;
                }
               
	    });
            $("#tblmngcontroller tbody").on("click","tr", function(){ 
                var _row = $(this);
                var _controllerid  = dt.row(_row).data()["controllerid"];
//                alert(_controllerid);
                openSidebar(_controllerid);
           });
                
	}
	
	return { Load: _Load }
})();