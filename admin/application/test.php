<?php
/*echo lcfirst('2');
if (is_numeric('-+2'))
 echo 'ja';
else echo 'nein';*/
require_once '../application/models/DatabaseHandler.php';

$wareTypes = DatabaseHandler::getSuccessorWareTypesIds(12);

print_r($wareTypes);