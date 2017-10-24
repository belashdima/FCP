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
            <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-15">-->

            <div class="col-12 mb-15">
                <div class="card page-block">


                    <div class="basketItemInfo">
                        <div class="basketImageWrapper">
                            <div class="basketImage" style="background-image: url(<?php echo $item->getMainImage(); ?>)">
                            </div>
                        </div>

                        <div class="ml-8" style="display: inline-block">
                            <span>
                                <a href="<?php echo $rootDirectory.'/item?id='.$basketItem->itemId; ?>" class="green">
                                    <?php echo $item->getPropertyValueByUrlPresentation('brand').' '.$item->getPropertyValueByUrlPresentation('model');?>
                                </a>
                            </span>

                            <span class="id-container" hidden>
                                <?php echo $basketItem->itemId;?>
                            </span>
                            <span class="size-container" style="display: block">
                                <?php echo $size;?>
                            </span>
                            <span>
                                <?php echo $discountPrice;?>
                            </span>
                            <span> бел. руб.</span>

                            <div class="site-button site-red-background text-center">
                                <div class="delete-from-basket-button color-white">Удалить из корзины</div>
                            </div>
                        </div>
                    </div>



                    <!--<div class="card-block">
                        <span class="wareName">
                            <?php /*echo $item->getPropertyValueByUrlPresentation('brand').' '.$item->getPropertyValueByUrlPresentation('model');*/?>
                        </span>
                        <span class="wareName">
                            <?php /*echo $size;*/?>
                        </span>

                        <div style="float: right">
                            <span class="wareName" style=" display: inline;">
                                <?php /*echo $discountPrice;*/?>
                            </span>
                            <span style=" display: inline"> бел. руб.</span>
                        </div>
                    </div>-->
                </div>
            </div>
            <?php
        }
    }?>


    <h3 class="m-8">Данные покупателя</h3>

    <div class="col-12 mb-15">
        <div class="card page-block">
            <table class="table">
                <tbody>
                <tr>
                    <td class="borderless">ФИО</td>
                    <td class="borderless">
                        <input class="form-control" placeholder="Ваше ФИО">
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>
                        <input class="form-control" placeholder="Ваш E-mail">
                    </td>
                </tr>
                <tr <?php if ($item->getModel() == null || strlen($item->getModel()) == 0) echo "hidden"?>>
                    <td>Номер телефона</td>
                    <td>
                        <input class="form-control" placeholder="Ваш номер телефона">
                    </td>
                </tr>
                <tr>
                    <td>Дополнительная информация</td>
                    <td>
                        <textarea class="form-control" rows="3" placeholder="Укажите интересующую вас информацию"></textarea>
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="page-block site-green-background text-center">
                <div id="confirm-order-button" class="color-white">Подтвердить заказ</div>
            </div>
        </div>
    </div>


</div>