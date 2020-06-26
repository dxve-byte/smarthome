<!DOCTYPE html>
<html>

	<body>
		<?php
			include('../config.php');
			
			$sql = "SELECT * FROM messages";					
			$result = mysqli_query($con, $sql);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				if($row['day'] == date('j.m.Y')) {
					$json_array[] = $row;
					
				}
			}
			
			if(is_null($json_array)) {
				echo '<pre id="result">nothing</pre>';
			}else{
				$json_array = json_encode($json_array, JSON_PRETTY_PRINT);
				echo '<pre id="result">' . $json_array . '</pre>';
			}
			
			
		?>

	</body>
</html>