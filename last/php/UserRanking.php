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
			$query = 'SELECT * FROM users';
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			
		?>	
		
		<h2>TOP 10 Erabiltzaileak:</h2>
		<br>
			<table border="1" width="100%">
				<tr>
				<thead>
					<th width="150px">Eposta</th>  
					<th width="200px">Deitura</th>    
					<th width="150px">Irudia</th>
					<th width="150px">Puntuak</th>
				</tr>
				</thead>
				<?php
				foreach ($konexioa->query('SELECT * FROM users ORDER BY puntuak DESC LIMIT 10') as $row){  
				
					if(!(strcmp($row['Eposta'],$_SESSION['eposta']))){
						?>
						<tr bgcolor="#008000">
				<?php
					}else{
						?>
						<tr>
				<?php
					}
				?>
					<td><?php echo $row['Eposta']?></td>
					<td><?php echo $row['Deitura']?></td>
					<td><?php echo '<img src="'.$row['argazkia'].'" width="50">'?></td>
					<td><?php echo $row['puntuak']?></td>
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
