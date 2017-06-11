<?php
foreach ($bootsModels as $bootsModel) {
    $bootsModel->init();?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="boots/<?php echo $bootsModel->getModelId(); ?>">
                <img class="card-img-top img-fluid imageItem" src="../images/<?php echo $bootsModel->getImages()[0]; ?>" alt="">
            </a>
            <div class="card-block">
                <h4 class="card-title">
                    <a href="boots/<?php echo $bootsModel->getModelId(); ?>">
                        <?php echo $bootsModel->getModelBrand()->getBrandName().' '.$bootsModel->getModelName();?>
                    </a>
                </h4>
                <h5>
                    <?php echo $bootsModel->getModelPrice().'$'; ?>
                </h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
            </div>
            <div class="card-footer">
                <!--<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
            </div>
        </div>
    </div>
    <?php
}