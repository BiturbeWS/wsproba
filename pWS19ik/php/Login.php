<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  
	<h2>Sartu zure eposta eta pasahitza</h2>
    <div>
	<br><br>
	<form id="galderenF" name="galderenF" action="LoginKonfirmazioa.php">
    Eposta:<br>
    <input type="text" name="eErabiltzailePosta" id="eErabiltzailePosta"><br><br>
    Pasahitza:<br>
    <input type="password" name="ePass"  id ="ePass"><br>

	<input type="submit" value="Sartu"/>
    </form>
	
    </div>
  </section>
  <br>
  <?php include '../html/Footer.html' ?>
</body>
</html>
