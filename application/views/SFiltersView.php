<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>

<!--Angular-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="<?php echo $rootDirectory;?>/js/filtersAngularController.js"></script>

<div ng-app="filtersAngularApp" ng-controller="filtersAngularController" class="row mlr-0">

    <?php
    $priceLimits = array('','');
    if (key_exists('price', $_GET)) {
        $priceParamValue = $_GET['price'];
        $priceLimits = explode('-', $priceParamValue);
    }

    ?>
    <div class="list-group-item list-group-item-action filter-card page-block filter-page-block" data-toggle="collapse" data-target="#price" href="#price">Цена</div>
    <div id="price" class="page-block filter-page-block filter-field <?php if (array_key_exists('price', $_GET)) {echo "expand"/*"collapse.in"*/;} else {echo "collapse";}?>">
        <input id="lowerPriceLimit" type="text" class="form-control input-upper" placeholder="От, бел. руб" aria-describedby="basic-addon1" value="<?php if (strcmp($priceLimits[0], 'nolimit') != 0) echo $priceLimits[0]; ?>">
        <input id="upperPriceLimit" type="text" class="form-control" placeholder="До, бел. руб" aria-describedby="basic-addon1" value="<?php if (strcmp($priceLimits[1], 'nolimit') != 0) echo $priceLimits[1]; ?>">
    </div>

    <!--<h3>Фильтр</h3>-->
    <?php
    $filters = $data->filters;

    //print_r($filters);

    foreach ($filters as $filter) {
        if (!empty($filter->getPossibleValues()) &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'image') == 0 &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'description') == 0 &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'color') == 0 &&
            !strcmp($filter->getProperty()->getUrlPresentation(), 'price') == 0) { ?>
            <div onclick="none()" class="list-group-item list-group-item-action filter-card page-block filter-page-block" data-toggle="collapse" data-target="#<?php echo $filter->getProperty()->getUrlPresentation(); ?>">
                <?php echo $filter->getProperty()->getRusPropertyName(); ?>
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

<script>
    function none(){}
</script>

<script src="<?php echo $rootDirectory;?>/js/siteFilters.js"></script>
