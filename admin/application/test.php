<?php
/*echo lcfirst('2');
if (is_numeric('-+2'))
 echo 'ja';
else echo 'nein';*/
require_once '../application/models/DatabaseHandler.php';

$wares = DatabaseHandler::getWaresOfType(1);

print_r(count($wares));