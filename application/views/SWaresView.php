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
                    <div class="image-holder">
                        <a href="http://localhost/Footballcity_Project/ware?<?php echo $ware->getLink(); ?>">
                            <img class="card-img-top img-fluid imageItem" src="<?php echo $ware->getMainImage(); ?>" alt="">
                        </a>
                        <?php if ($ware->getDiscount() != null && $ware->getDiscount() != 0) echo '<span class="discount-label">-'.$ware->getDiscount().'%</span>'; ?>
                    </div>

                    <div class="card-block">
                        <span class="wareName">
                            <?php echo $ware->getPropertyValueByUrlPresentation('brand').' '.$ware->getPropertyValueByUrlPresentation('model');?>
                        </span>
                        <span class="wareName" style="float: right">
                            <?php echo $ware->getPropertyValueByUrlPresentation('price').' бел. руб.';?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        }?>
</div>
