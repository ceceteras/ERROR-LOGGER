function checkEmail(email){
	var foo = "";
	$.ajax({
		url:'../lib/check.php',
		type:'POST',
		data: 'page=email' + '&email=' + email,
		async:false,
		success: function(response){
			foo = response;
			
		}
	});

	return foo;
	//console.log(foo);
}

function checkusername(username){
	var user = "";
	$.ajax({
		url:'../lib/check.php',
		type:'POST',
		data: 'page=username' + '&username=' + username,
		async:false,
		success: function(response){
			user= response;
			
		}
	});

	return user;
}
