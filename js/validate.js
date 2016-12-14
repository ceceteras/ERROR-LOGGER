// JavaScript Document
//......................Validate Strings .........
function validate_string(string){
	var standard = /^([a-zA-Z]{2,20})?$/;
	if (!standard.test(string)){
		return false;
	} else {		
	return true;
	}
}

//....................Validate Username ...........

function validate_username($username){
	var standard = /^([a-zA-Z0-9_-]{2,20})?$/;
	if (!standard.test($username)){
		return false;
	} else {		
	return true;
	
	}
}

//..................Validate Digits............

function validate_digit(digit){
	var standard = /^([0-9])?$/;
	if (!standard.test(digit)){
		return false;
	} else {		
	return true;
	}
}

//................ Validate password..............



/**
  * Validate Emails to match conventional email format
  */
  function validateEmail($email){
	var standard = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(!standard.test($email)){
		return false;
	} else{
		return true; 	
	}
  }
