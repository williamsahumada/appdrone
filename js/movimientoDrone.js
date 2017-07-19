var derechaActual = "E";

function moverDrone(poximoSentido,idAct){
	
	if(poximoSentido == "D" || poximoSentido == "I"){
	    if(derechaActual == "E" && poximoSentido == "D"){
	        derechaActual = "S";
	        return derechaActual;
	          //Avanza restando Top
	    } else if(derechaActual == "E" && poximoSentido == "I") {
	        derechaActual = "N";
	          //Avanza sumando Top
	          return derechaActual;
	    }

	    if(derechaActual == "N" && poximoSentido == "D"){
	        derechaActual = "E";
	          //Avanza restando Top
	          return derechaActual;
	    } else if(derechaActual == "N" && poximoSentido == "I") {
	        derechaActual = "O";
	          //Avanza sumando Top
	          return derechaActual;
	    }
	    if(derechaActual == "O" && poximoSentido == "D"){
	         derechaActual = "N";//Adelante 
	         //Avanza sumando LEFT
	    } else if(derechaActual == "O" && poximoSentido == "I") {
	         derechaActual = "S";
	          //Avanza restando LEFT
	          return derechaActual;
	    }
	    if(derechaActual == "S" && poximoSentido == "D"){
	         derechaActual = "O";//Adelante 
	         //Avanza sumando LEFT
	         return derechaActual;
	    } else if(derechaActual == "S" && poximoSentido == "I") {
	         derechaActual = "E";
	          //Avanza restando LEFT
	          return derechaActual;
	    }
	} else {
		//Solo avanza
		if(derechaActual == "N"){
	      //Avanza restando LEFT
	        var lefAct = parseInt(jQuery(".drone").css("left").substring(0,3));
			var leftNew = parseInt(jQuery(".drone").css("left").substring(0,3)) - 13;
			jQuery(".drone").animate({"left": "-=13px"},"slow", function() {
				    // Animation complete.
				    leftWindow = jQuery(".drone").css("left");
				    //console.log("left -> " + jQuery(".drone").css("left"));
				    //$("#"+idAct).css("left",leftWindow);
				  });
	    } else if(derechaActual == "O") {
	      //Avanza sumando Top
	        var topAct = parseInt(jQuery(".drone").css("top").substring(0,3));
			var toptNew = topAct + 13;
			jQuery(".drone").animate({"top": "+=13px"},"slow",  function() {
			    // Animation complete.
			    topWindow = jQuery(".drone").css("top");
			    //$("#"+idAct).css("top",topWindow);
			    //console.log("top -> " + jQuery(".drone").css("top"));
			  });
	    }
	    if(derechaActual == "S"){
	    	var lefAct = parseInt(jQuery(".drone").css("left").substring(0,3));
			var leftNew = parseInt(jQuery(".drone").css("left").substring(0,3)) + 13;
			//Avanza sumando LEFT
			jQuery(".drone").animate({"left": "+=13px"},"slow", function() {
			    leftWindow = jQuery(".drone").css("left");
			    //("#"+idAct).css("left",leftWindow);
			    //console.log("left -> " + jQuery(".drone").css("left"));
			  });
	    } else if(derechaActual == "E") {
	      //Avanza restando Top
			var topAct = parseInt(jQuery(".drone").css("top").substring(0,3));
			var toptNew = parseInt(jQuery(".drone").css("top").substring(0,3)) - 13;
			jQuery(".drone").animate({"top": "-=13px"},"slow", function() {
			    // Animation complete.
			    topWindow = jQuery(".drone").css("top");
			    //$("#"+idAct).css("top",topWindow);
			    //console.log("top -> " + jQuery(".drone").css("top"));
			  });
	    }
	}
}