<?php

$items = $data->items;?>


<!--<div class="container-fluid">-->

<div id="mainContent" class="row mlr-0">

    <?php
    if ($items == null || empty($items)) { ?>
        <div class="col-12">
            <label>Нет товаров, удовлетворяющих заданным условиям</label>
        </div>
    <?php } else {
        foreach ($items as $item) {
            $originalPrice = $item->getPropertyValueByUrlPresentation('price');
            $discountPrice = null;
            $discountExists = $item->getDiscountPercent() != null && $item->getDiscountPercent() != 0;
            if ($discountExists) {
                $discountPrice = $originalPrice - ($originalPrice * $item->getDiscountPercent()) / 100;
            }
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-15">
                <div class="card h-100 page-block">
                    <div class="image-container">
                        <a href="<?php echo $rootDirectory."/item?".$item->getLink(); ?>">
                            <img class="card-img-top img-fluid imageItem" src="<?php echo $item->getMainImage(); ?>" alt="">
                        </a>
                        <?php if ($discountExists) echo '<span class="discount-label">-'.$item->getDiscountPercent().'%</span>'; ?>
                    </div>

                    <div class="card-block">
                        <span class="wareName">
                            <?php echo $item->getPropertyValueByUrlPresentation('brand').' '.$item->getPropertyValueByUrlPresentation('model');?>
                        </span>

                        <div style="float: right">
                            <span class="wareName" style=" display: inline; <?php if ($discountExists) echo 'text-decoration: line-through'; ?>">
                                <?php echo $originalPrice; ?>
                            </span>
                            <span class="wareName" style=" display: inline; <?php if ($discountExists) echo 'color: red'; ?>">
                                <?php echo $discountPrice; ?>
                            </span>
                            <span style=" display: inline"> бел. руб.</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }?>
</div>
