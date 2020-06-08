<?php
	
	
	if(isset($_GET['m'], $_GET['t'], $_GET['token']) == true) {
		$message = $_GET['m'];
		$mto = $_GET['t'];
		$day = date("j.m.Y");
		$time = date("H:i:s");
		$token = $_GET['token'];
		
		$sql = "SELECT * FROM device";					
		$result = mysqli_query($con, $sql);
		while($rowd = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			if($rowd['token'] == $token) {
				
				$mfrom = $rowd['name'];	#CHECK's THE TOKEN
				
				$q = "INSERT INTO `messages`(`id`,`mfrom`,`mto`,`message`,`day`,`time`)VALUES('".$lastid."','".$mfrom."', '".$mto."','".$message."','".$day."','".$time."')";
				if(mysqli_query($con, $q)){}else{
					echo $dberrormes;
				}
			}
		}
		
		
		
		
		
	}else{
		$erroron = "1";
	}


?>

<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Communication</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Smarthome | Communication</li>
			</ol>
			
			<div class="row">
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-tasks mr-1"></i>
								Communication
						</div>
						<div class="card-body">
							<form method="post">
								<div class="todo-header">
									<?php if(isset($erroron) == true){ if($erroron == '1'){ echo "<strong>[E] Missing parameters | failed</strong><br>";}} ?>
									<br>
									Messages from <strong>Last Hour</strong>:
								</div>
							</form>
								<table id="customers">
									<tr>
										<th>From</th>
										<th>To</th>
										<th>Message</th>
									</tr>
								<?php
									
									$sql = "SELECT * FROM messages";					
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {	
										echo '<tr>
											<td>'.$row['mfrom'].'</td>
											<td>'.$row['mto'].'</td>
											<td>'.$row['message'].'</td>
											</tr>';
									}
									echo '</table>';
									
									$sql = "SELECT * FROM messages";					
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {	
										
										
										$time1 = date("i:s");
										$timedelete = date("H") - 1;
										$timedelete = $timedelete . ":" . $time1;
										
										// print($timedelete . ' WITH ' . $row['time'] . '<br>');
										
										
										if($timedelete > $row['time']) {
											
											$querydel = "DELETE FROM `messages` WHERE `time` < '".$timedelete."'";
											if(mysqli_query($con, $querydel)){}else{
												echo $dberrormes ;
											}
											
											$queryinc = "ALTER TABLE messages AUTO_INCREMENT = 1";
											if(mysqli_query($con, $queryinc)){}else{
												echo $dberrormes;
											}
										}
										
									}
									
								?>
						</div>
					</div>
				</div>
				
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fab fa-js-square"></i>
								JSON
						</div>
						<div class="card-body">
							
							<?php

								$sql = "SELECT * FROM messages";					
								$result = mysqli_query($con, $sql);
								while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									if($row['day'] == date('j.m.Y')) {
										$json_array[] = $row;
									}
								}
								
								$json_array = json_encode($json_array, JSON_PRETTY_PRINT);
								echo '<textarea style="width: 100%; height: 250px;" readonly>' . $json_array . '</textarea>';
								
								
							?>
								
						</div>
					</div>
				</div>
				
				
				
				
			</div>
		</div>
	</main>
</div>


<style>

#customers {
	border-collapse: collapse;
	width: 100%;
}

#customers td, #customers th {
	border: 1px solid #ddd;
	border-radius: 1px;
	padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
	padding-top: 12px;
	padding-bottom: 12px;
	text-align: left;
	background-color: #e6e6e6;
	color: black;
}
</style>



