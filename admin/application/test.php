<?php
/*echo lcfirst('2');
if (is_numeric('-+2'))
 echo 'ja';
else echo 'nein';*/
require_once '../application/models/DatabaseHandler.php';
require_once '../application/models/ShoeSize.php';

/*$categories = (new DatabaseHandler())->getAllCategoriesForCategoryById(7);
$wares = (new DatabaseHandler())->getPropertiesToValuesForItem(54,$categories);
$wares = (new DatabaseHandler())->dele*/
//$wares = (new DatabaseHandler())->getAllCategoriesForCategoryById(7);

//$sizes = (new DatabaseHandler())->getShoeSizes();
//print_r($sizes);

//$sizesString = ShoeSize::getStringFromSizes($sizes);
//print_r($sizesString);

//print_r(ShoeSize::getSizesFromString($sizesString));

print_r(SizeOfItem::getEmptyShoeSizes());
//print_r(SizeOfItem::getEmptyBallSizes());

//print_r($wares);