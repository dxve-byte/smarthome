<?php

	include('config.php');
	
	$pdo = ('SELECT MAX(id) FROM device');					
	$result = mysqli_query($con, $pdo);
	while ($maxidres = $result->fetch_row()) {
		$maxid = $maxidres[0];
		//echo $maxid;
	}
						
		$sql = "SELECT * FROM device";					
		$result = mysqli_query($con, $sql);
		
		
		while($zeile = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$ip = $zeile['ip'];
			$id = $zeile['id']; //ID ACHTUNG keine IP
			
			
			
				$verw = "verweigerte";				
				$serverCheck = @fsockopen ($ip, 5000, $errorno, $errorstr, 3); //pingt IP an die in Tabelle steht bei
				//echo $errorstr;
				$pos = strpos($errorstr, $verw);
				
				// echo $errorstr;	
				
				if($pos === false) {
					
						echo "[$ip] Device is offline<br></br>";
						//offline
						if($id == $maxid) {
							header("Refresh:0");
						}
							
				}else {
					//echo "Error updating: " . $con->error;
					if($id == $maxid) {
						header("Refresh:0");
					}
				
				

					echo "[$ip] Device is online<br></br>";
					if($id == $maxid) {
						header("Refresh:0");
					}
					
				}
				
		}						
?>