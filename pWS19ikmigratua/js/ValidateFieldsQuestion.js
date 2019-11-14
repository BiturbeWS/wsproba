function balidatu() {
	var mail = $("#eposta").val();
	if(mail==""){
		alert("Eposta ezin da hutsik egon");
		return false;
	}
	var ikasle = /^[a-zA-Z]{3,}[0-9]{3}@ikasle[.]ehu[.]e[u]{0,1}s$/;
	var irakasle = /^[a-zA-Z]+([.][a-zA-Z]+){0,1}@ehu[.]e[u]{0,1}s$/; 
	var ik = ikasle.test(mail);
	var ir = irakasle.test(mail);
	if (ik == false && ir == false){
		alert("Eposta gaizki idatzita dago");
		return false;
	}
	
	if($("#galdera").val().length < 10){
		alert("Galderak 10 karaktere behar ditu gutxienez");
		return false;
	}
	if($("#zuzena").val()==""){
		alert("Erantzun zuzena ezin da hutsik egon");
		return false;
	}
	if($("#okerra1").val()==""){
		alert("1. erantzun okerra ezin da hutsik egon");
		return false;
	}
	if($("#okerra2").val()==""){
		alert("2. erantzun okerra ezin da hutsik egon");
		return false;
	}
	if($("#okerra3").val()==""){
		alert("3. erantzun okerra ezin da hutsik egon");
		return false;
	}
	if($("#zail1").prop("checked") == false && $("#zail2").prop("checked") == false && $("#zail3").prop("checked") == false){
		alert("Zailtasun bat aukeratu behar da");
		return false;
	}
	if($("#gaia").val()==""){
		alert("Gaia ezin da hutsik egon");
		return false;
	}
	return true;
}