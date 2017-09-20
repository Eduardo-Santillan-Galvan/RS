$( document ).ready(function() {
	//console.log( "navbar.js loaded" );
	$("#profile").on('click', function(){
		$('#main-body').load('./php/profile.php', function(){
			console.log("load read-eh!");
		});
	});
	
});