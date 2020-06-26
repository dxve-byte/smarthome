<?php

/*

THIS FILE IS FOR SETTINGS AND SO ON

ALL FILES ARE CONNECTED WITH THIS, SO BE CAREFULL WITH ECHOS/PRINTS !!


*/

/*		Other		*/
	
	$admin = 'root';	#NAME
	$servername = 'localhost';
	$title = 'Smarthome'; 		#standart title
	$dberrormes = 'Error. Please contact with Admin!';
	$db_conn_option = '1'; 			// 1 (no port) | 2 (uses port)
	

/*		INDEX-style			*/
	
	$indexheader = 'Smarthome';

/*		LINKS			*/


$databaselink = 'http://' . $servername . '127.0.0.1/phpmyadmin';
$loginlink = 'http://' . $servername . '/smarthome/login.php';
$homelink = 'http://' . $servername . '/smarthome/index.php';






if($db_conn_option == '1') {
	
	// 1
	
	$servernamedb = '';			#leave blank for servername-option above!
	$usernamedb = "root";
	$passworddb = "";
	$database = "smart";
	$port = "97";


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

}else{
	
	// 2
	
	define('DB_SERVER', '127.0.0.1');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'smarthome');
	define('DB_PORT', 3308);

	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME, DB_PORT);

	
	if(mysqli_connect_errno()) {
		// echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}else{
		// echo "connected";
	}
	
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