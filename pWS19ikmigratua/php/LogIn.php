<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
	<section class="main" id="s1">
		<div align="left">
			<form id="erresgistro" name="erregistro" action="LogIn.php" method="post" enctype="multipart/form-data">
				Eposta(*): <input type="text" id="eposta" name="eposta" size="80"></input><br>
				Pasahitza(*): <input type="password" id="pasahitza" name="pasahitza" size="80"></input>
				<a href="PasahitzaBerreskuratu.php" id="pasber" >Pasahitza ahaztu duzu? </a><br>
				<input type="submit" id="submit" value=" Bidali"></input>
				<input type="reset" id="ezabatu" value=" Ezabatu " onclick="ezabatumezua()"></input><br>
			</form>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<?php	
		
		if(isset($_POST["eposta"])){
			
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
			
			$query = 'SELECT eposta, Pasahitza FROM users';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo ("<p>Errorea: ezin izan da datu basea atzitu</p>");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT eposta, Pasahitza, egoera FROM users') as $row){
					$geteposta = $_POST["eposta"];
					if (!(strcmp($row['eposta'],$geteposta))) {
						$pasen= crypt($_POST['pasahitza'],'iturbeforon');
						if(!(strcmp($row['Pasahitza'],$pasen))){
							if(!(strcmp($row['egoera'],'Onartu'))){
								$_SESSION['eposta'] = $geteposta;
								$URL = "http://localhost:123/pWS19ikmigratua/php/Layout.php;";
								echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
								exit();
							}
							?>
							<script>
								var gaizki = $("<p id='gaizki'>Kontua blokeatua dago.</p>");
								gaizki.appendTo("#s1");
							</script>
				<?php
						}
					}
				}
				?>
				<script>
					var gaizki = $("<p id='gaizki'>Datuak ez dira zuzenak</p>");
					gaizki.appendTo("#s1");
				</script>
				<?php
			}
			
			mysqli_close($konexioa);
				
		}
		
	?>
	
	<script>
		function ezabatumezua(){
			$("#gaizki").remove();
		}
	</script>

	<script type="text/javascript" src="../js/ShowImageInForm.js"></script>
</body>
</html>
