<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>

<!--Angular-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="http://localhost/Footballcity_Project/js/filtersAngularController.js"></script>

<div ng-app="filtersAngularApp" ng-controller="filtersAngularController" class="row simple-row">

    <!--<div class="list-group-item list-group-item-action filter-card page-block filter-page-block" data-toggle="collapse" data-target="#target">SomeFilter</div>
    <div id="target" class="collapse page-block filter-page-block filter-field">
        <div class="input-group">
            <span class="input-group-addon borderless">
                <input type="checkbox" aria-label="Checkbox for following text input">
            </span>
            <span type="text" class="form-control borderless">Adidas</span>
        </div>
        <div class="input-group">
            <span class="input-group-addon borderless">
                <input type="checkbox" aria-label="Checkbox for following text input">
            </span>
            <span type="text" class="form-control borderless">Diadora</span>
        </div>
        <div class="input-group">
            <span class="input-group-addon borderless">
                <input type="checkbox" aria-label="Checkbox for following text input">
            </span>
            <span type="text" class="form-control borderless">Nike</span>
        </div>
    </div>-->

    <?php $priceFilter = Filter::getFilterByPropertyUrlPresentation($filters, 'price'); ?>
    <div class="list-group-item list-group-item-action filter-card page-block filter-page-block" data-toggle="collapse" data-target="#price">Цена</div>
    <div id="price" class="collapse page-block filter-page-block filter-field">
        <input id="lowerPriceLimit" type="text" class="form-control input-upper" placeholder="От" aria-describedby="basic-addon1">
        <input id="upperPriceLimit" type="text" class="form-control" placeholder="До" aria-describedby="basic-addon1">
    </div>

    <!--<h3>Фильтр</h3>-->
    <?php
    foreach ($filters as $filter) {
        if (!strcmp($filter->getProperty()->getUrlPresentation(), 'image') == 0 &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'description') == 0 &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'color') == 0 &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'price') == 0) {?>
            <div class="list-group-item list-group-item-action filter-card page-block filter-page-block" data-toggle="collapse" data-target="#<?php echo $filter->getProperty()->getUrlPresentation(); ?>">
                <?php echo $filter->getProperty()->getPropertyName(); ?>
            </div>
            <div id="<?php echo $filter->getProperty()->getUrlPresentation(); ?>" class="page-block filter-page-block filter-field <?php if (array_key_exists($filter->getProperty()->getUrlPresentation(), $_GET)) {echo "expand"/*"collapse.in"*/;} else {echo "collapse";}?>">
               <?php
                foreach ($filter->getPossibleValues() as $possibleValue) { ?>
                    <div class="input-group">
                        <span class="input-group-addon borderless">
                            <input class="filter-variant-checkbox" type="checkbox" aria-label="Checkbox for following text input" <?php if (in_array($possibleValue, $_GET)) {echo "checked";}?>>
                        </span>
                        <!--<span class="input-group-addon">$</span>-->
                        <span type="text" class="form-control borderless filter-variant-name"><?php echo $possibleValue; ?></span>
                    </div>
                    <!--<li class="list-group-item list-group-item-action filterVariant"><?php /*echo $possibleValue; */?></li>-->
                <?php }
                ?>
            </div>

        <?php }
    }
    ?>
</div>

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
