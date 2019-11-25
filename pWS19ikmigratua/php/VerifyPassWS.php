<?php
//nusoap.php klasea gehitzen dugu
require_once('../lib/nusoap.php');
require_once('../lib/class.wsdlcache.php');
//soap_server motako objektua sortzen dugu

$ns="http://localhost:123/pWS19ikmigratua/php/VerifyPassWS.php?wsdl";

$server= new soap_server;
$server->configureWSDL('pasahitzErraza',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
//inplementatunahi dugun funtzioaverregistratzen dugu
//funtzio bat baino gehiago erregistra liteke ...
$server->register('pasahitzErraza',array('x'=>'xsd:string', 'tick' =>'xsd:int'), array('r'=>'xsd:string'),$ns);
//funtzioa inplementatzen da
function pasahitzErraza($pass, $ticket){
if ($ticket != 1010) {
	return "ZERBITZURIK GABE";
}else{
	$good = 1;
	/*
	$fn = fopen("../txt/toppasswords.txt","r");
	  
	  while(! feof($fn))  {
		$cmp = fgets($fn);
	  	if ($cmp == $pass) {
			$good = 0;  		
	  	}
	  }

	  //echo $cmp;

	  fclose($fn);	
	  */
$file_lines = file('../txt/toppasswords.txt');
foreach ($file_lines as $line) {
    if (strpos($line,$pass)) {
			$good = 0;
			break;  		
	  	}
}


	  if ($good == 1) {
		return "BALIOZKOA";
	  }else{
	  	return "BALIOGABEA";
	  }
}
} 
//nusoap klaseko service metodoari dei egiten diogu, behin parametroak prestatuta daudela
if(!isset( $HTTP_RAW_POST_DATA )) {
	$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
}
$server->service($HTTP_RAW_POST_DATA)
?>
