<?php
$wares = $data;?>

<!--Add Card-->
<div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <div class="card h-100">
        <button id="add_new_item_button" type="button" class="btn btn-success">Add new item</button>
    </div>
</div>

<div>
    <div class="container-fluid">

        <div id="mainContent" class="row">

            <?php
            //print_r($balls);
            if ($wares != null)
                foreach ($wares as $ware) {?>
                    <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
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
