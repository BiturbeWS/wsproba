<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
<?php include '../php/Menus.php' ?>
<?php	
		if(isset($_SESSION["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}
	?>
  <section class="main" id="s1">
    <div>

      <h2>EGILEEN DATUAK</h2>
	  <br>
	  <br>
	  <table style="width:100%">
		<tr>
		<th>Deiturak</th>
		<th>Espezialitatea</th> 
		<th>Argazkiak</th>
		<th>Udalherria</th>
	  </tr>
	  <tr>
		<td>Iker Foronda</td>
		<td>Hardware</td> 
		<td><img src="../images/iker_foronda.png" alt="Iker Foronda"></td>
		<td>Gazteiz</td>
	  </tr>
      <tr>
		<td>Beñat Iturbe</td>
		<td>Software</td> 
		<td><img src="../images/benat_iturbe.png" alt="Beñat Iturbe"></td>
		
		<td>Donostia</td>
      </tr>
	  </table>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
