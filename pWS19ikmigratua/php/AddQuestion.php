<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<?php include '../php/DbConfig.php' ?>
	<section class="main" id="s1">
		<div>
			<?php
		
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			
			$sql = "INSERT INTO questions (Posta, Galdera, ErantzunZuzena, OkerraBat, OkerraBi, OkerraHiru, Zailtasuna, Gaia) VALUES
				  ('$_POST[eposta]' , '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]' , '$_POST[okerra2]' , '$_POST[okerra3]' , '$_POST[zailtasuna]' , '$_POST[gaia]')";

			$ema=@mysqli_query($konexioa,$sql);
			
			if(!$ema){
				echo("<p>Errorea: ezin izan da galdera txertatu</p>");
				echo("<p><a href='QuestionForm.php'>Beste galdera bat egin</a></p>");
			}
			else{
				echo("<p>Galdera gorde da</p>");
				echo("<p><a href='ShowQuestions.php'>Galderak ikusi</a></p>");
			}
			
			mysqli_close($konexioa);
				
			?>
    </div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>
</html>
