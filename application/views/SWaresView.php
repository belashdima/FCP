<?php
$wares = $data;?>

<div>
    <div class="container-fluid">

        <div id="mainContent" class="row">

            <?php
            //print_r($balls);
            if ($wares != null)
                foreach ($wares as $ware) {?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <!--<a href="http://localhost/Footballcity_Project/ware?id=<?php /*//echo $ware->getWareId(); */?>">-->
                            <a href="http://localhost/Footballcity_Project/ware?<?php echo $ware->getLink(); ?>">
                                <img class="card-img-top img-fluid imageItem" src="<?php echo $ware->getMainImage(); ?>" alt="">
                            </a>
                            <div class="card-block">
                                <h6 class="card-title wareName">
                                    <?php echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model');?>
                                    <!--<a href="http://localhost/Footballcity_Project/ware?id=<?php /*//echo $ware->getWareId(); */?>">-->
                                    <!--<a href="http://localhost/Footballcity_Project/ware?<?php /*echo $ware->getLink(); */?>">
                                        <?php /*echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model');*/?>
                                    </a>-->
                                </h6>
                                <!--<h6>
                                    <?php /*echo $ware->getPropertyValueByName('Price').'$';*/?>
                                </h6>-->
                                <p class="card-text">
                                    <?php /*echo $ware->getPropertyValueByName('Description');*/?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>
        </div>
    </div>
</div>
