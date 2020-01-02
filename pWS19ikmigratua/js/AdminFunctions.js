function EzabatuErabiltzailea(){
		
		
		var eposta = document.getElementById("email"+arguments[0]).textContent;
        var data = new FormData();
        data.append('eposta', eposta); 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "RemoveUser.php",
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
		
		
		userIkuskatu();
	
}


function BlokeatuErabiltzailea(){

		var eposta = document.getElementById("email"+arguments[0]).textContent;
        var data = new FormData();
        data.append('eposta', eposta); 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "ChangeState.php",
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
		
		
		
		userIkuskatu();
}


function userIkuskatu() {
			$.ajax({
            type: "GET",
            url: "UserTaula.php",
            cache: true,
            timeout: 600000,
			success: function(datuak){
				$("#usertaula").html(datuak);
			},
            error: function (e) {
                //$("#result").text(e.responseText);
                console.log("ERROR : ", e);
            }
		});
}
		/*
			$.get ({
				url:"UserTaula.php",
				cache:true
			}).then(function(datuak){
				$("#usertaula").html(datuak);
			});
}
*/