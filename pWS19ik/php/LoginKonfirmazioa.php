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
		
		if((strcmp($_GET["eErabiltzailePosta"],"")>0) && (strcmp($_GET["ePass"],"")>0)){
			$eposta = $_GET['eErabiltzailePosta'];
			$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
			$sql = "SELECT Pasahitza FROM Users WHERE Eposta = '$eposta'";
			
			$ema = mysqli_query($esteka ,$sql);
			$pass = mysqli_fetch_assoc($ema);
			if($pass['Pasahitza'] == $_GET['ePass']){
				header('Location: Layout.php?eErabiltzailePosta='.$_GET[eErabiltzailePosta]);
			}else{
				echo "<script> alert('Eposta edo Pasahitza ez da zuzena.'); window.location.href='Login.php'; </script>";
			}
		}else{
			echo "<script> alert('Eposta edota pasahitza falta da.'); window.location.href='Login.php'; </script>";
		}
	?>
  </section>
  <br>
  <?php include '../html/Footer.html' ?>
</body>
</html>
