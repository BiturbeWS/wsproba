function erakutsi(input) {
	if (input.files[0]) {
		var irakurle = new FileReader();
		kenduirudia();
		irakurle.onload = function (e) {
			var img = $("<img id='irudiberria'>");
			img.attr("src", e.target.result);
			img.attr("height", "50px");
			img.appendTo("#galderenF");  
        }
		irakurle.readAsDataURL(input.files[0]);
	}        
}
	
function kenduirudia(){
	$("#irudiberria").remove();
}