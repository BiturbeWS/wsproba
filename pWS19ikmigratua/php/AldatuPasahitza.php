<!DOCTYPE html>
<html id = '123'>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
  <?php include '../php/Menus.php' ?>
  <script src="../js/VerifyMatricula.js"></script>
  <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<body>
  <section class="main" id="s1">
	<form id="galderenF" name="galderenF" action="AldatuPasahitza.php" method="post" >
	
		Eposta(*):
		<?php if(!isset($_GET['eposta'])){
			echo '<input type="text" name="eposta" id="eposta"><br>';
		}else{
			echo '<input type="text" id="eposta" name="eposta" size="80" onchange="VerifyMail();" value='.$_GET["eposta"].' ></input><br>';
		} 
		?>

		<div id= "baietz"></div>
		Pasahitz berria(*): <input type="password" id="pasahitza1" name="pasahitza1" size="80" onchange="VerifyPass();"></input>
		<div id= "baita"></div>
		Pasahitz berria errepikatu(*): <input type="password" id="pasahitza2" name="pasahitza2" size="80"></input><br>
		Sartu kodea(*): 
		<?php if(!isset($_GET['eposta'])){
			echo '<input type="text" id="kodea" name="kodea" size="80"></input><br>';
		}else{
			echo '<input type="text" id="kodea" name="kodea" size="80"  value='.$_GET["kodea"].'></input><br>';
		} 
		?>

		<input type="submit" id="submit" value=" Bidali "></input>
		<input type="reset" id="ezabatu" value=" Ezabatu " onclick="kenduirudia()"></input><br>
	</form>

  <?php
  
	if(isset($_POST["eposta"])){
		if(!(strcmp($_POST["eposta"], $_SESSION["email"]))){
			if(!(strcmp($_POST["kodea"], $_SESSION["kodea"]))){
				if(!(strcmp($_POST["pasahitza1"],$_POST["pasahitza2"]))){
					$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
					$eposta = $_POST['eposta'];
					$pasahitza = $_POST['pasahitza1'];
					$pasen= crypt($pasahitza,'iturbeforon');
					$query = "UPDATE users SET Pasahitza = '$pasen' WHERE Eposta='$eposta'";
					$ema=@mysqli_query($konexioa,$query);
					if(!$ema){
						echo("Errorea: ezin izan da datu basea atzitu edo ez dago mail hori duen erabiltzailearik.");
						exit();
					}else{
						echo "<br>";
						echo "<br>";
						echo "<h3>Pasahitza aldatu da.</h3>";
						unset($_SESSION["email"]);
						unset($_SESSION["kodea"]);
					}
				}else{
					echo "<br>";echo "<br>";
					echo "<h3 style='color: red;'>Pasahitzek berdina izan behar dute.</h3>";
				}
			}else{
				echo "<br>";
				echo "<h3 style='color: red;'>Kodea ez da zuzena.</h3>";
			}
		}else{
			echo "<br>";
			echo "<h3 style='color: red;'>Sartutako email a ez da berreskuratu nahi duenarena.</h3>";
			mysqli_close($konexioa);
		}
	}
  
  ?>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
