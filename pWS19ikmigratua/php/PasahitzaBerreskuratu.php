<!DOCTYPE html>
<html id = '123'>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/VerifyMatricula.js"></script>
</head>
<?php include '../php/Menus.php' ?>
	<?php	
		if(isset($_SESSION["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}
	?>
<body>
  <section class="main" id="s1">
  	<form id="pasber" name="pasber" method="post" action="PasahitzaBerreskuratu.php">
	Zure mail-a:<br>
    <input type="text" name="eposta" id="eposta" onchange="VerifyMail()"><br>
	<div id= "baietz"></div>
	<br>
	<input type="submit" value="Eskatu aldaketa"/>
	</form>
	<br>
	<br>
	<p>*heltzen den email-a spam-ean egon daiteke.</p>
	
  <?php
  
	if(isset($_POST["eposta"])){
		
		$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
		$eposta = $_POST['eposta'];
		$query = "SELECT Eposta, argazkia FROM users WHERE Eposta='$eposta'";
		$ema=@mysqli_query($konexioa,$query);
		if(!$ema){
			echo("Errorea: ezin izan da datu basea atzitu edo ez dago mail hori duen erabiltzailearik.");
			exit();
		}else{
			$_SESSION['email'] = $_POST['eposta'];
			
			$to_email = $_POST['eposta'];
			$subject = 'Galderak: Pasahitza berreskuratu.';
			$kodea = rand(10000,99999);
			$_SESSION['kodea'] = $kodea;
			$message = "
			<html>
			<h1>Zure pasahitz aldaketa</h>
			<h3>Satu hurrengo linkean eta sartu kdoea pasahitza aldatzeko.</h3>
			<h2><a href='AldatuPasahitza.php?eposta=".$to_email."&kodea=".$kodea."'>Aldatu</a></h2>
			<h3> Kodea: </h3><h1>$kodea</h1>
			</html>
			";
			$headers = 'From: galderaknoreply@gmail.com';
			
			echo "MAIL BAT BIDALI ZAIZU!";
			
			echo $to_email;
			echo $kodea;
			ini_set("SMTP","ssl://smtp.gmail.com");
			ini_set("smtp_port","465");
			ini_set("username","galderaknoreply@gmail.com");  
			ini_set("password","pasahitza");
			ini_set("sendmail_from","galderaknoreply@gmail.com");
			mail($to_email,$subject,$message,$headers);
			//phpinfo();

		}
	}
	 
	
  
  ?>
  
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
