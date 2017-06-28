<?php
$filterNumber = 0;
foreach ($filters as $filter) {
    if (!strcmp($filter->getProperty()->getPropertyName(), 'Image') == 0 && !strcmp($filter->getProperty()->getPropertyName(), 'Description') == 0) {?>
        <h4><?php //echo $filter->getProperty()->getPropertyName(); ?></h4>
        <div class="list-group-item black" data-toggle="collapse" data-target="#<?php echo $filterNumber; ?>"><?php echo $filter->getProperty()->getPropertyName(); ?></div>

        <ul id="<?php echo $filterNumber; ?>" class="filterItem collapse">
            <?php
            foreach ($filter->getPossibleValues() as $possibleValue) { ?>
                <li class="list-group-item"><?php echo $possibleValue; ?></li>
            <?php }
            ?>
        </ul>

    <?php }
    $filterNumber++;
}
?>

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
