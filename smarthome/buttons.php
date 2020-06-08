<?php session_start();
	include('config.php');
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title; ?></title>
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
    <body class="sb-nav-fixed">
        
            
		<div style="width:100%;" class="content">
				
			<script src="../css/styles.css"></script>
			<div id="layoutSidenav_content">
				<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
				<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.1/web-animations.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/muuri/0.5.3/muuri.min.js"></script>
                <main>
                    <div class="container-fluid" style="padding-top: 5px;">
                        
							<?php include('main/buttonraw.php'); ?>
							
							<!-- CREATE -->
							<div class="row">
								<div class="col-xl-12">
									<div class="card mb-4">
										<div class="card-header">
											Action's
										</div>
										<div class="col-xl-12"><br>

											<label style="margin-left: 20px;">
												Sort Button's
											</label>
											<label class="btn switch">
												<input type="checkbox" id="check" onclick="sorting()">
												<span class="slider round"></span>
											</label>
										</div>
									</div>
								</div>
							</div>
							
							
							<style>
								
								.switch {
								  margin: 5px;
								  position: relative;
								  display: inline-block;
								  width: 60px;
								  height: 34px;
								}

								.switch input { 
								  opacity: 0;
								}

								.slider {
								  position: absolute;
								  cursor: pointer;
								  top: 0;
								  left: 0;
								  right: 0;
								  bottom: 0;
								  background-color: #ccc;
								  -webkit-transition: .4s;
								  transition: .4s;
								}

								.slider:before {
								  position: absolute;
								  content: "";
								  height: 26px;
								  width: 26px;
								  left: 4px;
								  bottom: 4px;
								  background-color: white;
								  -webkit-transition: .4s;
								  transition: .4s;
								}

								input:checked + .slider {
								  background-color: #2196F3;
								}

								input:focus + .slider {
								  box-shadow: 0 0 1px #2196F3;
								}

								input:checked + .slider:before {
								  -webkit-transform: translateX(26px);
								  -ms-transform: translateX(26px);
								  transform: translateX(26px);
								}

								/* Rounded sliders */
								.slider.round {
								  border-radius: 34px;
								}

								.slider.round:before {
								  border-radius: 50%;
								}
								
								
								
								.grid {
								  position: relative;
								}
								
								.item {
								  display: block;
								  position: absolute;
								  height-min: 100px;
								  width-min: 100px;
								  height: auto;
								  width: auto;
								  margin: 5px;
								  text-align: center;
								  z-index: 1;
								}
								
								
								
								
								.item.muuri-item-dragging {
								  z-index: 3;
								}

								.item.muuri-item-releasing {
								  z-index: 2;
								}

								.item.muuri-item-hidden {
								  z-index: 0;
								}

								.item-content {
								  position: relative;
								  width: 100%;
								  height: 100%;
								  cursor: pointer;
								  color: #fff;
								  background: #59687d;
								  font-size: 40px;
								  text-align: center;
								}

								.item.muuri-item-dragging .item-content {
								  background: #8993a2;
								}

								.item.muuri-item-releasing .item-content {
								  background: #152c43;
								}

							</style>
							
							
							<script>

								const grid = new Muuri(".grid", {
									dragEnabled: false
								});

								function sorting() {
									
									var x = document.getElementById("check").checked;
									
									if(x == true) {
										
										const grid = new Muuri(".grid", {
											dragEnabled: true
										});
										
									}else{
										location.reload();
									}
									
								}
								
								
								
								function button(head, action) {
									var x = document.getElementById("check").checked;
									if(x == false) {
										alert(head + " " + action);
									}
								}
								
								
								
							</script>
						
						</div>
						

			</main>
		</div>
                
		<footer class="py-4 bg-light mt-auto">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Copyright &copy;</div>
				</div>
			</div>
		</footer>
		
	</div>
</div>

			
			
			
			
			
			
		<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/chart-area-demo.js"></script>
		<script src="assets/demo/chart-bar-demo.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>-->
	</body>
</html>
