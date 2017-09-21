$( document ).ready(function() {
	
	$("#profile").on('click', function(){
		$('#main-body').load('./php/profile.php', function(){
			console.log("profile loaded");
		});
	});
	$("#all-items").on('click', function(){
		$('#main-body').load('./php/itemlist.php', function(){
			console.log("itemlist loaded.");
		});
	});
});