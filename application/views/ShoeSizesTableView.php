<?php $shoeSizes = DatabaseHandler::getShoeSizes(); ?>
<table class="table table-hover">
    <thead>
    <tr>
        <th>UK</th>
        <th>EUR</th>
        <th>US</th>
        <th>Количество</th>
        <th>Цена (размера)</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($shoeSizes as $shoeSize) {?>
    <tr data-sizeId="<?php echo $shoeSize->getSizeId(); ?>">
        <!--<td style="display: none"><?php /*echo $shoeSize->getSizeID(); */?></td>-->
        <td><?php echo $shoeSize->getSizeUk(); ?></td>
        <td><?php echo $shoeSize->getSizeEu(); ?></td>
        <td><?php echo $shoeSize->getSizeUs(); ?></td>
        <td>
            <div class="input-group">
                <input type="text" class="form-control sizeQuantity" value="<?php echo rand(0, 5); ?>" placeholder="Quantity" aria-describedby="basic-addon1">
            </div>
        </td>
        <td>
            <div class="input-group priceGroup">
                <input type="text" class="form-control sizePriceInput" value="<?php echo $bootsModel->getModelPrice(); ?>" placeholder="Price" aria-describedby="basic-addon1" disabled>
                <span class="input-group-addon">$</span>
            </div>

            <p></p>

            <label class="checkbox-inline">
                <input class="useModelPrice" type="checkbox" value="" checked>Использовать цену модели
            </label>
        </td>
    </tr>
    <?php } ?>

    </tbody>
</table>