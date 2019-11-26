<?php include '../php/DbConfig.php' ?>
<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$egoera = 'Blokeatu';
			$eposta = $_POST['eposta'];
			$query = 'UPDATE users SET egoera = ".$egoera." WHERE eposta = ".$eposta." ';
			$ema = @mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
	$result = "Blokeatu egoera ".$_POST['eposta']." ri aldatu zaio.";
	echo $result;
?>