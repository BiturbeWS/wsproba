function EzabatuErabiltzailea(){
		
		var eposta = document.getElementById("email"+arguments[0]).textContent;
        var data = new FormData();
        data.append('eposta', eposta); 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "EzabatuErabiltzailea.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
			success: function (data) {

                console.log("SUCCESS : ", data);
            },
            error: function (e) {
                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
            }
		});
	
}

function BlokeatuErabiltzailea(){

		var eposta = document.getElementById("email"+arguments[0]).textContent;
        var data = new FormData();
        data.append('eposta', eposta); 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "BlokeatuErabiltzailea.php",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
			success: function (data) {

                console.log("SUCCESS : ", data);    

            },
            error: function (e) {
                //$("#result").text(e.responseText);
                console.log("ERROR : ", e);
            }
		});
}

