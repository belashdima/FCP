
<div class="row">
    <div class="col-md-3">

        <?php
            foreach ($filters as $filter) {
                if (!strcmp($filter->getProperty()->getPropertyName(), 'Image') == 0 && !strcmp($filter->getProperty()->getPropertyName(), 'Description') == 0) {?>
                <h4><?php echo $filter->getProperty()->getPropertyName(); ?></h4>
                <ul class="list-group">

                <?php
                foreach ($filter->getPossibleValues() as $possibleValue) { ?>
                    <li class="list-group-item"><?php echo $possibleValue; ?></li>
                <?php }
                ?>

                </ul>
            <?php }
            }
        ?>

        <h4><?php pr ?></h4>

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

    </div>

    <div class="col-md-9">

        <h3>Футбольные мячи</h3>

        <?php //print_r($data);
        include_once 'SWaresView.php';
        ?>


    </div>

</div>