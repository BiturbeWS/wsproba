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
	
    if (isset($_POST["eposta"]) && isset($_POST["galderarenTestua"]) && isset($_POST["eZuzena"]) && isset($_POST["eOkerra1"]) && isset($_POST["eOkerra2"]) && isset($_POST["eOkerra3"]) && isset($_POST["zailtasuna"]) && isset($_POST["gGaia"])) {
 
      if(preg_match($regex_ikas, $_POST["eposta"]) || preg_match($regex_irakas1,$_POST["eposta"]) || preg_match($regex_irakas2 ,  $_POST["eposta"]) ){

            if(strlen(trim($_POST["galderarenTestua"])) < 10){
                echo "Galderaren testua motza da.";

            }else{

              if(empty($_POST["eZuzena"]) || empty($_POST["eOkerra1"]) || empty($_POST["eOkerra2"]) || empty($_POST["eOkerra3"]) ){
                   echo "Galderaren erantzunak ez daude zehaztuta.";

              }else{
                  if (empty($_POST["gGaia"])) {
                    echo "Gaia ez da zehaztu.";
                  }else{
						$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
              	       
						$izena = $_REQUEST["galderarenTestua"];
					   
						$irudia = $_FILES["fileToUpload"]["name"];
	
						if(!$irudia){
	
							$helburua = "";
	
						} else{

							$non = $_FILES["fileToUpload"]["tmp_name"];

							$helburua = "../images/".$irudia;

							$helburuaAldatu = $helburua;

							$irudiIzena = pathinfo($irudia, PATHINFO_FILENAME);

							$irudiMota = pathinfo($irudia, PATHINFO_EXTENSION);

							$i = 1;

							while(file_exists($helburuaAldatu)){

								$helburuaAldatu = "../images/".$irudiIzena.$i.".".$irudiMota;

								$i = $i + 1;

							}

							$helburua = $helburuaAldatu;

							copy($non, $helburua);

						}
					   
					   
						$sql = "INSERT INTO Questions (galderarenTestua,eZuzena,eOkerra1,eOkerra2,eOkerra3,zailtasuna,gGaia,eposta,argazkia) VALUES ('$_POST[galderarenTestua]' , ' $_POST[eZuzena]', '$_POST[eOkerra1]','$_POST[eOkerra2]','$_POST[eOkerra3]','$_POST[zailtasuna]','$_POST[gGaia]', '$_POST[eposta]','$helburua')";
						$ema = mysqli_query($esteka,$sql);
					   
						if (!$ema) {
							die('Errorea query-a egiterakoan');
						}else{
							echo "Galdera berri bat gehitu da";
						   
						   try {  
								$xml = simplexml_load_file('../xml/Questions.xml');
								$galdera = $xml->addChild('GALDERA');
								$galdera->addAttribute('EGILEA',$_POST["eposta"]);
								$galdera->addAttribute('GAIA',$_POST["gGaia"]);
								$galderentestua = $galdera -> addChild('GALDERATESTUA');
								$galderentestua->addChild('p',$_POST["galderarenTestua"]);
								$erantzunZuzenak = $galdera->addChild('ZUZENA');
								$erantzunZuzenak->addChild('value',$_POST["eZuzena"]);
								$erantzunOkerrak =$galdera->addChild('OKERRAK');
								$erantzunOkerrak->addChild('value',$_POST["eOkerra1"]);
								$erantzunOkerrak->addChild('value',$_POST["eOkerra2"]);
								$erantzunOkerrak->addChild('value',$_POST["eOkerra3"]);
								&galdera->addChild('ARGAZKIA', $helburua);
								echo $galdera;
								$xml->asXML('../xml/Questions.xml');
								echo 'Galdera zuzen txertatu da XML-an';
							}catch (Exception $e) { 
								echo 'Xmlarekin Errorea egon da: '.$e;
							}
					   }
					   
                    }
             }
            }

         
        } else {
        echo "Eposta ez da zuzena.";

        }
   }else{
    echo "Arazoak daude POST mezuekin";
   }

/*
    	$galderarenTestua = $_GET['galderarenTestua'];
    	$eZuzena = $_GET['eZuzena'];
    	$eOkerra1 = $_GET['eOkerra1'];
    	$eOkerra2 = $_GET['eOkerra2'];
    	$eOkerra3 = $_GET['eOkerra3'];
*/
    	?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
