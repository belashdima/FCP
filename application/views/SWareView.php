<?php
$item = $data->item;
$added = $data->added;

$originalPrice = $item->getPropertyValueByUrlPresentation('price');
$discountPrice = null;
$discountExists = $item->getDiscountPercent() != null && $item->getDiscountPercent() != 0;
if ($discountExists) {
    $discountPrice = $originalPrice - ($originalPrice * $item->getDiscountPercent()) / 100;
}

?>

<link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/breadcrumbStyling.css">

<div class="row">
    <div class="col-12">
        <div class="page-block">
            <ol class="breadcrumb breadcrumb-arrow">
                <?php
                $categoriesUI = $item->getCategories();
                $categoriesUI = array_reverse($categoriesUI);

                foreach ($categoriesUI as $category) {
                    if ($category->getShown()) { ?>
                    <li><a href="<?php echo $rootDirectory."/".$category->getUrlPresentation() ?>"><?php echo $category->getName() ?></a></li>
                <?php }
                } ?>

                <li class="active"><span><?php echo $item->getPropertyValueByUrlPresentation('brand').' '.$item->getPropertyValueByUrlPresentation('model') ?></span></li>
            </ol>
        </div>
    </div>

    <div class="col-12" <?php if(!$added) {echo "hidden";} ?>>
        <div class="page-block text-center">
            <span class="site-green">Товар успешно добавлен в вашу </span>
            <a href="<?php echo $rootDirectory."/basket"; ?>"><span class="site-green underlined">корзину</span></a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="page-block">
            <div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $active = true;
                        foreach ($item->getImages() as $image) { ?>
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
            </div>

            <!-- alternate gallery -->
            <div>
                <link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/swiper.css">
                <style>
                    .swiper-container {
                        width: 100%;
                        height: 300px;
                        margin-left: auto;
                        margin-right: auto;
                    }
                    .swiper-slide {
                        background-size: cover;
                        background-position: center;
                    }
                    .gallery-top {
                        /*height: 80%;*/
                        height: 100%;
                        width: 100%
                    }
                    .gallery-thumbs {
                        height: 20%;
                        box-sizing: border-box;
                        padding: 10px 0;
                    }
                    .gallery-thumbs .swiper-slide {
                        width: 25%;
                        height: 100%;
                        opacity: 0.4;
                    }
                    .gallery-thumbs .swiper-slide-active {
                        opacity: 1;
                    }

                </style>
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url(http://www.adidas.mx/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/default/dwa638c071/zoom/BB4319_05_standard.jpg?sw=2000&sfrm=jpg)"></div>
                        <div class="swiper-slide" style="background-image:url(http://www.adidas.mx/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/default/dw37dbe8b1/zoom/BB4319_02_standard.jpg?sw=2000&sfrm=jpg)"></div>

                    </div>

                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url(http://www.adidas.mx/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/default/dwa638c071/zoom/BB4319_05_standard.jpg?sw=2000&sfrm=jpg)"></div>
                        <div class="swiper-slide" style="background-image:url(http://www.adidas.mx/dis/dw/image/v2/aaqx_prd/on/demandware.static/-/Sites-adidas-products/default/dw37dbe8b1/zoom/BB4319_02_standard.jpg?sw=2000&sfrm=jpg)"></div>

                    </div>
                </div>
                <script src="<?php echo $rootDirectory;?>/js/swiper.js"></script>
                <script>
                    var galleryTop = new Swiper('.gallery-top', {
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        spaceBetween: 10,
                    });
                    var galleryThumbs = new Swiper('.gallery-thumbs', {
                        spaceBetween: 10,
                        centeredSlides: true,
                        slidesPerView: 'auto',
                        touchRatio: 0.2,
                        slideToClickedSlide: true
                    });
                    galleryTop.params.control = galleryThumbs;
                    galleryThumbs.params.control = galleryTop;

                </script>
            </div>

        </div>

    </div>

    <div class="col-md-6">
        <div class="page-block">
            <table class="table">
                <tbody>
                    <tr <?php if ($item->getBrand() == null || strlen($item->getBrand()) == 0) echo "hidden"?>>
                        <td class="borderless">Бренд:</td>
                        <td class="borderless"><?php echo $item->getBrand(); ?></td>
                    </tr>
                    <tr <?php if ($item->getCollection() == null || strlen($item->getCollection()) == 0) echo "hidden"?>>
                        <td>Коллекция:</td>
                        <td><?php echo $item->getCollection(); ?></td>
                    </tr>
                    <tr <?php if ($item->getModel() == null || strlen($item->getModel()) == 0) echo "hidden"?>>
                        <td>Модель:</td>
                        <td><?php echo $item->getModel(); ?></td>
                    </tr>
                    <tr <?php if ($item->getPropertyValueByUrlPresentation('description') == null || strlen($item->getPropertyValueByUrlPresentation('description')) == 0) echo "hidden"?>>
                        <td>Краткое описание:</td>
                        <td><?php echo $item->getPropertyValueByUrlPresentation('description') ?></td>
                    </tr>
                    <tr <?php if ($item->getPropertyValueByUrlPresentation('price') == null || strlen($item->getPropertyValueByUrlPresentation('price')) == 0) echo "hidden"?>>
                        <td>Цена:</td>
                        <td>
                            <div>
                                <span class="wareName" style=" display: inline; <?php if ($discountExists) echo 'text-decoration: line-through'; ?>">
                                    <?php echo $originalPrice; ?>
                                </span>
                                    <span class="wareName" style=" display: inline; <?php if ($discountExists) echo 'color: red'; ?>">
                                    <?php echo $discountPrice; ?>
                                </span>
                                <span style=" display: inline"> бел. руб.</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="page-block">
            <table class="table">
                <tbody>
                <tr>
                    <td class="borderless">Размеры в наличии:</td>
                </tr>
                <tr>
                    <td class="borderless">
                        <select id="size-select" class="custom-select w-100">
                            <?php
                            if ($item->sizes != null && !empty($item->sizes)) {
                                foreach ($item->sizes as $size) {
                                    if ($size != null && strcmp($size->quantity, "0") != 0) { ?>
                                    <option >
                                        <?php echo $size->size->sizeName; ?>
                                    </option>
                                <?php }
                                }
                            } ?>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>

        <div class="page-block site-green-background text-center">
            <div class="add-to-basket-button color-white">Добавить в корзину</div>
        </div>

        <!--<div class="page-block site-red-background text-center">
            <div class="delete-from-basket-button">Удалить из корзины</div>
        </div>-->

        <div class="page-block">
            <span>Связаться с нами для покупки:</span>
            <p>
                <div class="inline">
                    <a href="tel:+375296286741" class="green">+375 29 628 67 41</a>
                    <br>
                    <a href="tel:+375257918864" class="green">+375 25 791 88 64</a>
                    <br>
                    <a href="mailto:ftblcity.by@gmail.com" class="green">ftblcity.by@gmail.com</a>
                    <br>
                    <a href="https://vk.com/footballcityminsk" class="green">vk.com/footballcityminsk</a>
                </div>
            </p>

            <span>Наш адрес: г. Минск, пр-т Независимости 58, ТЦ "Московско-Венский", 2 этаж, павильон 219</span>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1036.9046079587044!2d27.588732761825078!3d53.91768004342265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6622282dabf5ccb7!2sFootballcity!5e0!3m2!1sru!2sby!4v1490899779874" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

</div>