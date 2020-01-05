<?php include '../php/DbConfig.php' ?>
<?PHP    session_start ();  ?>
<?php
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			

	$posta = $_SESSION["eposta"];
	$result = mysqli_query($konexioa, "SELECT puntuak FROM users WHERE Eposta = '$posta'");
	$balioa = mysqli_fetch_row($result);
	$lehengoPuntuak = $balioa[0];
	$gehitupuntu = 5*$_SESSION['asmatuak'];
	$puntutotalak = $lehengoPuntuak + $gehitupuntu;
	mysqli_query($konexioa, "UPDATE users SET puntuak = puntuak + $gehitupuntu WHERE Eposta = '$posta'");
	
	echo "<h1>Emaitza: </h1>";
	echo "<br>";
	echo '<table style="width:100%;">';
	echo '<tr>';
		echo '<th>';
		echo '<h3>Galderak:</h3>';
		echo "<br>";
		echo '</th>';
	echo '</tr>';
	echo '<tr>';
		echo "<td>";
		echo "<h2>".$_SESSION['asmatuak']."/".$_SESSION['galderak']."</h2>";
		echo "<br>";
		echo "</td>";
	echo '</tr>';
	echo '<tr>';
		echo "<td>";
		echo "<h3>Puntuak:</h3>";
		echo "<br>";
		echo "</td>";
	echo '</tr>';
	echo '<tr>';
		echo "<td>";
		echo "<h2>$lehengoPuntuak + $gehitupuntu = $puntutotalak</h2>";
		echo "<br>";
		echo "</td>";
	echo '</tr>';
	echo '</table>';
	echo "<br>";
	echo "<a href=Jolastera.php>Berriz jolastu!</a>";
	
	
	unset($_SESSION['asmatuak']);
	unset($_SESSION['galderak']);
	unset($_SESSION['indizea']);
	
?>