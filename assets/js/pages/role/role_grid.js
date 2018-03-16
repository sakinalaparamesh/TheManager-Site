var RoleGridJS = (function () {
	
	var _url;
	var _csrf_token_name;
	var _csrf_hash;
	var _tblrole;
	var _Load = function (Url, csrf_token_name, csrf_hash) {
            _url = Url;
            _csrf_token_name = csrf_token_name;
            _csrf_hash = csrf_hash;
            _tblrole = $("#tblrole");
		LoadRoles();
    }
	var LoadRoles = function () {
		 var dt =_tblrole.DataTable({
                        responsive: true,
			"processing": true,
			"serverSide": true,
			"ajax":{
			 "url": _url + "Role/getAllRoles",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 1, 'asc' ]],
		"columns": [    
                    
                    {mRender: function (data, type, row) {
                                var link = "";                                
                                
//                            link = '<input type="checkbox" name="role[]" value="'+row.roleid+'"/>';
                                return link;
                            }, orderable: false },
                        { "data": "roleid", "orderable": true },
                        { "data": "departmentname", "orderable": true },
                        { "data": "rolename", "orderable": true },
                        { "data": "roledescription", "orderable": true }, 
                        { "data": "roleid", "orderable": true },
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
                $("#tblrole tbody").on("click","tr", function(){ 
                var _row = $(this);
                var _roleid  = dt.row(_row).data()["roleid"];   
//                alert(_roleid);
                openSidebar(_roleid);
           });
                
	}
	
	return { Load: _Load }
})();