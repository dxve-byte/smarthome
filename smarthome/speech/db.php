<?php include("../config.php");

session_start();
if(isset($_SESSION['username'])) {
}else{
    header('location:' . $loginlink) ;
}



function select() {
	
	$sql = "SELECT * FROM login WHERE `username` = '".$_SESSION['username']."'";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "id: " . $row["id"].
		}
	}else{
		echo "0 results";
	}

	mysqli_close($con);
}


function insert($voice, $robotname) {
	
	$sql = "INSERT INTO `settings` (voice, robotname)
	VALUES ('0', '".$voice."', '".$robotname."')";

	if (mysqli_query($con, $sql)) {
		echo "success";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
		
	}


function cmd($type, $received, $cmd) {

	$q = "INSERT INTO `commands`(`id`,`type`,`received`,`cmd`)VALUES('id','".$type."', '".$received."','".$cmd."')" ;
	if(mysqli_query($con, $q )) {
		echo "succesfully";
	}else{
		echo 'Error' ;
	}


}

?>