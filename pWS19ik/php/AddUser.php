<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
  <?php
    $regex_ikas = "/^[a-z][a-z][a-z]+\d{3}@ikasle\.ehu\.(eus|es)$/";
    $regex_irakas1 = "/^[a-z][a-z][a-z]+@ehu\.(eus|es)$/";
    $regex_irakas2 = "/^[a-z][a-z][a-z]+\.[a-z]+@ehu\.(eus|es)$/";
    if (isset($_POST["eErabiltzailePosta"]) && isset($_POST["mota"]) && isset($_POST["eDeitura"]) && isset($_POST["ePass"]) && isset($_POST["ePass2"])) {
 
		if(preg_match($regex_ikas, $_POST["eErabiltzailePosta"]) || preg_match($regex_irakas1,$_POST["eErabiltzailePosta"]) || preg_match($regex_irakas2 ,  $_POST["eErabiltzailePosta"]) ){

            if($_POST["ePass"]!= $_POST["ePass2"]&& (strlen(trim($_POST["ePass"])) > 6 )){
                header("Location: SignUp.php");
            }else{
				$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
				
				$irudia = $_FILES["irudia"]["name"];
				
				if(!$irudia){

					$helburua = "";

				}else{
					
					$non = $_FILES["irudia"]["tmp_name"];
				
					$pieces = explode("@", $_POST['eErabiltzailePosta']);					
				

					$helburua = "../images/".$pieces[0].".png";


					$irudiIzena = pathinfo($irudia, PATHINFO_FILENAME);

					$irudiMota = pathinfo($irudia, PATHINFO_EXTENSION);
	

					copy($non, $helburua);
					
				}
				
              	$sql = "INSERT INTO Users (Eposta,ErabiltzaileMota,Deitura,Pasahitza,argazkia) VALUES ('$_POST[eErabiltzailePosta]' , ' $_POST[mota]', '$_POST[eDeitura]','$_POST[ePass]','$helburua')";
              	$ema = mysqli_query($esteka,$sql);
              	if (!$ema) {
					die('Errorea query-a egiterakoan' . msqli_error());
              	}else{
					echo "<script> alert('Erregistratu egin zara!!'); window.location.href='Layout.php'; </script>";
				}
			}
			
        }else {
			echo "<script> alert('Eposta ez egokia!!'); window.location.href='SignUp.php'; </script>";
		}
    }else{
      echo "<script> alert('Gauzak hutsik daude!!'); window.location.href='SignUp.php'; </script>";
    }
	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
