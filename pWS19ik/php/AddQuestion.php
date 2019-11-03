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
      if (isset($_GET["eposta"]) && isset($_GET["galderarenTestua"]) && isset($_GET["eZuzena"]) && isset($_GET["eOkerra1"]) && isset($_GET["eOkerra2"]) && isset($_GET["eOkerra3"]) && isset($_GET["zailtasuna"]) && isset($_GET["gGaia"])  ) {
 
      if(preg_match($regex_ikas, $_GET["eposta"]) || preg_match($regex_irakas1,$_GET["eposta"]) || preg_match($regex_irakas2 ,  $_GET["eposta"]) ){

            if(strlen(trim($_GET["galderarenTestua"])) < 10){
                echo "Galderaren testua motza da.";

            }else{

              if(empty($_GET["eZuzena"]) || empty($_GET["eOkerra1"]) || empty($_GET["eOkerra2"]) || empty($_GET["eOkerra3"]) ){
                   echo "Galderaren erantzunak ez daude zehaztuta.";

              }else{
                  if (empty($_GET["gGaia"])) {
                    echo "Gaia ez da zehaztu.";
                  }else{


					   $esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
              	       $sql = "INSERT INTO Questions (  galderarenTestua,eZuzena,eOkerra1,eOkerra2,eOkerra3,zailtasuna,gGaia,eposta) VALUES ('$_GET[galderarenTestua]' , ' $_GET[eZuzena]', '$_GET[eOkerra1]','$_GET[eOkerra2]','$_GET[eOkerra3]','$_GET[zailtasuna]','$_GET[gGaia]', '$_GET[eposta]')";
              	       $ema = mysqli_query($esteka,$sql);
              	       if (!$ema) {
              	 	       die('Errorea query-a egiterakoan' . msqli_error());
              	       }else{
						   echo "Galdera berri bat gehitu da";
						   
						   try {  
								$xml = simplexml_load_file('../xml/Questions.xml');
								$galdera = $xml->addChild('GALDERA');
								$galdera->addAttribute('EGILEA',$_GET["eposta"]);
								$galdera->addAttribute('GAIA',$_GET["gGaia"]);
								$galdera->addChild('GALDERATESTUA',$_GET["galderarenTestua"]);
								$erantzunZuzenak = $galdera->addChild('ZUZENA');
								$erantzunZuzenak->addChild('value',$_GET["eZuzena"]);
								$erantzunOkerrak =$galdera->addChild('OKERRAK');
								$erantzunOkerrak->addChild('value',$_GET["eOkerra1"]);
								$erantzunOkerrak->addChild('value',$_GET["eOkerra2"]);
								$erantzunOkerrak->addChild('value',$_GET["eOkerra3"]);
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
      echo "Arazoak daude GET mezuekin";
    
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
