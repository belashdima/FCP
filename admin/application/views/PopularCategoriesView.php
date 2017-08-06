<script src="http://localhost/Footballcity_Project/js/popularCategories.js"></script>

<?php $categories = $data; ?>

<div>
    <table class="table">
        <tbody>
        <?php foreach ($categories as $category) { ?>
            <tr>
                <td hidden>
                    <input class="form-control categoryIdHolder" value="<?php echo $category->getId(); ?>" type="text">
                </td>
                <td>
                    <input class="form-control categoryNameHolder" value="<?php echo $category->getName(); ?>" type="text" placeholder="Название">
                </td>
                <td>
                    <input class="form-control categoryUrlHolder" value="<?php echo $category->getUrl(); ?>" type="url" placeholder="URL адрес">
                </td>
                <td>
                    <input class="form-control categoryImageHolder" value="<?php echo $category->getImage(); ?>" type="url" placeholder="Изображение">
                </td>
                <td>
                    <button class="btn btn-danger deleteCategoryButton">Удалить категорию</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="form-group">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Добавить категорию</button>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Введите название, адрес и изображение категории</h5>
            </div>
            <div class="modal-body">
                <div class="input-group mb-15">
                    <span class="input-group-addon">Название</span>
                    <input class="form-control nameModalHolder" type="text" placeholder="Введите название">
                </div>

                <div class="input-group mb-15">
                    <span class="input-group-addon">URL адрес</span>
                    <input class="form-control urlModalHolder" type="url" placeholder="Введите URL адрес">
                </div>

                <div class="input-group mb-15">
                    <span class="input-group-addon">Изображение</span>
                    <input class="form-control imageModalHolder" type="url" placeholder="Введите изображение категории">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button id="addNewCategoryButton" type="button" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </div>
</div>