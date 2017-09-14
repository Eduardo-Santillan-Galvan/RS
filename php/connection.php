<?php
include('usefulScripts.php');

function Connect2DB(){
	//Credentials
	$serverName = "localhost:3306";
	$username = "root";
	$password = "";
	$databaseName = "project_shop";
		//echo "Testing connection to : " . $databaseName . " in " . $serverName . "<br>";
		$connection = new mysqli($serverName, $username, $password, $databaseName);
		if ($connection->connect_errno) {
   			//echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
   			ConsoleLog("Failed to connect.");
		}
		else{
			//echo "Connection succesful.";
			ConsoleLog("Connection succesful.");
		}
	
	return $connection;
}
?>