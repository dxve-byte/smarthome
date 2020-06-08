<?php

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$token = $_POST['token'];
	$owner = $_POST['select'];
	$ip = $_POST['ip'];
	
	if($name != ""){
	    
	    $i = "SELECT * FROM `device` WHERE `token`='".$token."'"; //
        $r = mysqli_query($con, $i) ;
		
        if(mysqli_num_rows($r) > 0) {
            ?> <script>alert("Please refresh site, for a new token!"); </script><?php
        }else{
            $q="INSERT INTO `device`(`id`,`name`,`owner`,`token`, `ip`)VALUES('id','".$name."','".$owner."','".$token."', '".$ip."')";
            if(mysqli_query($con, $q)){
			echo "Device succesfully added.";
	        }else{
			    echo $dberror;
		    }
        }
	    
	    
                
                
	    }else{
	       ?> <script>alert("Please fill all the boxes!"); </script><?php
        }
    }


function password_generate($chars) 
{
  $data = '1234567890';
  return substr(str_shuffle($data), 0, $chars);
}

?>
<body style="background-color: #007bff; margin-top: 25px;">
	<div id="layoutAuthentication">
		<div id="layoutAuthentication_content">
			<main>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-5" style="float: right; margin-left: 15%;">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Create new Device</h3>
								</div>
								<div class="card-body">
									<form method="post">
										<div class="form-group">
											<label class="small mb-1">Name</label>
											<input class="form-control py-4" id="devicename" name="name" type="text" placeholder="Enter device name"required/>
										</div>
										
										<div class="form-group">
											<label class="small mb-1">IP</label>
											<input class="form-control py-4" name="ip" type="text" placeholder="Enter IP-Address" required/>
										</div>
											
										<div class="form-group">
											<label class="small mb-1">Choose an Owner:</label>
											<br>
											<div class="box">
												<select name="select" class="select">
														
													<?php
													
														$sql = "SELECT * FROM login";					
														$result = mysqli_query($con, $sql);
														while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
															echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
														}
														
													
														
														
														if(isset($_GET['del']) == true) {
															$sql = "DELETE FROM device WHERE `token`='".$_GET['del']."'";
															if(mysqli_query($con, $sql)){
																?> <script> location.href="index.php?p=devices"; </script> <?php
															}else{
																echo $dberrormes;
															}
														}
													?>	
													
													</select>
											</div>
										</div>
												   
										<div class="form-group">
											<label class="small mb-1" for="inputPassword">Generated Token</label>
											<a class="nav-link" style="float: right" onclick="help()">
												<div class="sb-nav-link-icon">
													<i class="fas fa-question-circle"></i>
												</div>
											</a>
												
											<script> 
												function help() {
													alert('Insert this Token in your device-code (at: token="xxx").');
												}
												
												function deletes(token) {
													var conf = confirm('Do you really want to delete this device?');
													if(conf == true) {
														location.href="index.php?p=devices&del=" + token;
													}
												}
												
											</script>
											
											
											<input class="form-control py-4" name="token" value="<?php echo password_generate(10); ?>" type="text" placeholder="Token" readonly/>
										</div>
											
										<input class="btn btn-primary" name="submit" type="submit" style="float: right" value="Add"/>
									</form>
								</div>
							</div>
						</div>
						
							
							
						<div class="col-lg-5" style="float: right;">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
									<h3 class="text-center font-weight-light my-4">Already created Devices</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<div class="box">
											<table id="customers">
												<tr>
													<th>Name</th>
													<th>Token</th>
													<th>IP</th>
													<th>Actions</th>
												</tr>
														
												<?php
														
													$sql = "SELECT * FROM device";					
													$result = mysqli_query($con, $sql);
													while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {	
														if($_SESSION['username'] == $row['owner']) {
															echo '<tr>
																	<td>'.$row['name'].'</td>
																	<td>'.$row['token'].'</td>
																	<td>'.$row['ip'].'</td>
																	<td>
																		<div class="sb-nav-link-icon">
																			<a class="nav-link" style="float: right; cursor: pointer;" onclick="deletes('.$row['token'].')">
																				<i class="fas fa-trash-alt"></i>
																			</a>
																		</div>
																		<div class="sb-nav-link-icon">
																			<a class="nav-link" style="float: right; cursor: pointer;" onclick="help()">
																				<i class="fas fa-question-circle"></i>
																			</a>
																		</div>
																	</td>
																	
																</tr>';
														}
													}
													
													
													?>
											</table>	
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="col-lg-5" style="float: center;">
							<div class="card shadow-lg border-0 rounded-lg mt-5">
								<div class="card-header">
										<h3 class="text-center font-weight-light my-4">Auto-Fill</h3>
								</div>
								<div class="card-body">
									<div class="form-group">
										<div class="box">
											<label>A module that search for device's in your near and build up a connection.</label>
											<label>Conditions:
												<li>Device is ON</li>
												<li>Device needs internet connection (IP address)</li>
												
											</label>
											
											<br>
											<button href="data.php">Search</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</main>
		</div>
	</div>
</body>
        
<style>
	.select {
	  background-color: white;
	  color: black;
	  padding: 5px;
	  width: 200px;
	  border: none;
	  -webkit-appearance: button;
	  appearance: button;
	  outline: none;
	}

	.box:hover::before {
	  color: rgba(255, 255, 255, 0.6);
	  background-color: rgba(255, 255, 255, 0.2);
	}

	.select option {
	  padding: 30px;
	}
	

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
