<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	
	<?php	
		if(isset($_GET["eposta"])){
			echo '<script>erakutsiLogeatuta();</script>';
		}
	?>
	
	<section class="main" id="s1">
    <div>
		<h2>Quiz: galderen jokoa</h2>
    </div>
	</section>
	
	<?php include '../html/Footer.html' ?>
  
	<script src="../js/jquery-3.4.1.min.js"></script>

</body>
</html>
