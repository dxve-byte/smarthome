<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">Whitelist</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">Whitelist</li>
				</ol>

				<div class="row">
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-area mr-1"></i>
								What is this?
							</div>
							<div class="card-body">
								
								A <strong>Whitelist</strong> is a permission-list for user's that can easily join the Server.
								The other side of an Whitelist is a <strong>Blacklist</strong>, this list is for user's, that cannot join the Server.
								<br><br>
								So here you can decide wich user <strong>can</strong> or <strong>cannot</strong> join the Server.<br>
								
								<br><strong>1. Select</strong> an option <br>(OnlyAdmin = <strong>only</strong> admin can join,<br> Nobody = No one can join, except admin)
								<br><strong>1.1 </strong>Press submit
								<br><strong>2. </strong>To block <strong>more selected user's</strong>, write the username in the field <strong>(without spaces)</strong> (All user's you don't choose, will automatically join the Whitelist).
								<br><strong>3. </strong>Press <strong>Submit</strong> and finish.
							</div>
						</div>
					</div>
					
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-bar mr-1"></i>
								Whitelist
							</div>
							
							<div class="card-body">
								<form method="post">
									<input type="radio" id="oa" name="radio" value="onlyadmin">
									<label>Only Admin</label>
									<br><br>
									
									
									
									<input type="radio" id="no" name="radio" value="nobody" checked/>
									<label>Nobody</label>
									<br><br>
									
									
									
									<input type="radio" id="se" name="radio" value="select">
									<label>Select an user</label>
									<br>
									
									<select id="slct">
										<?php
											echo 'Current users: ';
											$sql = "SELECT * FROM login";					
											$result = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
												if($row['username'] == $admin){}else{
													echo '<option name="user">' . $row['username'].'</option>';
												}
											}
										?>
									</select><br>
									
								
									<label>Server will block user/s:</label><br>
									<input type="text" name="blockusers" id="blockusers"><br>
									

									<br><input type="submit" name="submit" value="Submit"/>
								</form>
								
								
								
								
								<?php
									# TRUE == cannot join
									# FALSE == can join
									
									if(isset($_POST['submit']) == true) {
										if(isset($_POST['radio']) == true) {
											if($_POST['radio'] == "onlyadmin") {
												
												$sql = "UPDATE login SET whitelist='true' WHERE username!='".$admin."'";
												if(mysqli_query($con, $sql)){
												}else{
												}
											
											}if($_POST['radio'] == "select") {
												
												$blockedlist = explode(",", $_POST['blockusers']);
												$sql = "UPDATE login SET whitelist='false' WHERE username!='".$admin."'";
												if(mysqli_query($con, $sql)){
												}else{
												}		
												
												foreach($blockedlist as $name) {
													$sql = "UPDATE login SET whitelist='true' WHERE username='".$name."'";
													if(mysqli_query($con, $sql)){
													}else{
													}
												}
												
											}if($_POST['radio'] == "nobody") {
												
												$sql = "UPDATE login SET whitelist='false'";
												if(mysqli_query($con, $sql)){
												}else{
												}
												
											}
										}
									
									
									
									
									
									
										
										
											
										
										
										
										$blockeduser = $_POST['blockusers'];
										echo "Currently blocked user's: ";
										$sql = "SELECT * FROM login";					
										$result = mysqli_query($con, $sql);
										while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											if($row['whitelist'] == 'true'){
												echo $row['username'];
											}
										}
										
									}

								?>
								
								
								
								
								
								
								<script>
									
									const users = [];
									function add() {
										var e = document.getElementById("slct").value;
										if(users.includes(e)) {}else{
											users.push(e);
										}
										document.getElementById('blockusers').value = users;
									}
									
								</script>
								
								
							</div>
						</div>
					</div>
				</div>
				
				
				<style>
					
				</style>