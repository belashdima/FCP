<div id="myCarousel" class="carousel slide carouselItem" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner imageItem">
        <div class="item active">
            <img class="imageItem" src="<?php echo $rootDirectory;?>/images/<?php echo ($bootsModel->getImages()[0]);?>" alt="Los Angeles">
        </div>

        <div class="item">
            <img class="imageItem" src="<?php echo $rootDirectory;?>/images/<?php echo ($bootsModel->getImages()[1]);?>" alt="Chicago">
        </div>

        <div class="item">
            <img class="imageItem" src="<?php echo $rootDirectory;?>/images/<?php echo ($bootsModel->getImages()[2]);?>" alt="New York">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>