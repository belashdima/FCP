<script src="<?php echo $rootDirectory;?>/js/itemsView.js"></script>

<?php
$items = $data->items;
$category = $data->category; ?>

<!--Add Card-->
<?php if ($category != null && $category != 1) { ?>
<div class="col-lg-12 col-md-12 col-sm-12 mb-4">
    <div class="card h-100 card-hoverable">
        <button id="addNewItemButton" data-categoryId="<?php echo $category; ?>" type="button" class="btn btn-success">Add new item</button>
    </div>
</div>
<?php } ?>

<div>
    <div class="container-fluid">

        <div id="mainContent" class="row">

            <?php
            //print_r($balls);
            if ($items != null)
                foreach ($items as $item) {?>
                    <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                        <div class="card h-100 card-hoverable">
                            <a href="<?php echo $rootDirectory;?>/admin/items/item?id=<?php echo $item->getId(); ?>">
                                <img class="card-img-top img-fluid imageItem" src="<?php echo $item->getMainImage(); ?>" alt="">
                            </a>
                            <div class="card-block">
                                <h4 class="card-title wareName">
                                    <a href="<?php echo $rootDirectory;?>/admin/items/item?id=<?php echo $item->getId(); ?>">
                                        <?php echo $item->getPropertyValueByUrlPresentation('brand').' '.
                                            $item->getPropertyValueByUrlPresentation('collection').' '.
                                            $item->getPropertyValueByUrlPresentation('model');?>
                                    </a>
                                </h4>
                                <h5>
                                    <?php echo $item->getPropertyValueByUrlPresentation('price').'$';?>
                                </h5>
                                <p class="card-text">
                                    <?php /*echo $ware->getPropertyValueByUrlPresentation('description');*/?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }?>
        </div>
    </div>
</div>
