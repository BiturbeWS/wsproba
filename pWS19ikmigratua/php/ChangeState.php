<?php include '../php/DbConfig.php' ?>
<?php
			$eposta = $_POST['eposta'];
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			
			$query = "SELECT * FROM users WHERE eposta = '$eposta'";
			$ema = @mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			
			foreach ($konexioa->query("SELECT * FROM users WHERE eposta = '$eposta'") as $row){ 
				$egoera = $row['egoera'];
			}
			
			
			if($egoera == 'Onartu'){
				$query2 = "UPDATE users SET egoera = 'Blokeatu' WHERE eposta = '$eposta'" ;
			}else{
				$query2 = "UPDATE users SET egoera = 'Onartu' WHERE eposta = '$eposta'" ;
			}
			$ema2 = @mysqli_query($konexioa,$query2);
			if(!$ema2){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			
			
	$result = "".$egoera." egoera ".$_POST['eposta']." ri aldatu zaio.";
	echo $result;

?>