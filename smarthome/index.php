<?php session_start();
include('config.php');
include('whitelist-denied.php');

if(isset($_SESSION['username'])) {
}else{
	header('location:' . $loginlink);
}




# !! DARK !!

?>


<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title><?php echo $title; ?></title>
		<link href="css/styles.css" rel="stylesheet"/>
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
		<link rel="icon" href="css/favicon.png">
	</head>
	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="index.php"><?php echo $indexheader; ?></a>
			<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
				<i class="fas fa-bars"></i>
			</button>
			<!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <?php echo $date = date("r"); ?>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user fa-fw"></i>
					</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="?p=user">Me</a>
						<a class="dropdown-item" name="dark">Darkmode</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">
						Dashboard
							</div>
							
                            <a class="nav-link" href="?p=index" style="cursor: pointer;">
								<div class="sb-nav-link-icon">
									<i class="fas fa-tachometer-alt"></i>
								</div>
						Dashboard
							</a>
							
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
								<div class="sb-nav-link-icon">
									<i class="fas fa-columns"></i>
								</div>
						Other
                                <div class="sb-sidenav-collapse-arrow">
									<i class="fas fa-angle-down"></i>
								</div>
                            </a>
							
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link" href="?p=communication">
										<div class="sb-nav-link-icon">
											<i class="fas fa-broadcast-tower"></i>
										</div>
										Communication
									</a>
								</nav>
							</div>

							<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                	<nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link" href="?p=devices">
										<div class="sb-nav-link-icon">
											<i class="fas fa-mobile-alt"></i>
										</div>
										Devices
									</a>
								</nav>
                            </div>							
							
                            <div class="sb-sidenav-menu-heading">Addons</div>
							
                           
							
                            <a class="nav-link" href="speech/">
                                <div class="sb-nav-link-icon">
									<i class="fas fa-microphone"></i>
								</div>
						Speech Recognition
							</a>
							
							
							<a class="nav-link" href="?p=todo">
								<div class="sb-nav-link-icon">
									<i class="fas fa-tasks"></i>
								</div>
						To-Do-List
							</a>

							<?php if($_SESSION['username'] == $admin) {
								echo '<a class="nav-link" href="?p=whitelist">
                                					<div class="sb-nav-link-icon">
										<i class="fas fa-user-lock"></i>
									</div>
										Whitelist
								</a>';
							
								}
							?>
							
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['username']; ?>
                    </div>
                </nav>
            </div>
            
			<div style="width:100%;" class="content">
				
				<?php
					
					if(isset($_GET['p']) == true) {
						$page = $_GET['p'];
						
						
						
						if($page == 'index') {
							if(isset($_GET['b'])== true){
								if($_GET['b'] == 'true') {
									?> <script> window.location.assign("main/buttons.php")</script> <?php
								}else{
									include('main/index.php');
								}
							}else{
								include('main/index.php');
							}
						}elseif($page == 'user'){
							include('main/user.php');
						}elseif($page == 'tables'){
							include('main/tables.php');
						}elseif($page == 'chart'){
							include('main/chart.php');
						}elseif($page == 'whitelist'){
							include('main/whitelist.php');
						}elseif($page == 'todo'){
							include('main/todo.php');
						}elseif($page == 'communication'){
							include('main/communication.php');
						}elseif($page == 'devices'){
							include('main/device.php');
						}else{
							include('main/index.php');
						}
					}else{
						include('main/index.php');
					}
					
				?>
				
			</div>
			
			
			
			
			
			
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/chart-area-demo.js"></script>
		<script src="assets/demo/chart-bar-demo.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
	</body>
</html>
