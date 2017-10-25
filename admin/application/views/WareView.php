<?php
$item = $data;?>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="<?php echo $rootDirectory;?>/js/modifyItemAngularController.js"></script>
<script src="<?php echo $rootDirectory;?>/js/modifyItem.js"></script>

<div id="modifyItemDiv" ng-app="modifyItemAngularApp" ng-controller="modifyItemAngularController">
    <form>

        <div class="form-group">
            <label for="exampleInputEmail1">Скидка</label>
            <input class="form-control" id="discountPercentId" ng-change="updateFinalPrice()" ng-model="item.discountPercent" placeholder="Enter discount %">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Финальная цена</label>
            <input class="form-control" id="finalPriceId" ng-model="item.finalPrice" placeholder="Final price" disabled>
        </div>

        <div class="form-group" ng-repeat="prop in item.properties">
            <div ng-if="(prop.property.urlPresentation.indexOf('size') === -1) && (prop.property.urlPresentation.localeCompare('ground_type') != 0)">
                <label for="exampleInputEmail1">{{prop.property.rusPropertyName}}</label>
                <input class="form-control" id="{{prop.property.propertyName}}Id" ng-change="updateFinalPrice()" ng-model="prop.value.value" placeholder="Enter {{prop.value.value.toLowerCase()}}">
            </div>

            <div ng-if="prop.property.urlPresentation.localeCompare('ground_type') == 0">
                <label for="exampleInputEmail1">{{prop.property.rusPropertyName}}</label>

                <select id="{{prop.property.propertyName}}Id" class=" form-control custom-select" ng-model="prop.value.value" placeholder="Enter {{prop.value.value.toLowerCase()}}">
                    <option>AG</option>
                    <option>FG</option>
                    <option>SG</option>
                </select>
            </div>
        </div>


        <!--<div class="form-group" ng-repeat="prop in item.properties" ng-if="prop.property.urlPresentation.localeCompare('ground_type') == 0">
            <label for="exampleInputEmail1">{{prop.property.rusPropertyName}}</label>
            <input class="form-control" id="{{prop.property.propertyName}}Id" ng-change="updateFinalPrice()" ng-model="prop.value.value" placeholder="Enter {{prop.value.value.toLowerCase()}}">
        </div>-->

        <label>Размеры</label>
        <table class="table borderless" ng-if="item.sizes.length > 0">
            <tbody>
            <tr ng-repeat="size in item.sizes">
                <td hidden>
                    <div class="form-control categoryIdHolder" value="{{size.size.sizeId}}">
                </td>
                <td>
                    <div >
                        {{size.size.sizeName}}
                    </div>
                </td>
                <td>
                    <input class="form-control categoryImageHolder" ng-model="size.quantity" type="number">
                </td>
            </tr>
            </tbody>
        </table>

        <label for="exampleInputEmail1">Изображения товара</label>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-15 pl-0" ng-repeat="image in item.images">
                    <div class="image-container mb-7">
                        <a href="{{image}}">
                            <img class="card-img-top img-fluid imageItem item-image" src="{{image}}" alt="">
                        </a>
                    </div>

                    <div class="w-100">
                        <button class="btn btn-danger w-100" ng-click="deleteItemImage(image)">Удалить изображение</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button id="showAddNewImageDialogButton" class="btn btn-primary" data-toggle="modal" data-target="#addImageModal">Добавить новое изображение</button>
        </div>

        <button id="modifyItemSubmitButton" type="submit" class="btn btn-primary">Сохранить изменения</button>
        <button id="deleteItemButton" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubmitModal">Удалить товар</button>
    </form>


    <!-- Add image modal -->
    <link rel="stylesheet" type="text/css" href="<?php echo $rootDirectory;?>/css/file-upload-progress-bar.css">
    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Введите адрес или загрузите изображение</h5>
                </div>

                <div class="modal-body">

                    <input id="new-image-path" class="form-control mb-15" placeholder="New image path" ng-model="newImage">

                    <p>
                        <input type="file" id="file-input" accept="image/jpeg,image/png,image/gif">
                        <label for="file-input">Select a file</label>
                    </p>
                    <p>
                        <progress id="upload-progress"></progress>
                    </p>
                    <p id="message"></p>

                </div>

                <div class="modal-footer">
                    <button id="addImageCancelButton" type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button id="addImageSubmitButton" type="button" class="btn btn-success" data-dismiss="modal" ng-click="addNewItemImage()">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo $rootDirectory;?>/js/file-upload-progress-bar.js"></script>

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