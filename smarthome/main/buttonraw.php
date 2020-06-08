<div id="buttons">
	<div class="row">
		<div class="col-xl-12">
			<div class="card mb-4">
				<div class="card-header">
					Easy-Button's
				</div>
															
				<div class="grid">
												
					<?php 
														
						$q = "SELECT * FROM panel ORDER BY `panel`.`inorder` ASC";
						$result = mysqli_query($con, $q);
						while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
														
							if($row['owner'] == $_SESSION['username']) {								
								$header = "'" . $row['header'] . "'";
								$action = "'" . $row['action'] . "'";
																
								echo '<div id="long" class="item">
									<a onclick="button('.$header.', '.$action.') ">
										<div class="card bg-'.$row['color'].'" style="width-min: 18rem; cursor: pointer;">
											<div class="card-body">
												<h5 class="card-title">'.$row['header'].'</h5>
													<p class="card-text">'.$row['body'].'</p>
												</div>
											</div>
										</a>
									</div>';
							}
						}
					
					?>
					
					
					
				</div>
			</div>
		</div>
	</div>
</div>