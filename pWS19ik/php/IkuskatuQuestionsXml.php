<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="../js/ValidateFieldsUser.js"></script> 

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  <h3>Hona hemen XMl fitxategitik lortutako galderen tabla</h3>
  <br>
  <br>
  <table style="width:100%">
  <tr>
	<th>Egilea</th>
	<th>Enuntziatua</th>
	<th>Erantzun zuzena</th>
  </tr>
  
  <?php
		$xml=simplexml_load_file("../xml/Questions.xml") or die("Error: Cannot create object");
		
		foreach($xml->children() as $galdera){
		echo "<tr>";
		echo "<td>{$galdera['EGILEA']}</td>";
		echo "<td>{$galdera->GALDERARENTESTUA->p}</td>";
		echo "<td>{$galdera->ZUZENA->value}</td>";
		echo "</tr>";
}
	?>
	</table>
  </section>
  <br>
  <?php include '../html/Footer.html' ?>
</body>
</html>
