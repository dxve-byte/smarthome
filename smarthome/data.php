<?php include('config.php');
	
	if(isset($_POST['submit']) == true) {
		if(isset($_POST['radio']) == true) {
			if($_POST['radio'] == "Knowed") {
				$log = '';
	
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
							
						$log = $log . "[$ip] Device is offline<br></br>";
						// offline
						
					}else {
						
						//echo "Error updating: " . $con->error;
						
						
						$log = $log . "[$ip] Device is online<br></br>";
						
					}
				}
	
			}else{
				
				$tolog = 'true';
				

			}
		}
	}
?>


<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">IP-lookup</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">IP-lookup</li>
			</ol>

			<div class="row">
					
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-wifi"></i>
							IP-lookup
						</div>
							
						<div class="card-body">
							<form method="post">
								
								<input type="radio" id="knowed" name="radio" value="Knowed" checked/>
								<label>Knowed IPs</label>
								<br><br>
								
								<input type="radio" id="all" name="radio" value="All">
								<label>Search for all IP's (0-255 Takes a while)</label>
								<br><br>
								
								
								<input type="submit" name="submit" value="Search"/>
								
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-wifi"></i>
							Log
						</div>
							
						<div class="card-body">
							
								<?php
									
									if($tolog == 'true') {
										for($i = 0; $i <= 45; $i++) {
											$ip = '192.168.178.' . $i;
											
											$verw = "verweigerte";				
											$serverCheck = @fsockopen ($ip, 5000, $errorno, $errorstr, 2.5);

											$pos = strpos($errorstr, $verw);
												
											$log = '';
											
											if($pos === false) {
													
												echo "<li style='color: red;'> [$ip] No Device founded </li>";
												// offline
												
											}else{
												
												
												
												echo "<li style='color: green;'> [$ip] Device founded </li>";
												
											}
											
											
										}
										
										for($i = 46; $i <= 90; $i++) {
											$ip = '192.168.178.' . $i;
											
											$verw = "verweigerte";				
											$serverCheck = @fsockopen ($ip, 5000, $errorno, $errorstr, 2.5);

											$pos = strpos($errorstr, $verw);
												
											$log = '';
											
											if($pos === false) {
													
												echo "<li style='color: red;'> [$ip] No Device founded </li>";
												// offline
												
											}else{
												
												
												
												echo "<li style='color: green;'> [$ip] Device founded </li>";
												
											}
											
											
										}
										
										
									}
									// echo $log;
									
								?>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</main>
</div>





