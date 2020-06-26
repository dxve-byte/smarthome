<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">News</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item active">News</li>
				</ol>

				<div class="row">
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-area mr-1"></i>
								Information
							</div>
							<div class="card-body">
								
								Version:  <?php echo '7.3' ?>
                                PHP info: <?php include('C:\xampp2\apache\logs\access.logs'); ?>

							</div>
						</div>
					</div>
					
					<div class="col-xl-6">
						<div class="card mb-4">
							<div class="card-header">
								<i class="fas fa-chart-bar mr-1"></i>
								News
							</div>
							
							<div class="card-body">

									<input type="radio" name="radio" value="onlyadmin">
									<label></label>
									<br><br>
									
								
								
								
								
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