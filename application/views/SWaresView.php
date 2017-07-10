<?php
$wares = $data;?>


<!--<div class="container-fluid">-->

<div id="mainContent" class="row simple-row">

    <?php
    //print_r($balls);
    if ($wares != null)
        foreach ($wares as $ware) {?>
            <div class="col-lg-3 col-md-4 col-sm-6 simple-card">
                <div class="card h-100 page-block">
                    <!--<a href="http://localhost/Footballcity_Project/ware?id=<?php /*//echo $ware->getWareId(); */?>">-->
                    <a href="http://localhost/Footballcity_Project/ware?<?php echo $ware->getLink(); ?>">
                        <img class="card-img-top img-fluid imageItem" src="<?php echo $ware->getMainImage(); ?>" alt="">
                    </a>
                    <div class="card-block">
                        <span class="wareName">
                            <?php echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model');?>
                            <!--<a href="http://localhost/Footballcity_Project/ware?id=<?php /*//echo $ware->getWareId(); */?>">-->
                            <!--<a href="http://localhost/Footballcity_Project/ware?<?php /*echo $ware->getLink(); */?>">
                                <?php /*echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model');*/?>
                            </a>-->
                        </span>
                        <span class="wareName">
                            <?php echo $ware->getPropertyValueByName('Price').'$';?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        }?>
</div>
