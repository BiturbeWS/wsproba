<?php    session_start ();  ?>
<?php
	if(!isset($_SESSION['eposta'])){
		$URL = "http://localhost:123/pWS19ikmigratua/php/Layout.php;";
		echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
		exit();
	}
	?>
<!doctype HTML>
<html> <head>
	<?php
	
	//usleep(500000);
		
		echo "</div>";
		echo "<div>";
		echo "<br>";
		echo "  <h3>Hona hemen XMl fitxategitik lortutako galderen tabla</h3>";
		echo '<table border=1 style="width:100%">';
		echo "<tr>";
		echo "	<th>Egilea</th>";
		echo "	<th>Enuntziatua</th>";
		echo "	<th>Erantzun zuzena</th>";
		echo "</tr>";
	
		$xml=simplexml_load_file("../xml/Questions.xml") or die("Error: Cannot create object");
		
		$countAll=0;
		$countMail=0;
		
		foreach($xml->children() as $galdera){
			echo "<tr>";
			echo "<td>{$galdera['EGILEA']}</td>";
			echo "<td>{$galdera->GALDERARENTESTUA->p}</td>";
			echo "<td>{$galdera->ZUZENA->value}</td>";
			echo "</tr>";
			
			if($galdera['EGILEA'] == $_SESSION['eposta']){
				$countMail++;
			}
			$countAll++;
		}
		
		echo "<br>";
		echo "<b>Zuk eginiko galderak: <u>$countMail</u>/$countAll</b><br>";
		echo "<br>";
		
		
	?>
</nav>
