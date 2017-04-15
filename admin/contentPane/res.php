<?php
/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

require_once "../../model/DatabaseHandler.php";
require_once "../../model/BootsPair.php";

//echo $_SERVER['REQUEST_URI'];

$request = $_SERVER['REQUEST_URI'];

$requestArray = explode("=", $request);

$param = $requestArray[1];

if (!strcmp($param, "football_boots")) {
    $bootsModels = DatabaseHandler::getBoots();
    foreach ($bootsModels as $bootsModel) {
        $bootsModel->init()?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#">
                    <img class="card-img-top img-fluid" src="../images/<?php echo $bootsModel->getBootsModel()->getImages()[0]; ?>" alt="" width="284" height="284">
                </a>
                <div class="card-block">
                    <h4 class="card-title"><a href="#">Item One</a></h4>
                    <h5><?php echo $bootsModel->getBootsPrice(); ?></h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
            </div>
        </div>
<?php
    }
}
else if (!strcmp($param, "indoor_boots")) {
    $brands = DatabaseHandler::getBrands();
    //print_r($brands);
}

?>

<!--<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
        <a href="#"><img class="card-img-top img-fluid" src="contentPane/adidas_x.jpg" alt="" width="284" height="284"></a>
        <div class="card-block">
            <h4 class="card-title"><a href="#">Item One</a></h4>
            <h5>$24.99</h5>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
        </div>
    </div>
</div>-->
