<?php
$bootsModels = DatabaseHandler::getBootsModels();?>

<div class="container-fluid">

    <div id="mainContent" class="row">
        <div class="col-lg-12">

            <!--Add Card-->
            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="card h-100">
                    <button id="add_new_item_button" type="button" class="btn btn-success">Add new item</button>
                </div>
            </div>


            <?php include_once 'GridView.php'; ?>

        </div>
    </div>

</div>


