<?php
/*echo lcfirst('2');
if (is_numeric('-+2'))
 echo 'ja';
else echo 'nein';*/
require_once '../application/models/DatabaseHandler.php';

$wares = DatabaseHandler::getAllForWare(8);

print_r($wares);