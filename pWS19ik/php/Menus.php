<div id='page-wrap'>
<header class='main' id='h1'>
<?php if(!isset($_GET["eErabiltzailePosta"])){
	echo '<span class="right"><a href="SignUp.php">Erregistratu</a></span><br>';
    echo '<span class="right"><a href="Login.php">Login</a></span>';
}else{
	echo '<span class="right"><a href="Layout.php">Logout</a></span>';
}
?>
</header>
<nav class='main' id='n1' role='navigation'>
<?php if(!isset($_GET["eErabiltzailePosta"])){
	 echo '<span>Etzara oraindik logeatu </span>';
	 echo '<br>';
	 echo '<br>';
	 echo '<span><a href= "Layout.php">Hasiera</a></span>';
	 echo '<span><a href= "Credits.php">Kredituak</a></span>';
}else{
	echo '<span> Zure Erabiltzailea: <br><font color="green">'.$_GET["eErabiltzailePosta"].'</font></span>';
	$pieces = explode("@", $_GET['eErabiltzailePosta']);					
	echo '<img src="../images/'.$pieces[0].'.png" width="50">';
	echo '<br>';
	echo '<br>';
	echo '<span><a href= "Layout.php?'.$_SERVER['QUERY_STRING'].'">Hasiera</a></span>';
	echo '<span><a href= "QuestionFormWithImage.php?'.$_SERVER['QUERY_STRING'].'">Galdera gehitu</a></span>';
	echo '<span><a href= "ShowQuestionsWithImage.php?'.$_SERVER['QUERY_STRING'].'">Galderak</a></span>';
	echo '<span><a href= "Credits.php?'.$_SERVER['QUERY_STRING'].'">Kredituak</a></span>';
	echo'<span><a href="IkuskatuQuestionsXml.php?'.$_SERVER['QUERY_STRING'].'">Ikusi XML galderak</a></span>';
}
?>
</nav>
