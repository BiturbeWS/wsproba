<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <!-- <script src="../js/ValidateFieldsQuestion.js"></script> -->

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  
	<h2>Sartu itzazu hemen galderaren xehetasunak</h2>
    <div>
	<br><br>
	
	<form id="galderenF" name="galderenF" action="AddQuestion.php">
    Galderaren testua:<br>
    <input type="text" name="galderarenTestua" id="galdera"><br>
    Erantzun zuzena:
    <input type="text" name="eZuzena" id="ezuzena"><br>
    Erantzun okerra 1:
    <input type="text" name="eOkerra1" id ="eokerra1"><br>
    Erantzun okerra 2:
    <input type="text" name="eOkerra2"  id ="eokerra2"><br>
    Erantzun okerra 3:
    <input type="text" name="eOkerra3" id ="eokerra3"><br>
	Zailtasuna:
    <select name="zailtasuna" id="zailtasuna">
    <option value="1">Txikia</option>
    <option value="2">Ertaina</option> 
    <option value="3">Handia</option>
    </select><br>
    Galderaren gaia:
    <input type="text" name="gGaia" id="gaia"><br>
	Galdera egilearen eposta:
	<?php if(!isset($_GET["eErabiltzailePosta"])){
			echo '<input type="text" name="eposta" id="eposta"><br>';
		}else{
			echo '<input type="text" name="eposta" id="eposta" value="'.$_GET["eErabiltzailePosta"].'" disabled><br>';
		} 
	?>
	
    <input type="submit" value="Galdera Gehitu" id="gBotoia"/>
    </form>
	
    </div>
  </section>
  <br>
  <?php include '../html/Footer.html' ?>
</body>
</html>
