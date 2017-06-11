<?php
/*echo lcfirst('2');
if (is_numeric('-+2'))
 echo 'ja';
else echo 'nein';*/
require_once '../application/models/DatabaseHandler.php';


//echo DatabaseHandler::getWareTypeForWareTypeByName('Football boots');
//print_r(DatabaseHandler::getAllParentTypesForWareType('Football boots'));
$wareTypes = DatabaseHandler::getAllWareTypesForWareType('Football boots');
print_r(DatabaseHandler::getPropertiesNamesForWareTypes($wareTypes));