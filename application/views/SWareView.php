<?php
$ware = $data;?>

<link rel="stylesheet" href="http://localhost/Footballcity_Project/css/breadcrumbStyling.css">

<!--<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Обувь</a></li>
    <li class="breadcrumb-item"><a href="http://localhost/Footballcity_Project/admin/boots">Футбольные бутсы</a></li>
    <li class="breadcrumb-item active">nflejnl</li>
</ol>-->

<!--<nav class="breadcrumb">
    <a class="breadcrumb-item" href="#">Обувь</a>
    <a class="breadcrumb-item" href="http://localhost/Footballcity_Project/">Футбольные бутсы</a>
    <span class="breadcrumb-item active">Bootstrap</span>
</nav>-->

<!--<ol class="breadcrumb breadcrumb-arrow">
    <li><a href="#">Обувь</a></li>
    <li><a href="#">Футбольные бутсы</a></li>
    <li><a href="#"><?php /*print_r($ware->getWareTypes()) */?></a></li>
    <li class="active"><span><?php /*echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model') */?></span></li>
</ol>-->

<ol class="breadcrumb breadcrumb-arrow">
    <?php
    $wareTypesUI = $ware->getWareTypes();
    array_pop($wareTypesUI);
    $wareTypesUI = array_reverse($wareTypesUI);

    foreach ($wareTypesUI as $wareType) {?>
    <li><a href="#"><?php echo $wareType->getName() ?></a></li>
    <?php } ?>

    <li class="active"><span><?php echo $ware->getPropertyValueByName('Brand').' '.$ware->getPropertyValueByName('Model') ?></span></li>
</ol>

<div class="row">
    <div class="col-md-6">

        <div>
            <img src="<?php echo $ware->getPropertyValueByName('Image') ?>" style="width: 100%">
            <?php


            //print_r($data);
            //include_once 'SFiltersView.php';
            ?>
        </div>

    </div>

    <div class="col-md-6">

        <div style="background-color: white; height: 100%">
            <h1><?php echo $ware->getPropertyValueByName('Brand') ?></h1>
            <h2><?php echo $ware->getPropertyValueByName('Model') ?></h2>
            <h2><?php echo $ware->getPropertyValueByName('Description') ?></h2>
            <h2><?php echo $ware->getPropertyValueByName('Price') ?></h2>
        </div>

        <?php /*//print_r($data);
        include_once 'SWaresView.php';
        */?>


    </div>

</div>