<?php include '../php/DbConfig.php' ?>
<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$eposta = $_POST['eposta'];
			$query = "DELETE FROM users WHERE Eposta = '$eposta' ";
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}

	$result = "".$_POST['eposta']." borratua izan da.";
	echo  $result ;
?>