<?php

if(isset($_POST['submit']) == true) {
	$title = $_POST['title'];
	$info = $_POST['info'];
	
	if($title != '') {
		$q = "INSERT INTO `todolist`(`id`,`username`,`title`,`information`)VALUES('id','".$_SESSION['username']."', '".$title."','".$info."')";
		if(mysqli_query($con, $q)){
			?> <script> clear(); </script> <?php
		}else{
			echo $dberrormes ;
		}
	}
}

?>

<script>
	function clear() {
		document.getElementById("title").value = "";
	} 
</script>

<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid">
			<h1 class="mt-4">ToDoList</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">To-Do-List</li>
			</ol>
			
			<div class="row">
				<div class="col-xl-6">
					<div class="card mb-4">
						<div class="card-header">
							<i class="fas fa-tasks mr-1"></i>
								To Do List
						</div>
						<div class="card-body">
							<form method="post">
								<div class="todo-header">
									<input type="text" name="title" id="title" placeholder="Title..."/><br><br>
									<textarea type="text" name="info" placeholder="Details..."></textarea>
									<button class="btnadd" name="submit" style="border-radius: 50px;"><i class='fas fa-plus'></i></button>
								</div>
							</form>
								<table id="customers">
									<tr>
										<th>Title</th>
										<th>Information</th>
										<th>Actions</th>
									</tr>
								<?php
									#Add new:
									$sql = "SELECT * FROM todolist";					
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
										if($row['username'] == $_SESSION['username']){
											echo '<tr>
													<td>'.$row['title'].'</td>
													<td>'.$row['information'].'</td>
													<td><a href="index.php?p=todo&del='.$row['title'].'"><i id="icon" class="fas fa-trash-alt"></a></i></td>
												  </tr>';
										}
									}
									echo '</table>';
									#delete:
									if(isset($_GET['del']) == true) {
										$sql = "DELETE FROM todolist WHERE `username` = '".$_SESSION['username']."' AND `title` = '".$_GET['del']."'";
										if(mysqli_query($con, $sql)){
											?> <script> location.href="index.php?p=todo"; </script> <?php
										}else{
											echo $dberrormes ;
										}
									}
								?>
						</div>
					</div>
				</div>
				
				
				
				
				
			</div>
		</div>
	</main>
</div>


<style>

.btnadd {
	border-radius: 50px;
	background-color: DodgerBlue;
	padding: 6px 7px;
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
