var controlleractionGridJS = (function () {
	var _url;
	var _csrf_token_name;
	var _csrf_hash;
	var _tblcontrolleraction;
	var _Load = function (Url, csrf_token_name, csrf_hash) {
            _url = Url;
            _csrf_token_name = csrf_token_name;
            _csrf_hash = csrf_hash;
            _tblcontrolleraction = $("#tblcontrolleraction");
		Loadcontrolleractions();
    }
	var Loadcontrolleractions = function () {
		 _tblcontrolleraction.DataTable({
                        responsive: true,
			"processing": true,
			"serverSide": true,
			"ajax":{
			 "url": _url + "Controlleraction/getAllcontrolleraction",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 1, 'asc' ]],
                        "columns": [    
                    
                    {mRender: function (data, type, row) {
                                var link = "";                                
                                
                            link = '<input type="checkbox" name="con[]" value="'+row.actionid+'"/>';
                                return link;
                            }, orderable: false },
                             { "data": "controllername", "orderable": true },
                            { "data": "controlleractionname", "orderable": true },
                            { "data": "actioncodename", "orderable": true },  
                            { "data": "actiondisplayname", "orderable": true },    
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
                
	}
	
	return { Load: _Load }
})();