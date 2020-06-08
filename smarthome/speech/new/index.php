<!DOCTYPE html>

<html>
	<head>
		<title>Speech Recognition</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/vegas.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="icon" href="../../css/favicon.png">
		<!-- MAIN CSS -->
		<link rel="stylesheet" href="css/templatemo-style.css">
	</head>
	
	<body style="background">

		<!-- PRE LOADER -->
		<section class="preloader">
			<div class="spinner">
				<span class="spinner-rotate"></span>
			</div>
		</section>
		
		<div class="menu-bg"></div>
		<div class="menu-burger">☰</div>
		
		<div class="menu-items">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-4 col-sm-6">
						<h1>Settings</h1>
						<ul class="menu">
							<li><a href="#">Voice</a></li>
							<li><a href="#">Voice speed</a></li>
						</ul>
					</div>

					<div class="col-md-offset-2">
						<br><br><br>
						<ul class="menu">
							<li><a href="#">Voice</a></li>
							<li><a href="#">Voice speed</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			
			
			setInterval(function() {
				var currentTime = new Date ( );    
				var currentHours = currentTime.getHours ( );   
				var currentMinutes = currentTime.getMinutes ( );   
				var currentSeconds = currentTime.getSeconds ( );
				currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   
				currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    
				var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    
				currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    
				currentHours = ( currentHours == 0 ) ? 12 : currentHours;    
				
				document.getElementById("timer").innerHTML = currentHours;
				document.getElementById("minutes").innerHTML = currentMinutes;
				document.getElementById("seconds").innerHTML = currentSeconds;
			}, 1000);
			
			
		</script>
		
		
		
		<!-- HOME -->
		<section id="home">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="home-info">
							<h1>Control your home with voice!</h1>
							<span style="color: white;">Speech Recognition</span>
							<!-- You can change the date time in init.js file -->
							<ul class="countdown">
								<li>
									<span class="hours" id="timer"></span>
									<h3>hours</h3>
								</li>
								<li>
									<span class="minutes" id="minutes"></span>
									<h3>minutes</h3>
								</li>
								<li>
									<span class="seconds" id="seconds"></span>
									<h3>seconds</h3>
								</li>     
							</ul>
							<div class="subscribe-form">
								<form method="post">
									<input class="form-control">
									<button type="submit" class="form-control"><i class="fa fa-envelope-o"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- SCRIPTS -->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/vegass.min.js"></script>
		<script src="js/custom.js"></script>

	</body>
</html>