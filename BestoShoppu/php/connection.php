<?php
include('usefulScripts.php');	//ConsoleLog("String");

function Connect2DB(){
	//Credenciales
	$serverName = "localhost:3306";
	$username = "root";
	$password = "";
	$databaseName = "project_shop";
		
		$connection = new mysqli($serverName, $username, $password, $databaseName);
		if ($connection->connect_errno) {
   			ConsoleLog("Failed to connect.");
		}
		else{	
			ConsoleLog("Connection succesful.");
		}
	return $connection;
}
?>