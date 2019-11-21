/*
 function xmlErakutsi() {
	$.get ("../php/TaulaIkuskatu.php",
   		function(datuak){
  			$("#taula").html(datuak);
	 	});
	}
*/
function galgehitu(){
        // Get form
        var form = $('#galderenF')[0];

		// Create an FormData object 
        var data = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "AddQuestionWithImageAjax.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
			success: function (data) {

                $("#result").text(data);
                console.log("SUCCESS : ", data);
                //xmlErakutsi();
                TaulaIkuskatu();              

            },
            error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
               

            }
		});
}
