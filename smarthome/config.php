<?php

/*

THIS FILE IS FOR SETTINGS AND SO ON




*/

/*		Other		*/
	
	$admin = 'root';	#NAME
	$servername = 'localhost';
	$title = 'Smarthome'; 		#standart title
	$dberrormes = 'Error. Please contact with Admin!';

/*		INDEX-style			*/
	
	$indexheader = 'Smarthome';

/*		LINKS			*/


$databaselink = 'http://' . $servername . '127.0.0.1/phpmyadmin';
$loginlink = 'http://' . $servername . '/smarthome/login.php';
$homelink = 'http://' . $servername . '/smarthome/index.php';

$servernamedb = '';			#leave blank for servername-option above!
$usernamedb = "root";
$passworddb = "";
$database = "smart";
$port = "97";


// Ignore
if($servernamedb == '') {
	$servernamedb = $servername;
}

$con = mysqli_connect($servernamedb, $usernamedb, $passworddb, $database);
$mysqli_connection = new MySQLi($servername, $usernamedb, $passworddb, $database);
if ($mysqli_connection->connect_error) {
   //echo "Not connected, error: " . $mysqli_connection->connect_error;
}else{
   //echo "Connected.";
}





#	
#	
#	
#	
#	
#
/*		fix-errors		*/
	
	if($title == '') {
		$title = 'Smarthome';
	}
	
	if($indexheader == '') {
		$indexheader = 'Smarthome';
	}

?>