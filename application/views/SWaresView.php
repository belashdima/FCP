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
                            <a href="http://localhost/Footballcity_Project/admin/wares/ware?id=<?php echo $ware->getWareId(); ?>">
                                <img class="card-img-top img-fluid imageItem" src="<?php echo $ware->getMainImage(); ?>" alt="">
                            </a>
                            <div class="card-block">
                                <h4 class="card-title">
                                    <a class="wareName" href="http://localhost/Footballcity_Project/admin/wares/ware?id=<?php echo $ware->getWareId(); ?>">
                                        <?php echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model');?>
                                    </a>
                                </h4>
                                <h5>
                                    <?php echo $ware->getPropertyValueByName('Price').'$';?>
                                </h5>
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
