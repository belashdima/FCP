<?php
$balls = $data;?>

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
            if ($balls != null)
                foreach ($balls as $ball) {?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="http://localhost/Footballcity_Project/admin/wares/ware?id=<?php echo $ball->getWareId(); ?>">
                                <img class="card-img-top img-fluid imageItem" src="http://localhost/Footballcity_Project/images/adidas_x.jpg" alt="">
                            </a>
                            <div class="card-block">
                                <h4 class="card-title">
                                    <a href="http://localhost/Footballcity_Project/admin/wares/ware?id=<?php echo $ball->getWareId(); ?>">
                                        <?php echo $ball->getPropertyValueByName('Brand').' '.$ball->getPropertyValueByName('Model');?>
                                    </a>
                                </h4>
                                <h5>
                                    <?php echo $ball->getPropertyValueByName('Price').'$';?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $ball->getPropertyValueByName('Description');?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>
        </div>
    </div>
</div>
