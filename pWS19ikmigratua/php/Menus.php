<?PHP    session_start ();  ?>
<div id='page-wrap'>
<header class='main' id='h1'>
	<span id="erregspan" class="right"><a href="SignUp.php" id="erreg" >Erregistratu</a></span>
	<span id="logspan" class="right"><a href="LogIn.php" id="log" >Login</a></span>
	<span id="anonimospan" class="right">Anonimoa<img id="irudi" src="../images/anonimoa.png" height="40px"></img></span>
</header>
<nav class='main' id='n1' role='navigation'>
	<span id="hasieraspan"><a href='Layout.php' id="hasiera">Hasiera</a></span>
	<span id="kredituakspan"><a href='Credits.php' id="kredituak">Kredituak</a></span>
</nav>

	<?php include '../php/DbConfig.php' ?>

	<script src="../js/jquery-3.4.1.min.js"></script>


	<script>
	function erakutsiLogeatuta(){
		var geteposta = "<?php echo $_SESSION['eposta']; ?>"
		
		$("#erregspan").remove();
		$("#logspan").remove();
		$("#anonimospan").remove();
		$("#hasieraspan").remove();
		$("#kredituakspan").remove();
		
		var logout = $("<span id='logoutspan' class='right'><a href='Logout.php' id='logout'>Logout</a>&nbsp</span>");
		logout.appendTo("#h1"); 
		var layout = $("<span id='hasieraspan'><a href='Layout.php' id='hasiera' >Hasiera</a></span>");
		layout.appendTo("#n1"); 
		/*
		var gArgazki = $("<br><span id='galderakArgazkispan'><a href='QuestionFormWithImage.php?eposta="+geteposta+"' id='galderakArgazki'>Galderak gehitu</a></span>");
		gArgazki.appendTo("#n1");
		var gIkusi = $("<br><span id='galderakIkusispan'><a href='ShowQuestionsWithImage.php?eposta="+geteposta+"' id='galderakIkusi'>Galderak ikusi</a></span>");
		gIkusi.appendTo("#n1");
		var galderaXML = $("<span id='galderaXML'><a href='QuestionsXMLShow.php?eposta="+geteposta+"' id='gaderaXML'>GALDERAK XML</a></span>");
		galderaXML.appendTo("#n1"); 
		*/
		var credits = $("<span id='kredituakspan2'><a href='Credits.php' id='kredituak'>Kredituak</a></span>");
		credits.appendTo("#n1"); 
		
		if(geteposta.trim() == "admin@ehu.es"){
			var handlingAccounts = $("<span id='handlingAccounts'><a href='HandlingAccounts.php' id='handlingAccounts'>Erabiltzaileak</a></span>");
			handlingAccounts.appendTo("#n1"); 
		}else{
			var galderakAjax = $("<span id='galderaAjax'><a href='HandlingQuizesAjax.php' id='galderakAjax'>GALDERAK AJAX</a></span>");
			galderakAjax.appendTo("#n1"); 
		}
		
		var erabiltzaile = $("<span id='erabiltzaile' class='right'>"+ geteposta +"&nbsp</span>");
		erabiltzaile.appendTo("#logoutspan");
		
		
		<?php
			$konexioa = @mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea: ezin izan da konexioa ezarri");
			$query = 'SELECT Eposta, argazkia FROM users';
			$ema=@mysqli_query($konexioa,$query);
			if(!$ema){
				echo("Errorea: ezin izan da datu basea atzitu");
				exit();
			}
			else{
				foreach ($konexioa->query('SELECT Eposta, argazkia FROM users') as $row){
					if (!(strcmp($row['Eposta'],$_SESSION['eposta']))){
						?>
						var irudi = $("<span id='irudi' class='right'><img src='<?php echo($row['argazkia']) ?>' height='40px'></img></span>");
						irudi.appendTo("#erabiltzaile");
						<?php
						break;
					}
				}
			}
			mysqli_close($konexioa);
		?>
		
		return true;
	}
	
  </script>
