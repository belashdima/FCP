<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>

<?php

$filterNumber = 0;
foreach ($filters as $filter) {
    if (!strcmp($filter->getProperty()->getPropertyName(), 'Image') == 0 && !strcmp($filter->getProperty()->getPropertyName(), 'Description') == 0) {?>
        <h4><?php //echo $filter->getProperty()->getPropertyName(); ?></h4>
        <div class="list-group-item black" data-toggle="collapse" data-target="#<?php echo $filterNumber; ?>"><?php echo $filter->getProperty()->getPropertyName(); ?></div>

        <ul id="<?php echo $filterNumber; ?>" class="filterItem collapse">
            <?php

            if (strcmp($filter->getProperty()->getPropertyName(), "Price") == 0) {?>
                <div>
                    <span id="lowerPriceLimit"><?php echo min($filter->getPossibleValues()); ?>$</span>
                    <span id="upperPriceLimit"><?php echo max($filter->getPossibleValues()); ?>$</span>
                    <input id="priceSlider" type="text" class="span2" value="" data-slider-min="<?php echo min($filter->getPossibleValues()); ?>" data-slider-max="<?php echo max($filter->getPossibleValues()); ?>" data-slider-step="1" data-slider-value="[<?php echo min($filter->getPossibleValues()); ?>,<?php echo max($filter->getPossibleValues()); ?>]"/>
                </div>
            <?php }

            else
            foreach ($filter->getPossibleValues() as $possibleValue) { ?>
                <li class="list-group-item"><?php echo $possibleValue; ?></li>
            <?php }
            ?>
        </ul>

    <?php }
    $filterNumber++;
}
?>

<script src="http://localhost/Footballcity_Project/js/siteFilters.js"></script>




<!--<h4>Brand</h4>
        <ul class="list-group">
            <li class="list-group-item">Adidas</li>
            <li class="list-group-item active">Nike</li>
            <li class="list-group-item">Puma</li>
            <li class="list-group-item">Select</li>
            <li class="list-group-item">Select</li>
            <li class="list-group-item">Umbro</li>
        </ul>

        <h4>Size</h4>
        <ul class="list-group">
            <li class="list-group-item">1</li>
            <li class="list-group-item">4</li>
            <li class="list-group-item">5</li>
        </ul>-->
