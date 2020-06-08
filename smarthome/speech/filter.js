
function filter(result) {
				var owner_name = "<?php echo $_SESSION['username']; ?>";
				var ort = "<?php echo json_encode($ort); ?>";
				
				
				result = result.toLowerCase();
				result = result.split(" ");
				

				var searchwords = result;
				console.log(searchwords);
				// Initialize empty array with size equal to size of groups
				var res = Array(groups.length).fill(0);
				// Initialize variables to hold biggest number of matches and index of said matches
				var biggestIndex;
				var biggestValue = 0;

				for(i = 0; i < groups.length; i++) {
					for(j = 0; j < groups[i].words.length; j++) {
						if(searchwords.includes(groups[i].words[j]) == true){
							res[i] += 1;
							if(res[i] > biggestValue){
								biggestValue = res[i];
								biggestIndex = i;
							}
						}
					}
				}

				// biggestIndex holds the index with the most matches
				console.log("The best group is", groups[biggestIndex].name, "group");
				// Res holds the list output you wanted
				console.log(res);
				
				reply(groups[biggestIndex].name, owner_name, ort)
				
}

function reply(res, owner_name, ort) {

	if(res == 'a') {
		res = "Das habe ich für dich gefunden";
	}

	if(res == 'b') {
		var i = Math.floor(Math.random() * 2);
			
		if(i == 0) {
			res = "Hey " + owner_name;
		}if(i == 1) {
			res = "Ein wunderschönen guten Tag " + owner_name;
		}
	}

	if(res == 'c') {
		
		const heute = new Date();
		var h = heute.getHours();
		var m = heute.getMinutes();
		var current_time = h+":"+m; 
		res = "Es ist " + current_time;
	}

	if(res == 'd') {
		res = "Das Wetter in " + ort + " wird";
	}

	if(res == 'e') {
		var i = Math.floor(Math.random() * 2);
			
		if(i == 0) {
			res = "Mir gehts gut";
		}if(i == 1) {
			res = "Es könnte mir nicht besser gehen";
		}if(i == 3) {
			res = "Mir gehts Super";
		}
	}

	if(res == 'f') {
		if(voice == "male") {
			res = "Mein Name ist " + robotname + " und ich bin dein persönlicher Assistent für Sprachsteuerung";
		}else{
			res = "Ich heiße " + robotname + " und ich bin deine persönliche Assistentin für Sprachsteuerung";
		}
	}

	if(res == 'g') {
		var i = Math.floor(Math.random() * 2);
			
		if(i == 0) {
			res = "Das ist aber nicht nett von dir";
		}if(i == 1) {
			res = "Ich versuche mich zu verbessern";
		}
	}

	if(res == 'h') {
		res = "Ruhemodus eingeschaltet. Ich bin jetzt leise";
	}

	if(res == 'i') {
		res = "Ruhemodus ausgeschaltet. Ich bin jetzt wieder für dich da";
	}

	if(res == 'j') {
		res = "Ich bin deine Sprachsteuerung, ich kann für dich das wetter ansagen, oder du kannst mich nach der Zeit fragen. Wenn du magst kannst du mich auch beleidigen und wenn dir langweilig wird, können wir über deinen Tag reden.";
	}

	if(res == 'k') {
		res = "Befehle werden nur noch Manuell gesteuert.";
	}

	if(res == 'l') {
		var i = Math.floor(Math.random() * 3);
		res = "Die Zahl " + i ;
	}

	if(res == 'm') {
		res = "Ich höre dir jetzt zu";
		//nimm auf speicher ab
	}

	if(res == 'n') {
		res = "Deine Letzte Notiz wird abgespielt";
		//spiel notizen ab
	}

	if(res == 'o') {
		var i = Math.floor(Math.random() * 2);
		
		if(i == 0) {
			res = "Kopf";
		}if(i == 1) {
			res = "Zahl";
		}	
	}

	if(res == 'p') {
		res = "Schade noch eine runde, bitte";
	}
	
	if(res == 'q') {
		res = "Yippi";
	}
	
	if(res == 'r') {
		const heute = new Date();
		var y = heute.getYear();
		var m = heute.getMonth();
		var d = heute.getDay();
		var date = heute.getDate();
		var current_time = h+":"+m;

		res = "Heute ist der " + date;
	}
	
	if(res == 's') {
		res = "Ich bin 2020 geboren und bin 1 Jahr alt";
	}

	if(res == 't') {
		res = "Ich bin am 21.2.2020 von dave programmiert worden und in Neuhausen/Erzgebirge entwickelt.";
	}

	if(res == 'u') {
		res = "Wie viel Uhr?";
		// wecker
		
	}

	if(res == 'v') {
		res = "Okay";
		//Licht an
	}

	if(res == 'w') {
		if(voice == "male") {
			vocie = "female";
		}else{
			voice = "male";
		}
		res = "Okay, Stimme geändert";
		
	}

	if(res == 'x') {
		res = "Okay";
		// Licht an
	}

	if(res == 'z') {
		res = "Okay";
		// Licht aus
	}
	
	speechres(res, "male");
}