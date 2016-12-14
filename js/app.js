 // my javascript library
$(document).ready(function() {
	
	
//................... sign up form Validation.........................................
    $("#signup").click(function() {
    

	var firstname =$("#firstname").val();
	var lastname = $("#lastname").val();
	var staffid =$("#staffid").val();
	var email =$("#email").val();
	var password =$("#password").val();
	var password2 =$("#password2").val();
      
		

	//......firstname.....

				
			 if(firstname == ""){
			     $('#firstname').focus();
				 $('.error#firstname_err').html('* Field cannot be empty').show();
				 return false;
			}else{
				 if(!validate_string(firstname)){
					$("#firstname").focus();
					$('.error#firstname_err').html('* Not less than two Alphabets are allowed!').show();
					 return false;
			     }else {
				      $('.error#firstname_err').html('').hide();
				 }
				 }
		    
//.............lastname ...........

            	
			 if(lastname == ""){
			     $('#lastname').focus();
				 $('.error#lastname_err').html('* Field cannot be empty').show();
				 return false;
			}else{
				 if(!validate_string(lastname)){
					$("#lastname").focus();
					$('.error#lastname_err').html('* Not less than two Alphabets are allowed!').show();
					 return false;
			     }else {
				      $('.error#lastname_err').html('').hide();
				 }
				 }
					 
									
			
//.......Address.......				
	   
				if(staffid == ""){
					$("#staffid").focus();
					$('.error#staffid-err').html('* Please enter your Staff ID').show();
					return false;
				    }else {
				      $('.error#staffid-err').html('').hide();
					 } 
					
										
			
				
//......Validate Email.....	
		
				
				if(email != ""){
					if(!validateEmail(email)){
						$("#email").focus();
						$('.error#email-err').html('* Invalid email format').show();
						return false; 
					} else{
						$('.error#email-err').html('').hide();
					} 
					if(checkEmail(email) == 100){
						$("#email").focus();
						$('.error#email-err').html('* Email has been registered').show();
						return false;
					} else{
						$('.error#email-err').html('').hide();
					} 
				} else{
					$("#email").focus();
					$('.error#email-err').html('* Please enter your email').show();
					return false;
				}
				
				


//......Password.......				
			
				if(password == ""){
					$("#password").focus();
					$('.error#password_err').html('*Please enter your Password').show();
				}else{
						$('.error#password_err').html('').hide();
				}
					
//...confirm_password...				
				
				if(password2 !== password ){
				$("#password2").focus();
					return false;
				} else{
					$.ajax({
					url: "../lib/new.php",
					type:"POST",	
					data:"lastname=" + lastname + "&firstname=" + firstname  + "&email=" + email + "&staffid=" + staffid + "&password=" + password ,
					beforeSend: function(){
						$('#signup').html(' Please wait... <i class="fa fa-spin fa-spinner"  style="font-size:30px" ></i>');	
					},
					success:function(response){
						if(response == 200){
                        window.location.href = "../lib/logerror.php";
						}else if(response == 100){
                         alert ('error')
						}
						 console.log(response);
					},
					
					timeout: 10000,
					error: function(){},
					complete:function(){
						$('#signup').html('Sign Up ');	
						$('#signup').attr('disabled', false);
						 },
						
					});
				
					}		
					
					});
	



//...................login.................................................

  $('#login').click(function(e) {
	e.preventDefault();			
		var username = $("#username").val();	
		var password = $("#password").val();		

				if(username == ""){
					$("#username").focus();
					$('.error#userlogin_err').html('* Please fill in this field').show;
					return false;
				}	  
				else {
					$('.error#userlogin_err').html('').hide;
				}				
				
				if(password == ""){
					$("#password").focus();
					$('.error2#passwordlogin_err').html('* Enter Password').show;
					return false;
				}else {

					$('#passwordlogin_err').html('').hide;
					}

			     if (username!=="" & password !== "")
			
					{
	$.ajax({
					url: "lib/login.php",
					type:"POST",
					data:"username=" + username + "&password=" + password,
					
					beforeSend: function(){
						$('#signup').html('<i class="fa fa-spin fa-spinner"  style="font-size:30px" ></i>');	
						$('#save').attr("disabled", "disabled");
					},
					success:function(response){						
						if( response == 100){
							alert ("error");
						}
						else if(response == 200){
                        window.location.href = "lib/admin.php";
						}
						else if(response == 300){
                        window.location = "lib/logerror.php";
						}

						 console.log(response);
					},
					timeout: 10000,
					error: function(){},
					complete:function(){
							$('#signup').removeClass('btn-default').addClass('btn-primary').html('Sign Up');
						},
						
 			 })
	}
})




//................................submit function............................................
 $('#save').click(function() {
		
		var error = $("#error").val();	
		var details = $("#details").val();		
		var status = $("#status").val();	
		var solution = $("#solution").val();
		

		if(error == ""){
					$("#error").focus();
					$('.error#error_err').html('* Please fill in this field').show;
					return false;
				}else {
					$('.error#error_err').html('').hide;
				    }				

				if(details == ""){
					$("#details").focus();
					$('.error2#details_err').html('* Please fill in this field').show;
					return false;
				}	
				else {
					$('.error#details_err').html('').hide;
				    }
 
	$.ajax({
					url: "../lib/sendreport.php",
					type:"POST",
					data:"error=" + error + "&details=" + details + "&status=" + status  + "&solution=" + solution ,
					beforeSend: function(){
						$('#save').html('Please wait...<i class="fa fa-spin fa-spinner"></i>');	
						$('#save').attr("disabled", "disabled");
					},
					success:function(response){
						
						if( response == 100){
							alert("error");
						}
						else{
							if(response == 200)
                       window.location.href = "../lib/error_list.php";
						}
						
						 console.log(response);
					},
					timeout: 10000,
					error: function(){
						$('#save').html('SAVE');
						$('#save').attr('disabled', false);
					},
					complete:function(){
						$('#save').html('SAVE');	
						$('#save').attr('disabled', false);
			          		},
						
 			 })
		})
 	})