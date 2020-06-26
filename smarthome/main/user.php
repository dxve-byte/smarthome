<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">User</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">user [<?php echo $_SESSION['username']; ?>]</li>
				</ol>

				<div class="row">
					<div class="col-xl-3">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-area mr-1"></i>
								You
							</div>
							<div class="card-body">
								
								<div style="background-color: gray; border-radius: 100%;  padding: 45%;"><img rel="jpg/png" src="C:\Users\Dave\Pictures\ACHuPn.jpg"/></div>
                                <span style=""><?php echo $_SESSION['username']; ?></span>

							</div>
						</div>
					</div>
					
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-bar mr-1"></i>
								Your informations
							</div>
							
							<div class="card-body">
                                <?php
                                    $sql = "SELECT * FROM login WHERE username = '".$_SESSION['username']."'";					
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        echo 'Username:  ' . $row['username'] . '</label><br>';
                                        echo 'Joined:  ' . $row['date'] . '</label><br>';
                                        echo 'Lastname:  ' . $row['lastname'] . '</label><br>';
                                        echo 'Firstname:  ' . $row['firstname'] . '</label><br>';
                                        echo 'Email:  ' . $row['email'] . '</label><br>';
                                        // echo 'Role:  ' . $row[''] . '<br>';
                                        echo 'password:  ****' . ' <a href="changepw.php">change</a>';
                                        
                                    }
                                ?>
							</div>
						</div>
					</div>

					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-area mr-1"></i>
								Roles
							</div>

							<div class="card-body">
								
                                <?php
                                            
                                    $sql = "SELECT * FROM login";					
                                    $result = mysqli_query($con, $sql);
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            
                                    }
                                        
                                        
                                ?>

							</div>
						</div>
					</div>




				</div>
				
				
			<style>
					
			</style>

    </div>
</div>