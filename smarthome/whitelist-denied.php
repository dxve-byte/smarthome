<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>	
		function whiteliston() {
			$(document).ready(function(){
				$('#modal').modal({
						backdrop: 'static'
				});
			});
		}
</script>

<?php


$sql = "SELECT * FROM login";					
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	if($row['username'] == $_SESSION['username']){
		if($row['whitelist'] == 'true'){
			?> <script> whiteliston(); </script> <?php
		}
	}
}

// $usetime = 'true';
// $usereason = 'true';
// $reason = 'bug fixing';
// $time = '15min';

?>
	
	
	<div class="bs-example">
		<div id="modal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Information</h4>
					</div>
					<div class="modal-body">
						<p>You are not whitlisted now. Contact the admin if there are problems.</p>
						<p class="text-warning"><small>Please wait a moment. <?php if(isset($usetime)== true) {if($usetime == 'true'){echo '(Estimated time: ' . $time . ')';}} ?></small></p>
						<?php if(isset($usereason) == true) {if($usereason == 'true'){echo '<p class="text-info"><small><strong>Reason: </strong>'.$reason.'</small></p>';}} ?>
					</div>
					<a href="logout.php" class="btn btn-primary">Logout</a>
				</div>
			</div>
		</div>
	</div>                         