<?php

include('config.php');

if(isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$hashpw = $_POST['hashpw'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$email = $_POST['email'];
	$date = date("d.m.Y");
	
	if($username !="" or $password != "" or $cpassword !="" or $lastname != "" or $firstname !="" or $email != "") {
		if(strlen($password) <= 5) {
			if($password == $cpassword) {
				$password = $hashpw;
				
				
				$i = "SELECT * FROM `login` where `username`='".$username."'";
				$r = mysqli_query($con, $i) ;
			   
				if(mysqli_num_rows($r) > 0) {
					?> <script>alert("Sorry this Username exists already!"); </script><?php
				}else{
					$q="INSERT INTO `login`(`id`,`username`,`password`,`date`,`lastname`,`firstname`,`email`)VALUES('id','".$username."', '".$password."','".$date."','".$lastname."','".$firstname."','".$email."')" ;
					if(mysqli_query($con, $q )) {
					echo "Succesfully registered.";
					header('location:login.php');
					}else{
						echo $dberrormes ;
					}
				}
			
			}else{
				?> <script>alert("Password's aren't indentical!"); </script><?php
			}

		}else{
			?> <script>alert("Password is too short!"); </script><?php
		}
	}else{
		?> <script>alert("You forgot something! Please try again."); </script><?php
	}
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
										<div class="card-body">
											<form method="post">
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="small mb-1" for="inputFirstName">First Name</label>
															<input class="form-control py-4" name="firstname" id="inputFirstName" type="text" placeholder="Enter first name" />
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="small mb-1" for="inputLastName">Last Name</label>
															<input class="form-control py-4" name="lastname" id="inputLastName" type="text" placeholder="Enter last name" />
														</div>
													</div>
													
												</div>
												
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="small mb-1">Username</label>
															<input class="form-control py-4" name="username" name="username" type="text" placeholder="Enter Username"/>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="small mb-1" for="inputEmailAddress">Email</label>
															<input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address"/>
														</div>
													</div>
												</div>
												
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="small mb-1" for="inputPassword">Password</label>
															<input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password"/>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
															<input class="form-control py-4" id="inputConfirmPassword" name="cpassword" type="password" placeholder="Confirm password"/>
														</div>
													</div>
												</div>
												<div class="form-group mt-4 mb-0">
													
													<input type="text" name="hashpw" id="hashtext" style="display: none;"/>
													<input class="btn btn-primary btn-block" onclick="createhash()" name="submit" type="submit" value="Create Account"/>
												</div>
											</form>
										</div>
										<div class="card-footer text-center">
											<div class="small">
												<a href="login.php">Have an account? Go to login</a>
											</div>
										</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
		
		
		<script>
			function createhash() {
				document.getElementById('hashtext').value = sha256(document.getElementById('inputPassword').value);
			};
		</script>											
		
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
