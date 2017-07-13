<?php
$ware = $data;
$uniqueSizes = $sizes;?>

<link rel="stylesheet" href="http://localhost/Footballcity_Project/css/breadcrumbStyling.css">

<div class="row main-row">
    <div class="col-12">
        <div class="page-block">
            <ol class="breadcrumb breadcrumb-arrow">
                <?php
                $wareTypesUI = $ware->getWareTypes();
                array_pop($wareTypesUI);
                $wareTypesUI = array_reverse($wareTypesUI);

                foreach ($wareTypesUI as $wareType) {?>
                    <li><a href="#"><?php echo $wareType->getName() ?></a></li>
                <?php } ?>

                <li class="active"><span><?php echo $ware->getPropertyValueByUrlPresentation('brand').' '.$ware->getPropertyValueByUrlPresentation('model') ?></span></li>
            </ol>

        </div>
    </div>

    <div class="col-md-6">
        <div class="page-block">
            <div>
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

    </div>

    <div class="col-md-6">
        <div class="page-block">
            <table class="table">
                <tbody>
                <tr>
                    <td class="borderless">Бренд:</td>
                    <td class="borderless"><?php echo $ware->getPropertyValueByUrlPresentation('brand') ?></td>
                </tr>
                <tr>
                    <td>Модель:</td>
                    <td><?php echo $ware->getPropertyValueByUrlPresentation('model') ?></td>
                </tr>
                <tr>
                    <td>Краткое описание:</td>
                    <td><?php echo $ware->getPropertyValueByUrlPresentation('description') ?></td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td><?php echo $ware->getPropertyValueByUrlPresentation('price') ?> бел. руб.</td>
                </tr>

                <?php foreach ($uniqueSizes as $index=>$uniqueSize) { ?>
                    <tr>
                        <?php if ($index == 0) echo '<td rowspan="'.count($uniqueSizes).'">Размеры:</td>' ?>
                        <td><?php echo $uniqueSize; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>