<?php
//nusoap.phpklasea gehitzen dugu
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');

//nusoap_clientmotadun objektua sortzen dugu. http://www.mydomain.com/server.php  
//erabiliko den SOAP zerbitzua non dagoen zehazten url horrek
$soapclient= new nusoap_client('http://localhost:123/pWS19ikmigratua/php/VerifyPassWS.php?wsdl', true);

//Web-Service-n inplementatu dugun funtzioari dei egiten diogu,
// eta itzultzen diguna inprimatzen dugu
if( (isset($_POST['pasahitza'])) && (isset($_POST['ticket'])) ) { 

	$result = $soapclient->call('pasahitzErraza',array( 'x'=>$_POST['pasahitza'],'tick'=>$_POST['ticket']));
}


//echo '<pre>' . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '</pre>';

echo  $result ;
?>