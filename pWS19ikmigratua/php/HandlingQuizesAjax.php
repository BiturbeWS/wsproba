<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <?php include 'DbConfig.php'?>
<script src="../js/ShowQuestionsAjax.js"></script>
<script src="../js/AddQuestionAjax.js"></script>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowImageInForm.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
	<?php	
		if(isset($_GET["eposta"])){
	?>
			<script>erakutsiLogeatuta();</script>
	<?php
		}
	?>
  <section class="main" id="s1">
  	<form id="galderenF" name="galderenF" method="post" enctype="multipart/form-data">
    <div>
	Galderaren testua:<br>
    <input type="text" name="galdera" id="galdera"><br>
    Erantzun zuzena:
    <input type="text" name="zuzena" id="ezuzena"><br>
    Erantzun okerra 1:
    <input type="text" name="okerra1" id ="eokerra1"><br>
    Erantzun okerra 2:
    <input type="text" name="okerra2"  id ="eokerra2"><br>
    Erantzun okerra 3:
    <input type="text" name="okerra3" id ="eokerra3"><br>
	Zailtasuna:
    <select name="zailtasuna" id="zailtasuna">
    <option value="1">Txikia</option>
    <option value="2">Ertaina</option> 
    <option value="3">Handia</option>
    </select><br>
    Galderaren gaia:
    <input type="text" name="gaia" id="gaia"><br>
	Galdera egilearen eposta:
	<?php if(!isset($_GET["eposta"])){
			echo '<input type="text" name="eposta" id="eposta"><br>';
		}else{
			echo '<input type="text" name="eposta" id="eposta" value="'.$_GET["eposta"].'"><br>';
		} 
	?>
	<br>
	Aukeratu zure argazkia:  
	<input type="file" name="fileToUpload" id="fileToUpload" accept="image/png,image/jpg,image/jpeg" onchange="erakutsi(this)"></input>
	<br>
	</form>
    <input type="button" value="Galdera Gehitu eta erakutsi" id="ajaxbut" onclick="galgehitu()"/>
	<br>
	<input type="button" value="Taulan erakutsi" id="gBotoia" onclick="taulaIkuskatu()"/>
	<br>
	
	<div id="taula">
	
	</div>
		
	</table>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
