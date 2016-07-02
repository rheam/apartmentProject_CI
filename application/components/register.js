$(document).ready(function(){
	var $scope = {
		//initialized the base_url
		"base_url": "http://localhost/crud/"
	};
		//time stamp
	// var x = 	{	
	// 			"y": new Date().getFullYear(),
	// 			"m"	: new  Date().getMonth() + 1,
	// 			"d" : new Date().getDate(),
	// 			"H" : new Date().getHours(),
	// 			"i" : new Date().getMinutes(),
	// 			"s" : new Date().getSeconds(),
	// 			};
		
	// var newdate = x.y + "-" + x.m + "-" + x.d + " " + x.H + ":" + x.i +":" + x.s;
	
		//init java object
	var $data = {};
		
		//init the button id
	$scope.createAcc = $("#create");
	 
		//function for registration
	function registeruser()
	{
		//assigning value in json type
		var data = {
							"username"		: $scope.username.val().trim(),
							"firstname"		: $scope.username.val().trim(),
							"lastname"		: $scope.username.val().trim(),
			

							"user_type"		:	'Boarder',
							"payment_status"	:	'paid'
						};
		
		var newAcc = $('#table').DataTable();
		
		//sending the request to the server
		$.ajax({
					 "url": $scope.base_url + "main/do_reg",
					 "type": "POST",
					 "data": data,
					 "dataType": "json"
				 })
         .done(function( resp ) {
						 console.log(resp);	
						 if ( !resp.error ) {
							 $scope.noteSuccess.show();
						 }
				 })
         .fail(function( resp ) {
				 switch (resp.status) 
				 {
					 case 404:
						 alert('Page not found');
						 break;
					 case 500:
						 alert('Internal server error');
						 break;
				 }
        });
	   
	   newAcc.row.add(data).draw();
	}

    //function for modal
	function createAcc_add() {
      BootstrapDialog.show(
	  {
            title:  'Sign Up',
			message: function() {
                return [
						'<div id="note-success" class="alert alert-success alert-dismissible" role="alert" style="display: none">',
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                        '<strong>Success!</strong> New user has been successfully registered.',
						'</div>',
						'<form action="#" id="regform">',
                        '<div class="form-group">',
                        '<label for="username">Username</label>',
                            '<input class="form-control" type="text" name="username" id="username" placeholder="Username" />',
                    	'</div>',
						'<div id="username-alert" class="alert alert-danger alert-dismissible" role="alert" style="display: none">',
                         '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                       '<strong>Error!</strong> Please provide your Username!',
						'</div>',
						'<div id="username-invalid" class="alert alert-danger alert-dismissible" role="alert" style="display: none">',
                         '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>',
                       '<strong>Error!</strong> Userame already taken, please choose a different one !',
						'</div>',

                        '<label for="firstname">firstname</label>',
                            '<input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" />',
                    	'</div>',
                    	'<label for="lastname">lastname</label>',
                            '<input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" />',
                    	'</div>',

						
                    '</form>'
                ].join('');
            },
		buttons: [{	
				type: 'button',
                icon: 'glyphicon glyphicon-floppy-saved',
                label: 'Save',
                cssClass: 'btn-primary',
                action: function(dialog){
							event.stopImmediatePropagation();
							$scope.username   	 = $("#username");
							$scope.firstname    	 = $("#firstname");
							$scope.lastname       =$("#lastname")
							registeruser();
							$('#regform').find('input').val('');
							dialog.close();
											console.log('Close modal');
														
							//console.log(realdate);
						}
            }, {
                type: 'button',
				icon: 'glyphicon glyphicon-floppy-remove',
                label: 'Close',
                cssClass: 'btn-primary',
                action: function(dialog){
											dialog.close();
											console.log('Close modal');
											}
            }]
        });
}
	
	$scope.createAcc.click(function( event ) {
        event.stopImmediatePropagation();
        createAcc_add();
    });


});