<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<?php include '../php/DbConfig.php' ?>
	<script src="../js/jquery-3.4.1.min.js"></script>
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
		<div id="usertaula">
		<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$query = "SELECT * FROM users WHERE NOT Eposta = 'admin@ehu.es'";
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
		?>	
		
			<table border="1">
				<tr>
				<thead>
					<th width="150px">Eposta</th>  
					<th width="200px">Mota</th>    
					<th width="150px">Pasahitza</th>
					<th width="150px">Argazkia</th>
					<th width="150px">Egoera</th>
					<th width="150px">Blokeatu</th>
					<th width="150px">Ezabatu</th>
				</tr>
				</thead>
				<?php 
				
				$count = 0;
				foreach ($konexioa->query("SELECT * FROM users WHERE NOT Eposta = 'admin@ehu.es'") as $row){ 
				$eposta = $row['Eposta'];
				?>
				<tr>
					<td><?php echo '<b id= email'.$count.'>'.$row['Eposta'].'</b>'?></td>
					<td><?php echo $row['ErabiltzaileMota']?></td>
					<td><?php echo $row['Pasahitza']?></td>
					<td><?php echo '<img src="'.$row['argazkia'].'" width="50">'?>
					<td><?php echo $row['egoera']?></td>
					<td><?php echo '<button type="button" onclick="BlokeatuErabiltzailea('.$count.')">Blokeatu</button>'?></td>
					<td><?php echo '<button type="button" onclick="EzabatuErabiltzailea('.$count.')">Ezabatu</button>'?></td>
				</tr>
				<?php
				$count = $count + 1;
				}
				
				?>
			
			</table>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
	<script type="text/javascript" src="../js/AdminFunctions.js"></script>
</body>
</html>
