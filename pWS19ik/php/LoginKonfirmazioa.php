<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php' ?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  
	<?php
		$eposta = $_GET['eErabiltzailePosta'];
		$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
		$sql = "SELECT Pasahitza FROM Users WHERE Eposta = '$eposta'";
		echo $eposta;
		
		$ema = mysqli_query($esteka ,$sql);
		$pass = mysqli_fetch_assoc($ema);
		if($pass['Pasahitza'] == $_GET['ePass']){
			header('Location: Layout.php?'.$_SERVER['QUERY_STRING']);
		}else{
			header('Location: Login.php');
		}
	?>
  </section>
  <br>
  <?php include '../html/Footer.html' ?>
</body>
</html>
