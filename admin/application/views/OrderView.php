<div class="card page-block">
    <h3 class="order-title">Заказ <?php echo $order->getId();?></h3>
    <div>
        <span>ФИО: </span>
        <span><?php echo $order->getFio();?></span>
    </div>
    <div>
        <span>E-mail: </span>
        <span><?php echo $order->getEmail();?></span>
    </div>
    <div>
        <span>Номер телефона: </span>
        <span><?php echo $order->getPhoneNumber();?></span>
    </div>
    <div>
        <span>Дополнительная информация: </span>
        <span><?php echo $order->getAdditionalInfo();?></span>
    </div>
    <h5 class="order-title">Статус: Обработан</h5>
    <h4 class="order-title">Товары:</h4>
    <div class="container">
        <div class="row orders-row">
        <?php foreach ($order->getOrderItems() as $orderItem) { ?>

            <?php $item = $orderItem->getItem(); ?>

            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <div class="card h-100 card-hoverable">
                    <a href="<?php echo $rootDirectory;?>/admin/items/item?id=<?php echo $item->getId(); ?>">
                        <img class="card-img-top img-fluid imageItem" src="<?php echo $item->getMainImage(); ?>" alt="">
                    </a>
                    <div class="card-block">
                        <h4 class="card-title wareName">
                            <a href="<?php echo $rootDirectory;?>/admin/items/item?id=<?php echo $item->getId(); ?>">
                                <?php echo $item->getPropertyValueByUrlPresentation('brand').' '.
                                    $item->getPropertyValueByUrlPresentation('collection').' '.
                                    $item->getPropertyValueByUrlPresentation('model');?>
                            </a>
                        </h4>
                        <h5>
                            <?php echo $item->getPropertyValueByUrlPresentation('price').'$';?>
                        </h5>
                        <p class="card-text">
                            <?php /*echo $ware->getPropertyValueByUrlPresentation('description');*/?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    <button class="delete-order-button color-white site-red-background new-button" data-order-id="<?php echo $order->getId();?>" data-toggle="modal" data-target="#deleteOrderModal">Удалить заказ</div>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вы действительно хотите удалить заказ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button id="delete-order-submit-button" type="button" class="btn btn-danger">Удалить</button>
            </div>
        </div>
    </div>
</div>