<?php include '../php/DbConfig.php' ?>
<?PHP    session_start ();  ?>
<?php
	$indizea = $_POST['id'];
	$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			
	$result = mysqli_query($konexioa, "SELECT eZuzena FROM questions WHERE indizea = $indizea");
	$balioa = mysqli_fetch_row($result);
	
	$emaitza = "HEY!";
	
	if(!isset($_SESSION['galderak'])){
		$_SESSION['galderak'] =0;
		$_SESSION['asmatuak'] = 0;
	}
	
	
	if($balioa[0] == $_POST['erantzuna']){
		$posta = $_SESSION["eposta"];
		mysqli_query($konexioa, "UPDATE users SET puntuak = puntuak + 5 WHERE Eposta = '$posta'");
		echo "Erantzuna zuzena da. 5 puntu irabazi dituzu.";
		$_SESSION['asmatuak'] = $_SESSION['asmatuak'] +1;
	}else{
		echo "Eranztuna ez da zuzena!";
	}
	$_SESSION['galderak'] = $_SESSION['galderak'] +1;
	
	$guztiak = $_SESSION['galderak'];
	$asmatuak = $_SESSION['asmatuak'];
	echo "<br>";
	echo "<br>";
	echo "<h4>Orain arte asmatutakoak: $asmatuak / $guztiak</h4>";
	echo "<br>";
	echo '<input type="button" value=" Amaitu " id="amaitubotoia" onclick="amaituJolasa()"/>';
	echo "<br>";
	
?>