<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$query = 'DELETE FROM users WHERE Eposta = $_POST[eposta]';
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}

//echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';

echo  $result ;
?>