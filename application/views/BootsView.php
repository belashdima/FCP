<?php

$bootsModelId = explode('/', $_SERVER['REQUEST_URI'])[4];

$bootsModel = DatabaseHandler::getModelById($bootsModelId);

$bootsModel->init();

$images = $bootsModel->getImages();

$brands = DatabaseHandler::getBrands();

//echo $data;
?>

<ol class="breadcrumb">
    <li class="disabled"><a href="#">Обувь</a></li>
    <li><a href="http://localhost/Footballcity_Project/admin/boots">Футбольные бутсы</a></li>
    <li class="active"><?php echo $bootsModel->getModelBrand()->getBrandName().' '.$bootsModel->getModelName()?></li>
</ol>

<div id="alertSuccessfullySaved" class="alert alert-success alert-dismissable fade in fixed">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Изменения успешно сохранены
</div>

<h3>Модель</h3>

<span id="model_id_holder" style="display: none;">
    <?php echo $bootsModel->getModelId(); ?>
</span>

<h4>Бренд</h4>

<div id="brandSelector" class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle brand" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $bootsModel->getModelBrand()->getBrandName(); ?>
        <span class="caret">
        </span>
    </button>
    <ul class="dropdown-menu">
        <?php foreach ($brands as $brand) {?>
            <li class="brandVariant">
                <a href="#">
                    <?php echo $brand->getBrandName(); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<h4>Название модели</h4>

<div class="input-group">
    <span class="input-group-addon brand">
        <?php echo $bootsModel->getModelBrand()->getBrandName(); ?>
    </span>
    <input id="nameInput" type="text" class="form-control" value="<?php echo $bootsModel->getModelName(); ?>" placeholder="Username" aria-describedby="basic-addon1">
</div>

<h4>Характеристики</h4>

<h4>Цена</h4>

<div class="input-group priceGroup">
    <input id="priceInput" type="text" class="form-control" value="<?php echo $bootsModel->getModelPrice(); ?>" placeholder="Price" aria-describedby="basic-addon1">
    <span class="input-group-addon">
        $
    </span>
</div>

<h4>Размеры</h4>

<?php include_once 'ShoeSizesTableView.php'; ?>

<h3>Фото</h3>

<div class="container-fluid">

    <div id="mainContent" class="row">
        <div class="col-lg-12">
            <?php include_once 'GridBootsModelImagesView.php'; ?>
        </div>
    </div>

</div>