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
    if (isset($_GET["eErabiltzailePosta"]) && isset($_GET["mota"]) && isset($_GET["eDeitura"]) && isset($_GET["ePass"]) && isset($_GET["ePass2"])) {
 
		if(preg_match($regex_ikas, $_GET["eErabiltzailePosta"]) || preg_match($regex_irakas1,$_GET["eErabiltzailePosta"]) || preg_match($regex_irakas2 ,  $_GET["eErabiltzailePosta"]) ){

            if($_GET["ePass"]!= $_GET["ePass2"]&& (strlen(trim($_GET["ePass"])) > 6 )){
                header("Location: SignUp.php");
            }else{
				$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
              	$sql = "INSERT INTO Users (Eposta,ErabiltzaileMota,Deitura,Pasahitza) VALUES ('$_GET[eErabiltzailePosta]' , ' $_GET[mota]', '$_GET[eDeitura]','$_GET[ePass]')";
              	       $ema = mysqli_query($esteka,$sql);
              	       if (!$ema) {
              	 	       die('Errorea query-a egiterakoan' . msqli_error());
              	       }else{
						   header("Location: Layout.php");
					   }
					   
                }
        } else {
			header("Location: SignUp.php");
		}
    }else{
      header("Location: SignUp.php");
    
    }
	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
