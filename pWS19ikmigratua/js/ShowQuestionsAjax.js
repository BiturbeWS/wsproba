
xhro = new XMLHttpRequest();

xhro.onreadystatechange = function(){ //alert(xhro.readyState);

	if (xhro.readyState==4) { // && (xhttp.status == 200
		document.getElementById("taula").innerHTML= xhro.responseText;
	} 
} 
			
function taulaIkuskatu(){
	xhro.open("GET","../php/TaulaIkuskatu.php", true); 
	xhro.send(); 
}