var ProductGridJS = (function () {
	
	var _url;
	var _csrf_token_name;
	var _csrf_hash;
	var _tblproduct;
	var _Load = function (Url, csrf_token_name, csrf_hash) {
            _url = Url;
            _csrf_token_name = csrf_token_name;
            _csrf_hash = csrf_hash;
            _tblproduct = $("#tblproduct");
		LoadProducts();
    }
	var LoadProducts = function () {
		 _tblproduct.DataTable({
                        responsive: true,
			"processing": true,
			"serverSide": true,
			"ajax":{
			 "url": _url + "Product/getAllProducts",
			 "dataType": "json",
			 "type": "POST",
			 "data":{ _csrf_token_name : _csrf_hash }
                        },
                        "order": [[ 1, 'asc' ]],
		"columns": [    
                    
                    {mRender: function (data, type, row) {
                                var link = "";                                
                                
                            link = '<input type="checkbox" name="pro[]" value="'+row.productid+'"/>';
                                return link;
                            }, orderable: false },
                            { "data": "productid", "orderable": true },
                            { "data": "productname", "orderable": true },
                            { "data": "productcode", "orderable": true },                          
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