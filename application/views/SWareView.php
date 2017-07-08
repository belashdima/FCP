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

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php
                    $active = true;
                    foreach ($ware->getImages() as $image) { ?>
                    <div class="carousel-item <?php if($active) echo 'active'?>">
                        <img class="d-block img-fluid" src="<?php echo $image ?>" alt="First slide">
                    </div>
                    <?php
                        $active = false;
                    } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <?php


            //print_r($data);
            //include_once 'SFiltersView.php';
            ?>
        </div>

    </div>

    <div class="col-md-6">

        <div style="background-color: white; height: 100%">
            <!--<p>Бренд:</p>
            <h3><?php /*echo $ware->getPropertyValueByName('Brand') */?></h3>
            <p>Модель:</p>
            <h3><?php /*echo $ware->getPropertyValueByName('Model') */?></h3>
            <p>Краткое описание:</p>
            <h3><?php /*echo $ware->getPropertyValueByName('Description') */?></h3>
            <p>Цена:</p>
            <h3><?php /*echo $ware->getPropertyValueByName('Price') */?></h3>
            <h3>Размеры:</h3>-->

            <table class="table">
                <tbody>
                <tr>
                    <td>Бренд:</td>
                    <td><?php echo $ware->getPropertyValueByName('Brand') ?></td>
                </tr>
                <tr>
                    <td>Модель:</td>
                    <td><?php echo $ware->getPropertyValueByName('Model') ?></td>
                </tr>
                <tr>
                    <td>Краткое описание:</td>
                    <td><?php echo $ware->getPropertyValueByName('Description') ?></td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td><?php echo $ware->getPropertyValueByName('Price') ?></td>
                </tr>
                <tr>
                    <td colspan="2">Размеры:</td>
                </tr>
                </tbody>
            </table>
        </div>

        <?php /*//print_r($data);
        include_once 'SWaresView.php';
        */?>


    </div>

</div>