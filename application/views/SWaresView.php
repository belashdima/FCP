<?php

$items = $data->items;?>


<!--<div class="container-fluid">-->
<script src="<?php echo $rootDirectory;?>/js/sItemsView.js"></script>

<div id="mainContent" class="row mlr-0">

    <div class="col-12">
        <div class="page-block">
            <div class="d-inline-block mtb-4">
                <span>Сортировать по:</span>
            </div>
            <select id="sort-select" class="custom-select">
                <option value="popularity" data-option="popularity">Популярности</option>
                <option value="price_low_to_high" data-option="price_low_to_high">Цене (сначала дешевле)</option>
                <option value="price_high_to_low" data-option="price_high_to_low">Цене (сначала дороже)</option>
                <!--<option value="date" data-option="date">Дате добавления</option>-->
            </select>
        </div>
    </div>

    <?php
    if ($items == null || empty($items)) { ?>
        <div class="col-12 text-center p-8">
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
            <div class="col-lg-3 col-md-4 col-sm-6 pb-15">
                <div class="card h-100 page-block card-hoverable">
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
