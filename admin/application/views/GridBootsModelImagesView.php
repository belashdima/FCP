<?php
foreach ($images as $image) {?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card h-100">
            <a href="#">
                <img class="card-img-top img-fluid imageItem" src="http://localhost/Footballcity_Project/images/<?php echo $image; ?>" alt="">
            </a>

            <button type="button" class="btn btn-danger imageChangeButton">Удалить</button>
        </div>
    </div>
    <?php
}?>
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
        <a href="#">
            <img class="card-img-top img-fluid imageItem" src="http://localhost/Footballcity_Project/images/plus_image.png" style="width: 40%;" alt="">
        </a>
    </div>
</div>

