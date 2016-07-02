$(document).ready(function(){


$('#add-user-modal form')
		.on('submit', function(e){
			e.preventDefault();
			var formData = {
				"firstname": getChildValueByName($(this), 'firstname'),
				"lastname": getChildValueByName($(this), 'lastname'),
				"username": getChildValueByName($(this), 'username'),
				"gender": getChildValueByName($(this), 'gender'),
				"contact": getChildValueByName($(this), 'contact'),
				
			};

			if(formData.firstname==" "){

				$('#add-user-modal #message-container')
							.html('Please enter firstname').delay(3000)
							.slideUp('fast');
				
			}else{
				$.ajax({
					url: './do_register',  //para sa validation 
					type: 'POST',
					data: formData,
					success: function(data){
						var response = $.parseJSON(data);
						var message = '<div class="alert alert-danger text-left"><h4 class="text-left">Message: </h4>';
						for(var counter = 0; counter < response.length; counter++){
							message += response[counter] + '</br>';
						}
						message += '</div>';
						$('#add-user-modal #message-container')
							.html(message);
						$('#add-user-modal #message-container .alert')
							.delay(3000)
							.slideUp('fast');
					},
					complete: function(){
						reloaduser();
					}

				});
			}

			
			return false;
		});

	rebindEvents();	

	});