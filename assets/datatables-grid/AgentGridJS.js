var AgentGridJS = (function () {
	
	var _url;
	var _csrf_token_name;
	var _csrf_hash;
	var _tblagent;
	var _Load = function (Url, csrf_token_name, csrf_hash) {
            _url = Url;
            _csrf_token_name = csrf_token_name;
            _csrf_hash = csrf_hash;
            _tblagent = $("#tblagent");
		LoadAgents();
    }
	var LoadAgents = function () {
		 _tblagent.DataTable({
                        responsive: true,
			"processing": true,
			"serverSide": true,
			"ajax":{
			 "url": _url + "Agent/getAllAgents",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 1, 'asc' ]],
		"columns": [    
                    
                    {mRender: function (data, type, row) {
                                var link = "";                                
                                
                            link = '<input type="checkbox" name="agent[]" value="'+row.agentid+'"/>';
                                return link;
                            }, orderable: false },
                            { "data": "agentid", "orderable": true },
                            { "data": "agentname", "orderable": true },
                            { "data": "company", "orderable": true },  
                            { "data": "contactno", "orderable": true },
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