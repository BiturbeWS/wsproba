$(document).ready(function(){

	$("#gBotoia").click(function(){
			var eposta = $("#eErabiltzailePosta").val();
			var mota = $("#mota").val();
			var eDeitura = $("#eDeitura").val();
			var ePass = $("#ePass").val();
			var ePass2 = $("#ePass2").val();
			
			ePass = $.trim(ePass);
			ePass2 = $.trim(ePass2);
			mota = $.trim(mota);
			eDeitura = $.trim(eDeitura);
			eposta = $.trim(eposta);


			
			var regex_ikas = /^[a-z][a-z][a-z]+\d{3}@ikasle\.ehu\.(eus|es)$/
			var regex_irakas1 = /^[a-z][a-z][a-z]+@ehu\.(eus|es)$/
			var regex_irakas2 = /^[a-z][a-z][a-z]+\.[a-z]+@ehu\.(eus|es)$/
		

			if (eposta == "")
			{
			alert("Eposta jartzea derrigorrezkoa da!");
			return false;
			}
			if(eDeitura == "")
			{
			alert("Erabiltzailearen deitura jartzea derrigorrezkoa da.");
			return false;
			}
			if ((ePass == "") || (ePass2 == ""))
			{
			alert("Pasahitza bete egin behar da.");
			return false;
			}
			if(ePass.length < 5){
			alert("Gutxienez sei karakterekoa izan behar du pasahitzak.");
			return false;
			}
			if (eposta.match(regex_ikas) || eposta.match(regex_irakas1) || eposta.match(regex_irakas2))
			{
				return true;
			}else{
				alert("Sartutako mail-a ez da zuzena.");
				return false;
			}
		});
});