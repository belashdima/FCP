<?php
$ware = $data;?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="http://localhost/Footballcity_Project/js/modifyItemAngularController.js"></script>
<script src="http://localhost/Footballcity_Project/js/modifyItem.js"></script>

<div id="modifyItemDiv" ng-app="modifyItemAngularApp" ng-controller="modifyItemAngularController">
    <form>
        <div class="form-group" ng-repeat="prop in ware.properties">
            <label for="exampleInputEmail1">{{prop.property.propertyName}}</label>
            <input class="form-control" id="{{prop.property.propertyName}}Id" ng-if="prop.property.urlPresentation != 'shoe_size'" ng-model="prop.value.value" placeholder="Enter {{prop.value.value.toLowerCase()}}">

            <select class="form-control" id="{{prop.property.propertyName}}Id" ng-if="prop.property.urlPresentation == 'shoe_size'" ng-model="prop.value.value">
                <?php $sizes = DatabaseHandler::getShoeSizes();
                foreach ($sizes as $size) {?>
                <option><?php echo $size; ?></option>
                <?php } ?>
            </select>
        </div>

        <label for="exampleInputEmail1">Ware images</label>
        <div class="form-group" ng-repeat="image in images">
            <!--<button class="btn btn-danger">Удалить изображение</button>-->
            <input class="form-control imageInput" id="exampleInputEmail1" ng-model="image.path" placeholder="New image">
        </div>

        <div class="form-group">
            <!--<button id="addNewImageButton" class="btn btn-primary">Добавить новое изображение</button>-->
            <button id="showAddNewImageDialogButton" class="btn btn-primary" data-toggle="modal" data-target="#addImageModal">Добавить новое изображение</button>
        </div>

        <button id="modifyItemSubmitButton" type="submit" class="btn btn-primary">Сохранить изменения</button>
        <button id="deleteItemButton" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubmitModal">Удалить товар</button>
    </form>
</div>

<!-- Add image modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Введите адрес или загрузите изображение</h5>
            </div>
            <div class="modal-body">

                <input class="form-control" id="exampleInputEmail1" placeholder="New image">
                <form action="http://localhost/Footballcity_Project/uploadFile" method="POST" enctype="multipart/form-data">
                    <input type="file" name="image" />
                    <input type="submit"/>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button id="addImageSubmitButton" type="button" class="btn btn-success">Добавить</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteSubmitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вы действительно хотите удалить товар?</h5>
                <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>-->
            </div>
            <!--<div class="modal-body">
                Все связанные
            </div>-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button id="deleteSubmitButton" type="button" class="btn btn-danger">Удалить</button>
            </div>
        </div>
    </div>
</div>