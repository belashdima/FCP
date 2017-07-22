<script src="http://localhost/Footballcity_Project/js/discounts.js"></script>

<?php $discounts = $data; ?>

<div>
    <table class="table">
        <tbody>
        <?php foreach ($discounts as $discount) { ?>
        <tr>
            <td class="brandHolder"><?php echo $discount->getBrand(); ?></td>
            <td class="modelHolder"><?php echo $discount->getModel(); ?></td>
            <td>
                <input class="form-control discountPercentHolder" value="<?php echo $discount->getDiscountPercent(); ?>" type="number" placeholder="Скидка (%)">
            </td>
            <td>
                <button class="btn btn-danger deleteDiscountButton">Удалить скидку</button>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="form-group">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addDiscountModal">Добавить скидку</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addDiscountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Введите бренд и модель товара</h5>
            </div>
            <div class="modal-body">
                <div class="input-group discountPercentModalContainer">
                    <span class="input-group-addon">Бренд</span>
                    <input class="form-control brandModalHolder" type="text" placeholder="Введите бренд">
                </div>

                <div class="input-group discountPercentModalContainer">
                    <span class="input-group-addon">Модель</span>
                    <input class="form-control modelModalHolder" type="text" placeholder="Введите название модели">
                </div>

                <div class="input-group discountPercentModalContainer">
                    <span class="input-group-addon">Скидка (%)</span>
                    <input class="form-control discountPercentModalHolder" type="number" placeholder="Введите скидку">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button id="addNewDiscountButton" type="button" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </div>
</div>