$(document).ready(function(){
		//generate the table
		$('#table').DataTable({
			ajax : {
					//link where the json generated
					"url": "http://localhost/crud/home/jsonout",
					//expected datatype
					"dataType": "json"
						},
			searching: true,//enable datatable javasript search bar
			paging: true,//enable the javascript pagination
			columns: [ //declaring the fields on the table
						{ 
							data: "username",//getting the certain data on field
							"visible": true,//set the field --- datatype boolean
						},{ 
							data: "firstname",
							"visible": true
						},{ 
							data: "lastname",
							"visible": true
						},{ 
							data: "user_type",
							"visible": true
						},{ 
							data: "payment_status",
							"visible": true
						}
					]
		});
	});