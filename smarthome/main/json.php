<?php


if(isset($_GET['token']) == true) {
	include('../config.php');
	
	$sql = "SELECT * FROM device";					
	$result = mysqli_query($con, $sql);
	while($rowd = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if($rowd['token'] == $_GET['token']) {
			
	
			$sql = "SELECT * FROM messages";					
			$result = mysqli_query($con, $sql);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				if($row['day'] == date('z')) {
					$json_array[] = $row;
				}
			}
			
			$json_array = json_encode($json_array, JSON_PRETTY_PRINT);
			#echo $json_array;
			echo '<pre>' . $json_array . '</pre>';
			
			
			base64_encode(json_encode($json_array));
			json_decode(shell_exec('python ' . base64_encode(json_encode($json_array)) ));
		}
		
		
		
	}
		
	
	
	
								
}else{
	echo "[E]";
}



base64_encode(json_encode($json_array));
json_decode(shell_exec('python ' . base64_encode(json_encode($json_array)) ));


?>