<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<?php include '../php/DbConfig.php' ?>
	<style>
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php	
		if(isset($_SESSION["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}else{
			$URL = "http://localhost:123/pWS19ikmigratua/php/Layout.php;";
			echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
			exit();
		}
	?>
	<section class="main" id="s1">
		<div>
		<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$query = 'SELECT * FROM questions';
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			
		?>	
			<table border="1">
				<tr>
				<thead>
					<th width="150px">Identifikazioa</th>  
					<th width="200px">Posta</th>    
					<th width="150px">Galdera</th>
					<th width="150px">Zuzena</th>
					<th width="150px">Okerra1</th>
					<th width="150px">Zailtasuna</th>
					<th width="150px">Gaia</th>
					<th width="150px">Irudia</th>
				</tr>
				</thead>
				<?php foreach ($konexioa->query('SELECT * FROM questions') as $row){  ?>
				<tr>
					<td><?php echo $row['indizea']?></td>
					<td><?php echo $row['eposta']?></td>
					<td><?php echo $row['galderarenTestua']?></td>
					<td><?php echo $row['eZuzena']?></td>
					<td><?php echo $row['eOkerra1']?></td>
					<td><?php echo $row['zailtasuna']?></td>
					<td><?php echo $row['gGaia']?></td>
					<td><?php echo '<img src="'.$row['argazkia'].'" width="50">'?></td>
				</tr>
				<?php
				}
				?>
				
			</table>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>
