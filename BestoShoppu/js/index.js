$( document ).ready(function() {
	console.log( "index.js loaded" );


	//actual page
    var navbar = './navbar.php';

    //login form
	var	form = './login.php';

	$('#navbar').load(navbar);

	

});