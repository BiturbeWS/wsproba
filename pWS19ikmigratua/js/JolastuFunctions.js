function zuzenduEtaAurrera(){
	
	var erantzuna = $('input[name="erantzuna"]:checked').val();;
    var data = new FormData();
    data.append('erantzuna', erantzuna); 
	data.append('id',arguments[0]);
    $.ajax({
		type: "POST",
        enctype: 'multipart/form-data',
        url: "JolasaErantzuna.php",
		data: data,
		processData: false,
		contentType: false,
        cache: false,
        timeout: 600000,
		success: function (data) {
            console.log("SUCCESS : ", data);
			$("#erantzunAjax").hide();
			document.getElementById("hurrengoa").style.visibility='visible';
			$("#emaitza").html(data);
			if(arguments[1] == arguments[2]){
				amaituJolasa();
			}
        },
        error: function (e) {
		$("#result").text(e.responseText);
		console.log("ERROR : ", e);
        }
	});
}

	function amaituJolasa(){
	var data = new FormData();
    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
		url: "JolasaAmaitu.php",
		data: data,
		processData: false,
		contentType: false,
		cache: false,
		timeout: 600000,
		success: function (data) {
			console.log("SUCCESS : ", data);
			$("#jokoatable").hide();
			$("#amaitubotoia").hide();
			$("#emaitza").hide();
			$("#azkendiv").hide();
			$("#prediv").html(data);
        },
		error: function (e) {
			$("#result").text(e.responseText);
			console.log("ERROR : ", e);
		}
	});
}
