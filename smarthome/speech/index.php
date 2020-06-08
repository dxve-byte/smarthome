<?php session_start();
	include('../config.php');
    if(isset($_SESSION['username'])) {
		
    }else{
	    header('location:' . $loginlink) ;
    }
	
?>

<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<script src="https://code.responsivevoice.org/responsivevoice.js?key=mBhcknb7"></script>
	<script src="https://code.responsivevoice.org/responsivevoice.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="lists.js"></script>
	<script src="filter.js"></script>
</head>

<!-- onload="func();" -->
<body onload="recognition.start()">
<span id='message'></span>



<script>

		function func() {
			recognition.start();
		}

        var message = document.querySelector('#message');

        var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
        var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

        var grammar = '#JSGF V1.0;'

        var recognition = new SpeechRecognition();
        var speechRecognitionList = new SpeechGrammarList();
        speechRecognitionList.addFromString(grammar, 1);
        recognition.grammars = speechRecognitionList;
        recognition.lang = 'de-DE';
        recognition.interimResults = false;
		

        recognition.onresult = function(event) {
			//recognition.stop();
            var last = event.results.length - 1;
            var command = event.results[last][0].transcript;
			var robotname = "ok Google";
			
			
			message.textContent = 'res: ' + command;
			filter(command)
			console.log("accapted");
			recognition.stop();
			
			// if(command.includes(robotname) == true) {
				
				
			// }else{
				// console.log("location.reload();");
				
			// }
		}
		
		
		<?php $ort = "Neuhausen"; ?>
		
		
		function speechres(result, voice) {
			recognition.stop();
			setTimeout(function() {
			
				if(voice == "male") {
					responsiveVoice.speak(result, "Deutsch Male", {rate: 0.9});
					isplay()
				} else {
					responsiveVoice.speak(result, "Deutsch Female", {rate: 0.9});
					isplay()
				}
			}, 1000);
			
		}
		
		function isplay() {
			var isp = "true";
			if(isp == "true") {
				setTimeout(function() {
					if(responsiveVoice.isPlaying()) {
						isplay()
					}else{
						recognition.start()
						isp = "false";
					}
				}, 1000);
			}
		}
		
		
        recognition.onspeechend = function() {
            recognition.stop();
        };
		
		recognition.onerror = function(event) {
			console.log('#Error type: ' + event.error);
			if(event.error == 'no-speech') {
				setTimeout(function() { 
					recognition.start();
					console.log('start new');
				}, 200);
			}
		}
		
		recognition.onspeechend = function() {
			recognition.stop();
			console.log('No result.');
		}
		

</script>
</body>
</html>

<?php include('template.html'); ?>