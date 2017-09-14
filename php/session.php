<?php

	include("./connection.php");

	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	$connection = Connect2DB();
	// Selecting Database
	session_start();// Starting Session
	if (!isset($_SESSION['login_user'])) {
		echo "<script type='text/javascript'>alert('No ha iniciado sesión');</script>";
		header("location: ../index.html");
	}else{
		echo "Welcome " . $_SESSION['login_user'];
	}

	// Storing Session
	$user_check=$_SESSION['login_user'];
	

	
?>