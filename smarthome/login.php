<?php session_start();

include('config.php');
$errorl = '0';


if(isset($_POST['submit']) == true) {
	$username = $_POST['username'];
	$hashpw = $_POST['hashpw'];
	$sql = "SELECT * FROM login";
	$result = mysqli_query($con, $sql);
	$password = $hashpw;
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if($username == $row['username'] and $password == $row['password']) {
				$errormsg = "successfully logged in.";
				$_SESSION['username'] = $username ;
				header('location:' . $homelink . '?p=index');
				
			}else{
				if($username == 'guest') {
					echo "successfully logged in as guest";
					$_SESSION['username'] = $username ;
					header('location:' . $homelink . '?p=index');

				}else{
					$errormsg = 'Password or username incorrect.';
					$errorl = '1';
				}
			}
		}
	mysqli_close($con);
	}
		
}
	




?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
										<div class="card-body">
											<form method="post">
												<div class="form-group">
													<label class="small mb-1">Username</label>
													<input class="form-control py-4" name="username" type="text" placeholder="Enter Username"/>
												</div>
												
												<div class="form-group">
													<label class="small mb-1" for="inputPassword">Password</label>
													<input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password"/>
												</div>
											   
												<div class="form-group">
													<div class="custom-control custom-checkbox">
														<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox"/>
														<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
													</div>
												</div>
												
												<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
													<a class="small" href="password.php">Forgot Password?</a>
													
													<input type="text" name="hashpw" id="hashtext" style="display: none;"/>
													<input class="btn btn-primary" onclick="createhash()" name="submit" type="submit" value="Login"/>
												</div>
											</form>
											<script>
												
												
												
												function createhash() {
													document.getElementById('hashtext').value = sha256(document.getElementById('inputPassword').value);
												}
											</script>	
											
											<div class="error">
												<?php if($errorl == '1'){echo $errormsg;} ?>
											</div>
										</div>
									<div class="card-footer text-center">
										<div class="small">
											<a href="register.php">Need an account? Sign up!</a>
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
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
