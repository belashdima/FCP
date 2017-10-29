<script src="<?php echo $rootDirectory;?>/js/orders.js"></script>

<div class="">
    <?php
    $orders = $data->orders;

    foreach ($orders as $order) {
        include 'OrderView.php';
    } ?>
</div>