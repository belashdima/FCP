<script src="http://localhost/Footballcity_Project/js/discounts.js"></script>

<?php $discounts = $data; ?>

<div>
    <table class="table">
        <tbody>
        <?php foreach ($discounts as $discount) { ?>
        <tr>
            <td class="borderless brandHolder"><?php echo $discount->getBrand(); ?></td>
            <td class="borderless modelHolder"><?php echo $discount->getModel(); ?></td>
            <td class="borderless">
                <input class="form-control discountPercentHolder" value="<?php echo $discount->getDiscountPercent(); ?>" type="number" placeholder="Скидка (%)">
            </td>
            <td class="borderless">
                <button class="btn btn-danger deleteDiscountButton">Удалить скидку</button>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>