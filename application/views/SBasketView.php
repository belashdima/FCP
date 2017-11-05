<h3 class="m-8">Ваша корзина</h3>

<?php $basketItems = $data->basketItems; ?>

<div id="mainContent" class="row mlr-0">

    <?php
    if ($basketItems == null || empty($basketItems)) { ?>
        <div class="col-12">
            <label class="m-8">Ваша корзина пуста</label>
        </div>
    <?php } else {
        foreach ($basketItems as $basketItem) {
            $item = (new DatabaseHandler())->getAllForItem($basketItem->itemId);
            $size = $basketItem->size;

            $originalPrice = $item->getPropertyValueByUrlPresentation('price');
            $discountPrice = null;
            $discountExists = $item->getDiscountPercent() != null && $item->getDiscountPercent() != 0;
            if ($discountExists) {
                $discountPrice = $originalPrice - ($originalPrice * $item->getDiscountPercent()) / 100;
            }
            ?>

            <div class="col-12 mb-15">
                <div class="card page-block">
                    <div class="basket-item">
                        <div class="basket-item-data">
                            <div class="basket-image-wrapper">
                                <!--<div class="basket-image" style="background-image: url(<?php /*echo $item->getMainImage(); */ ?>)">
                            </div>-->
                                <img class="basket-image" src="<?php echo $item->getMainImage(); ?>">
                            </div>

                            <div class="ml-8 basket-item-info">
                                <span>
                                <a href="<?php echo $rootDirectory . '/item?id=' . $basketItem->itemId; ?>"
                                   class="green">
                                    <?php echo $item->getPropertyValueByUrlPresentation('brand') . ' ' . $item->getPropertyValueByUrlPresentation('model'); ?>
                                </a>
                                </span>

                                <span class="id-container" hidden>
                                    <?php echo $basketItem->itemId; ?>
                                </span>
                                <span class="size-container" style="display: block">
                                    <?php echo $size; ?>
                                </span>
                                <span>
                                    <?php echo $discountPrice; ?>
                                </span>
                                <span> бел. руб.</span>
                            </div>
                        </div>

                        <button class=" mt-8 delete-from-basket-button color-white site-red-background new-button">
                            Удалить из корзины
                    </div>
                </div>
            </div>
            <?php
        }
    }?>
</div>

<h3 class="m-8">Данные покупателя</h3>

<div class="col-12 mb-15">
    <div class="page-block p-8 borderless">
        <table class="table">
            <tbody>
            <tr>
                <td class="borderless">ФИО</td>
                <td class="borderless">
                    <input id="fio-input" class="form-control" placeholder="Ваше ФИО">
                </td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>
                    <input id="email-input" class="form-control" placeholder="Ваш E-mail">
                </td>
            </tr>
            <tr>
                <td>Номер телефона</td>
                <td>
                    <input id="phone-input" class="form-control" placeholder="Ваш номер телефона">
                </td>
            </tr>
            <tr>
                <td>Дополнительная информация</td>
                <td>
                    <textarea id="additional-input" class="form-control" rows="3" placeholder="Укажите интересующую вас информацию"></textarea>
                </td>
            </tr>
            </tbody>
        </table>

        <button id="confirm-order-button" class="color-white site-green-background new-button">Подтвердить заказ</button>
    </div>
</div>