$(document).ready(function() {
	 event.preventDefault();
	$('#continue').click(function(e) {
		 e.preventDefault();
	
		 	$('#user_no').hide();
		    $('#password').show();
		    $('#labelPassword').html('<span style="color:#fff;">Enter your Password:</span>');
		    $('#continue').hide();
		    $('#formButton').html('<button  class="btn btn-success btn-block btn-continue">Login</button>');
		
			if($('input[name=email]').val() != '' && $('input[name=password]').val() != '') {
				console.log($('input[name=phone]').val());
				console.log($('input[name=password]').val());
				 let form = $('#form');
				 form.addEventListener("submit",function(e){
					 console.log('ready')
					 e.preventDefault();
				 });
			}


		
		setTimeout(function(){
		  $('#errors').load(location.href + ' #errors');
		   }, 10000);
		
	});

})


 // if (UserNo.length === 0) {
	// 	 	$('#errors').addClass('text-danger');
	// 	 	$('#errors').html('*Please Enter a Vaild Phone No to Continue');
		 	
	// 	 }else{


	// 	 	$('#errors').addClass('text-success');
	// 	 	$('#errors').html('*Success');
		 	
	// 	 	user_no.hide();
	// 	    password.show();
	// 	    labelPassword.html(<span style="color:#fff;">Password:</span>);


		
		 
	// 	 // UserNo.hide();
	// 	}

