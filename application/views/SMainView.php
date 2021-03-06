<?php
$popularCategories = $data->popularCategories;
$popularItems = $data->popularItems;
$videos = $data->videos;
?>

<div class="row">
    <div class="col-12">
        <div class="slider-container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="https://d1alu5gpg11xej.cloudfront.net/banner/1707/e9519567c997.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="https://d23m35kqv7rxx3.cloudfront.net/banner/1710/40f23c5d1f42.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="https://d1alu5gpg11xej.cloudfront.net/banner/1712/902644caf64a.jpg" alt="First slide">
                    </div>
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
    </div>

    <?php if (!empty($popularCategories)) { ?>
        <div class="col-12">
            <h3  class="m-8">Популярные категории</h3>
        </div>
        <?php
        foreach ($popularCategories as $popularCategory) {?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="category-block">
                    <a href="<?php echo $popularCategory->getUrl()?>">
                        <img class="card-img-top img-fluid imageItem" src="<?php echo $popularCategory->getImage()?>" alt="">
                    </a>
                    <h6 class="category-name"><?php echo $popularCategory->getName()?></h6>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


    <div class="col-12">
        <h3 class="m-8">Популярные товары</h3>
        <?php
        $data = new stdClass();
        $data->items = $popularItems;

        include_once 'application/views/SWaresView.php';
        ?>
    </div>

    <?php
    if (!empty($videos)) {
        require_once 'application/views/VideosView.php';
    } ?>

</div>