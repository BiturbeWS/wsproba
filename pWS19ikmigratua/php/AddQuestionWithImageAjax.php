<?php include '../php/DbConfig.php' ?>
<?php session_start ();?>
<?php
	if(!isset($_SESSION['eposta'])){
		$URL = "http://localhost:123/pWS19ikmigratua/php/Layout.php;";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit();
	}
	?>

<?php
			
			if (!(preg_match("/^[a-zA-Z]{3,}[0-9]{3}@ikasle[.]ehu[.]e[u]{0,1}s$/", $_POST["eposta"]) || preg_match("/^[a-zA-Z]+([.][a-zA-Z]+){0,1}@ehu[.]e[u]{0,1}s$/", $_POST["eposta"]))){
				echo("Zerbitzariak ez du korreoa onartzen <br>"); 
			}
			else if(!(preg_match("/^.{10,}$/", $_POST["galdera"]))){
				echo ("Zerbitzariak ez du onartzen 10 karaktere baino gutxiagoko galderarik");
			}
			else if(!(strcmp($_POST["zuzena"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun zuzena hutsa egotea");
			}
			else if(!(strcmp($_POST["okerra1"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun okerrak hutsik egotea");
			}
			else if(!(strcmp($_POST["okerra2"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun okerrak hutsik egotea");
			}
			else if(!(strcmp($_POST["okerra3"],""))){
				echo ("Zerbitzariak ez du onartzen erantzun okerrak hutsik egotea");
			}
			else if(!((@$_POST["zailtasuna"]==1)||(@$_POST["zailtasuna"]==2) || (@$_POST["zailtasuna"]==3))){
				echo ("Zerbitzariak ez du onartzen zailtasuna hutsa egotea");
			}
			else if(!(strcmp($_POST["gaia"],""))){
				echo ("Zerbitzariak ez du onartzen gaia hutsa egotea");
			}else{
				
		
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			
			$izena = $_REQUEST["galdera"];
			$irudia = $_FILES["fileToUpload"]["name"];
			if(!$irudia){
				$helburua = "";
			}
			else{
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
			
			$sql = "INSERT INTO Questions (galderarenTestua,eZuzena,eOkerra1,eOkerra2,eOkerra3,zailtasuna,gGaia,eposta,argazkia) 
			VALUES ('$_POST[galdera]' , ' $_POST[zuzena]', '$_POST[okerra1]','$_POST[okerra2]','$_POST[okerra3]','$_POST[zailtasuna]','$_POST[gaia]', '$_POST[eposta]','$helburua')";
						

			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<p>Errorea: ezin izan da galdera txertatu</p>");
			}
			else{
				echo("<p>Galdera gorde da</p>");
				 try {  
								$xml = simplexml_load_file('../xml/Questions.xml');
								$galdera = $xml->addChild('GALDERA');
								$galdera->addAttribute('EGILEA',$_POST["eposta"]);
								$galdera->addAttribute('GAIA',$_POST["gaia"]);
								$galderentestua = $galdera -> addChild('GALDERARENTESTUA');
								$galderentestua->addChild('p',$_POST["galdera"]);
								$erantzunZuzenak = $galdera->addChild('ZUZENA');
								$erantzunZuzenak->addChild('value',$_POST["zuzena"]);
								$erantzunOkerrak =$galdera->addChild('OKERRAK');
								$erantzunOkerrak->addChild('value',$_POST["okerra1"]);
								$erantzunOkerrak->addChild('value',$_POST["okerra2"]);
								$erantzunOkerrak->addChild('value',$_POST["okerra3"]);
								$galdera->addChild('ARGAZKIA', $helburua);
								echo $galdera;
								$xml->asXML('../xml/Questions.xml');
								echo 'Galdera zuzen txertatu da XML-an';
							}catch (Exception $e) { 
								echo 'Xmlarekin Errorea egon da: '.$e;
							}
			}
			
			mysqli_close($konexioa);
			}	
?>