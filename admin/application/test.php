<?php
/*echo lcfirst('2');
if (is_numeric('-+2'))
 echo 'ja';
else echo 'nein';*/
require_once '../application/models/DatabaseHandler.php';


//echo DatabaseHandler::getWareTypeForWareTypeByName('Football boots');
//print_r(DatabaseHandler::getAllParentTypesForWareType('Football boots'));
//$wareTypes = DatabaseHandler::getAllWareTypesForWareType('Football boots');
//print_r(DatabaseHandler::getPropertiesNamesForWareTypes($wareTypes));
//add_newAction();
DatabaseHandler::getWares();

function add_newAction() {
    //echo $_GET;
    echo 'begin';
    $wareTypeName = 'Football boots';

    //$json = '[{"property_id":"1","property_name":"Price","$$hashKey":"object:3","property_value":"pp"},{"property_id":"2","property_name":"Ball size","$$hashKey":"object:4","property_value":"bs"},{"property_id":"4","property_name":"Brand","$$hashKey":"object:5","property_value":"br"},{"property_id":"5","property_name":"Model","$$hashKey":"object:6","property_value":"mo"},{"property_id":"6","property_name":"Description","$$hashKey":"object:7","property_value":"de"},{"property_id":"7","property_name":"Color","$$hashKey":"object:8","property_value":"co"},{"property_id":"8","property_name":"Image","$$hashKey":"object:9","property_value":"im"}]';
    $json = '[{"property_id":"1","property_name":"Price","$$hashKey":"object:3","property_value":"199"},{"property_id":"3","property_name":"Shoe size","$$hashKey":"object:4","property_value":"7"},{"property_id":"4","property_name":"Brand","$$hashKey":"object:5","property_value":"adidas"},{"property_id":"5","property_name":"Model","$$hashKey":"object:6","property_value":"neo"},{"property_id":"6","property_name":"Description","$$hashKey":"object:7","property_value":"descr"},{"property_id":"7","property_name":"Color","$$hashKey":"object:8","property_value":"red"},{"property_id":"8","property_name":"Image","$$hashKey":"object:9","property_value":"ima"},{"property_id":"9","property_name":"Ground type","$$hashKey":"object:10","property_value":"AG"}]';
    $properties = json_decode($json);

    DatabaseHandler::saveJSONPropertiesForWareType($wareTypeName, $properties);

    echo 'end';

    //$this->view->generate('PropertiesView.php', 'CommonMarkupView.php');;
}