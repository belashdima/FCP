
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

    <div class="col-12 main-view-subheader">
        <h3>Популярные категории</h3>
    </div>

    <?php
    $popularCategories = $data;
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

    <div class="col-12 main-view-subheader">
        <h3>Популярные товары</h3>
    </div>

    <div class="col-12 main-view-subheader">
        <h3>Наши видео</h3>
    </div>

</div>