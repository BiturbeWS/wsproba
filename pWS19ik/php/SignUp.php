<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateFieldsUser.js"></script> 

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  
	<h2>Sartu itzazu hemen zure kontuaren xehetasunak</h2>
    <div>
	<br><br>
	<form id="newUserF" name="newUserfF" action="AddUser.php" method="post" enctype="multipart/form-data">
    Eposta:<br>
    <input type="text" name="eErabiltzailePosta" id="eErabiltzailePosta"><br><br>
    Erabiltzaile mota:<br><br>
    <input type="radio" name="mota" value="ikaslea" checked="checked">Ikaslea<br>    
	<input type="radio" name="mota" value="irakaslea">Irakaslea<br>
	<br>
    Deitura:<br>
    <input type="text" name="eDeitura" id ="eDeitura"><br>
    Pasahitza:<br>
    <input type="password" name="ePass"  id ="ePass"><br>
    Pasahitza errepikatu:<br>
    <input type="password" name="ePass2" id ="ePass2"><br>
	
	Irudia:
	<br><input type="file" id="irudia" name="irudia" accept="image/png,image/jpg,image/jpeg" onchange="erakutsi(this)"></input><br>


	<input type="reset" id="ezabatu" value=" Ezabatu " onclick="kenduirudia()"></input><br>
	
	<input type="submit" id="gBotoia" value="Erregistratu"/>
    </form>
	
    </div>
  </section>
  <br>
  <?php include '../html/Footer.html' ?>
  
	<script src="../js/jquery-3.4.1.min.js"></script>
	<script>
		function erakutsi(input) {

			if (input.files[0]) {

				var irakurle = new FileReader();

				kenduirudia();

				irakurle.onload = function (e) {

					var img = $("<img id='irudiberria'>");

					img.attr("src", e.target.result);

					img.attr("height", "50px");

					img.appendTo("#newUserF");  

				}

				irakurle.readAsDataURL(input.files[0]);

			}        

		}
		function kenduirudia(){

			$("#irudiberria").remove();

		}
	</script>
</body>
</html>
