$(document).ready(function(){

	$("#gBotoia").click(function(){
			var posta = $("#eposta").val();
			var galdera = $("#galdera").val();
			var ezuzena = $("#ezuzena").val();
			var eokerra1 = $("#eokerra1").val();
			var eokerra2 = $("#eokerra2").val();
			var eokerra3 = $("#eokerra3").val();
			var zailtasuna = $("#zailtasuna").val();
			var gaia = $("#gaia").val();
//			var z_balioa = 0;
			
			galdera = $.trim(galdera);
			ezuzena = $.trim(ezuzena);
			eokerra1 = $.trim(eokerra1);
			eokerra2 = $.trim(eokerra2);
			eokerra3 = $.trim(eokerra3);
			gaia = $.trim(gaia);



			
			var regex_ikas = /^[a-z][a-z][a-z]+\d{3}@ikasle\.ehu\.(eus|es)$/
			var regex_irakas1 = /^[a-z][a-z][a-z]+@ehu\.(eus|es)$/
			var regex_irakas2 = /^[a-z][a-z][a-z]+\.[a-z]+@ehu\.(eus|es)$/
		

			if (posta == "")
			{
			alert("Eposta jartzea derrigorrezkoa da!");
			return false;
			}
			if(galdera.length < 10)
			{
			alert("Galdera egoki bat jarri behar da!");
			return false;
			}
			if(ezuzena == "" || eokerra1 == "" || eokerra2 == "" || eokerra3 == "")
			{
			alert("Erantzun guztiak jartzea derrigorrezkoa da!");
			return false;
			}
			if(gaia == "")
			{
			alert("Gaia jartzea derrigorrezkoa da!");
			return false;
			}


// Test funtzioa erabili da, frogatu daiteke match edo search funtzioekin
			if (Posta.match(regex_ikas) || Posta.match(regex_irakas1) || Posta.match(regex_irakas2))
			{
				return true;
			}else{
				alert("Sartutako mail-a ez da zuzena.");
				return false;
			}
		});
});