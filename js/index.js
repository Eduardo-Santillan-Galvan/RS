$( document ).ready(function() {
	console.log( "index.js loaded" );


	//actual page
    var loadedHTML = '../index.html';

    //login form
	var	form = '../login.php';

	$('#loginform').load(form);

});