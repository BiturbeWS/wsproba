var goodPosta = false;
var goodPass = false;


function VerifyMail(){

	
	// Get form
        var mail = $('#eposta').val();
		// Create an FormData object 
        var data = new FormData();
        data.append('eposta', mail); 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "ClientVerifyEnrollment.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
			success: function (data) {

               // $("#result").text(data);
                console.log("SUCCESS : ", data);
                epostaBalioduna(data);       

            },
            error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
               

            }
		});
	
}
function VerifyPass(){

	// Get form
        var pass = $('#pasahitza1').val();
        var ticket = 1010;
		// Create an FormData object 
        var data = new FormData();
        data.append('pasahitza', pass); 
        data.append('ticket', ticket); 

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "ClientVerifyPass.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
			success: function (data) {

               // $("#result").text(data);
                console.log("SUCCESS : ", data);
                passwordBalioduna(data);       

            },
            error: function (e) {

                //$("#result").text(e.responseText);
                console.log("ERROR : ", e);
               

            }
		});
	
}

function passwordBalioduna(check){

	if (check == "BALIOZKOA") {
		$("#pasahitza1").css("background-color", "green");
		$("#pasahitza2").prop('disabled', false);
		$("#baita").html('');
		goodPass = true;
	}else if(check == "BALIOGABEA"){
		$("#pasahitza1").css("background-color", "red");
		$("#pasahitza2").prop('disabled', true);
		$("#submit").prop('disabled', true);
		$("#baita").html('<b>ADI:</b> Pasahitza ez da baliozkoa.');
		$("#baita").css("color","red");
		goodPass = false;
	}else if(check == "ZERBITZURIK GABE"){
		$("#pasahitza1").css("background-color", "yellow");
		$("#pasahitza2").prop('disabled', true);
		$("#submit").prop('disabled', true);
		$("#baita").html('');
		goodPass = false;
	}

goodForm();	

}
function epostaBalioduna(check){

	if (check == "BAI") {
		$("#eposta").css("background-color", "green");
		//$("#submit").prop('disabled', false);
		$("#baietz").html('');
		goodPosta = true;
	}else{
		$("#eposta").css("background-color", "red");
		$("#submit").prop('disabled', true);
		$("#baietz").html('<b>ADI:</b> Etzaude matrikulatua.');
		$("#baietz").css("color","red");
		goodPosta = false;
	}

goodForm();	
}
function goodForm(){
	if(goodPass && goodPosta){
		$("#submit").prop('disabled', false);
	}
	//setTimeout(goodForm, 1000);
}
