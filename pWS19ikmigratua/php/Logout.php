<?PHP    session_start ();  ?>
<?php
session_destroy();
$URL = "http://localhost:123/pWS19ikmigratua/php/Layout.php;";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
exit();
?>