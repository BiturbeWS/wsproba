<?PHP    session_start ();  ?>
<?php

include('GoogleConfig.php');

$login_button = '';
//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error'])){
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();
if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }
    if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
  $Google_Log = 1;
}
}
//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button ='<a href="'.$google_client->createAuthUrl().'"><img src="../images/sign-in-with-google.png" style="height:50px";/></a>';
}

?>
<div id='page-wrap'>
<header class='main' id='h1'>
	<span id="erregspan" class="right"><a href="SignUp.php" id="erreg" >Erregistratu</a></span>
	<span id="logspan" class="right"><a href="LogIn.php" id="log" >Login</a></span>
	<span id="anonimospan" class="right">Anonimoa<img id="irudi" src="../images/anonimoa.png" height="40px"></img></span>
	<?php
   if($login_button == '')
   {
    
    $_SESSION['eposta'] = $_SESSION['user_email_address'];
   }
   else
   {
    echo '<span id="123" class="right">'.$login_button.'</a></span>';
   }
   ?>
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
		
		
		var pasahitzaAldatu = $("<span id='pasahitzaAldatu' class='right'><a href='PasahitzaBerreskuratu.php' id='pasahitzaAldatu'>Pasahitza aldatu</a>&nbsp</span>");
		pasahitzaAldatu.appendTo("#h1"); 
		
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
		
		if(geteposta.trim() == "admin@ehu.es"){
			var handlingAccounts = $("<span id='handlingAccounts'><a href='HandlingAccounts.php' id='handlingAccounts'>Erabiltzaileak</a></span>");
			handlingAccounts.appendTo("#n1"); 
		}else{
			var jolastera = $("<span id='jolastera'><a href='Jolastera.php' id='jolastera'>Goazen jolastera!</a></span>");
			jolastera.appendTo("#n1"); 
			
			var ranking = $("<span id='ranking'><a href='UserRanking.php' id='ranking'>Erabiltzaile Ranking-a</a></span>");
			ranking.appendTo("#n1"); 
			
			var galderakAjax = $("<span id='galderaAjax'><a href='HandlingQuizesAjax.php' id='galderakAjax'>Galderak (Ajax)</a></span>");
			galderakAjax.appendTo("#n1");
			
			var ShowQuestionsWithImages  = $("<span id='ShowQuestionsWithImages '><a href='ShowQuestionsWithImage.php' id='galderakAjax'>ShowQuestionsWithImages</a></span>");
			ShowQuestionsWithImages .appendTo("#n1");
			
		}
		
		var credits = $("<span id='kredituakspan2'><a href='Credits.php' id='kredituak'>Kredituak</a></span>");
		credits.appendTo("#n1"); 
		
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
