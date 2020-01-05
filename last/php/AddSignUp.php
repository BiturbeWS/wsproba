<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
	<section class="main" id="s1">
		<div>
			<?php
			
			if (!(preg_match("/^[a-zA-Z]{3,}[0-9]{3}@ikasle[.]ehu[.]e[u]{0,1}s$/", $_POST["eposta"]) || preg_match("/^[a-zA-Z]+([.][a-zA-Z]+){0,1}@ehu[.]e[u]{0,1}s$/", $_POST["eposta"]))){
				echo("<p>Zerbitzariak ez du korreo hau onartzen</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
				exit();				
			}
			if(!((@$_POST["mota"]==1)||(@$_POST["mota"]==2))){
				echo("<p>Erabiltzaile mota bat aukeratu behar da</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
				exit();
			}
			if($_POST["mota"]==1){
				if(!(preg_match("/[a-zA-Z]{3,}[0-9]{3}@ikasle[.]ehu[.]e[u]{0,1}s$/", $_POST["eposta"]))){
					echo("<p>Korreoak eta erabiltzaile motak ez dute koinziditzen</p>");
					echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
					exit();
				}
			}
			if($_POST["mota"]==2){
				if(!(preg_match("/[a-zA-Z]+([.][a-zA-Z]+){0,1}@ehu[.]e[u]{0,1}s$/", $_POST["eposta"]))){
					echo("<p>Korreoak eta erabiltzaile motak ez dute koinziditzen</p>");
					echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
					exit();
				}
			}
			if(!(preg_match("/^[a-zA-Z]{2,}( [a-zA-Z]{2,}){1,}$/", $_POST["deiturak"]))){
				echo("<p>Zerbitzariak ez du onartzen 2 hitz baino gutxiagoko deiturarik</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
				exit();
			}
			if (!(preg_match("/.{6,}$/", $_POST["pasahitza1"]))){
				echo("<p>Zerbitzariak ez du onartzen pasahitzak 6 karaktere baino gutxiago edukitzea</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
				exit();
			}
			
			if((strcmp($_POST["pasahitza1"],$_POST["pasahitza2"]))){
				echo("<p>Pasahitzak desberdinak dira</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
				exit();
			}
			
			
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("<p>Errorea: ezin izan da konexioa ezarri</p>");
			
			$query = 'SELECT Eposta FROM users';
			$kon=@mysqli_query($konexioa,$query);
			if(!$kon){
				echo("<p>Errorea: ezin izan da datu basea atzitu</p>");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT eposta FROM users') as $row){
					if (!(strcmp($row['eposta'],$_POST["eposta"]))){
						echo("<p>Korreoa erregistratuta dago</p>");
						echo("<p><a href='SignUp.php'>Saiatu berriro</a></p>");
						exit();
					}		
				}
			}
			
			$izena = $_REQUEST["eposta"];
			$irudia = $_FILES["irudia"]["name"];
			if(!$irudia){
				$helburua = "";
			}
			else{
				$non = $_FILES["irudia"]["tmp_name"];
				$helburua = "../images/".$irudia;
				$helburuaAldatu = $helburua;
				$irudiIzena = pathinfo($irudia, PATHINFO_FILENAME);
				$irudiMota = pathinfo($irudia, PATHINFO_EXTENSION);
				$i = 1;
				while(file_exists($helburuaAldatu)){
					$helburuaAldatu = "../images/".$irudiIzena.$i.".".$irudiMota;
					$i = $i + 1;
				}
				$helburua = $helburuaAldatu;
				copy($non, $helburua);
			}
			
			$pasen= crypt($_POST['pasahitza1'],'iturbeforon');
			
			$sql = "INSERT INTO users (Eposta,ErabiltzaileMota,Deitura,Pasahitza,argazkia,egoera) VALUES
			('$_POST[eposta]' , ' $_POST[mota]', '$_POST[deiturak]','$pasen','$helburua','Onartu')";
              	
			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<p>Errorea: ezin izan da erregistroa bete</p>");
				echo("<p><a href='SignUp.php' id='erreg' >Saiatu berriro</a></p>");
			}
			else{
				echo("<p>Erregistratu zara</p>");
			}
			
			mysqli_close($konexioa);
				
			?>
    </div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>