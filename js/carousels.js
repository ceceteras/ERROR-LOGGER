 // my javascript library
$(document).ready(function() {
	
	
//...................livesearch............................................


	/*
	$("#searchit").keydown(function(){	
		var searchit = $("#searchit").val();
			$.post("search.php", {searchit:searchit}, 
		function(data){
			$("#output").html(data);
			console.log(data);
			});

})
})
*/
$("#searchit").keyup(function(){	
		var searchit = $("#searchit").val();
		
	$.ajax({ 
		url: "search.php",
		type: "POST",
		data:"searchit="+ searchit,		
		success:function(data){
			$("#output").html(data).show;
			console.log(data);
			},
	})

})
});
