
<?php

if(isset($_POST['submit']) == true) {
	
	$header = $_POST['header'];
	$token = $_POST['token'];
	$action = $_POST['action'];
	$description = $_POST['description'];
	$color = $_POST['color'];
	$order = "1";
	
	if($header == true and $token == true and $action == true and $description == true and $color == true and $order == true ) {
		$sql = "SELECT action, header FROM `panel` WHERE `owner`='".$_SESSION['username']."'";
		$result = mysqli_query($con, $sql);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				
				if($row['action'] == $action or $row['header'] == $header) {
					$alright = 'false';
				}else{
					$alright = 'true';
				}
			}
		}
			
		
		if($alright == 'true') {
			$q = "INSERT INTO `panel`(`id`,`owner`,`header`,`body`,`action`,`inorder`,`color`, `token`)VALUES('id','".$_SESSION['username']."','".$header."','".$description."','".$action."','".$order."','".$color."', '".$token."')";
			if(mysqli_query($con, $q)){
				echo 'Successfully';
			}else{
				echo 'error';
			}
		}
	
	}
}

?>



<script src="../js/buttons.js"></script>

<div id="layoutSidenav_content">
			<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
			<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.1/web-animations.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/muuri/0.5.3/muuri.min.js"></script>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <!--<div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
										<i class="fas fa-chart-area mr-1"></i>
										Area Chart Example
									</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
						
							<div class="row">
								
								
								<div class="col-md-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">Panel 1</h3>
											<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
											<p class="panel-subtitle">Subtitle</p>
										</div>
										<div class="panel-body">
											Panel content
										</div>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">Panel 1</h3>
											<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
											<p class="panel-subtitle">Subtitle</p>
										</div>
										<div class="panel-body">
											Panel content
										</div>
									</div>
								</div>
							</div>-->
							
							<?php
								include('buttonraw.php');
							?>
							
							
							
							
							<!-- CREATE -->
							<div class="row">
								<div class="col-xl-12">
									<div class="card mb-4">
										<div class="card-header">
											Action's
										</div>
										<div class="col-xl-12"><br>
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
												Create new Button
											</button>
											
											
											
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
										//alert(head + " WITH 'action' : " + action + ' start?');
									}
								}
								
								
								
							</script>
						
						</div>
						

                        <!--<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>-->
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
		


<script>	
	function createnew() {
		$(document).ready(function(){
			$('#modalcreate').modal({
				backdrop: 'static'
			});
		});
	}
</script>


<!-- The Modal -->
<div class="modal fade" id="create">
    <div class="modal-dialog modal-lg">
		<div class="modal-content">
      
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Create Button</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<form method="post">
				<!-- Modal body -->
				<div class="modal-body">
					<div class="bd-example">
					

							<div class="form-group">
								<label for="exampleFormControlInput1">Header</label>
								<input type="text" class="form-control" name="header" id="exampleFormControlInput1" placeholder="Bedlight"/>
							</div>
							<div class="form-group">
								<label for="command">Token</label>
								<input type="text" id="command" class="form-control" name="token" placeholder="Token from device"/>
							</div>
							<div class="form-group">
								<label for="command">Action-Commands</label>
								<input type="text" id="command" class="form-control" name="action" placeholder="like 'Bedlight'"/>
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description</label>
								<textarea class="form-control" name="description" rows="2" placeholder="wooow.. that's BRIGHT"></textarea>
							</div>
							<div class="form-group">
								<label for="selects">Color</label>
								<select class="form-control" name="color" id="selects">
									<option value="danger" class="bg-danger">Red</option>
									<option value="warning" class="bg-warning">Yellow</option>
									<option value="primary" class="bg-primary">Blue</option>
									<option value="info" class="bg-info">Light-Blue</option>
									<option value="success" class="bg-success">Green</option>
									<option value="dark" class="bg-dark">Dark</option>
									<option value="light" class="bg-light">Light</option>
									<option value="secondary" class="bg-secondary">Light-Gray</option>
								</select>
							</div>
						
						
					</div>
				</div>
				
				
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<input type="submit" name="submit" class="btn btn-primary" value="Create"/>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
    </div>
</div>







