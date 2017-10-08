let fileInput, uploadProgress, message;

function init() {
    fileInput = document.getElementById('file-input');
    uploadProgress = document.getElementById('upload-progress');
    message = document.getElementById('message');

    var newFileName = '';

    fileInput.addEventListener('change', function () {
        let xhr = new XMLHttpRequest(),
            fd = new FormData();

        fd.append('file', fileInput.files[0]);

        xhr.upload.onloadstart = function (e) {
            uploadProgress.classList.add('visible');
            uploadProgress.value = 0;
            uploadProgress.max = e.total;
            message.textContent = 'uploading...';
            fileInput.disabled = true;
        };

        xhr.upload.onprogress = function (e) {
            uploadProgress.value = e.loaded;
            uploadProgress.max = e.total;
        };

        xhr.upload.onloadend = function (e) {
            uploadProgress.classList.remove('visible');
            message.textContent = 'complete!';
            fileInput.disabled = false;

            newFileName = xhr.responseText;
            $('#new-image-path').val(newFileName);
        };

        xhr.onload = function () {
            //message.textContent = 'Server says: "' + xhr.responseText + '"';

            newFileName = xhr.responseText;
            $('#new-image-path').val(newFileName);
            angular.element($('#modifyItemDiv')).scope().newImage = xhr.responseText;
        };

        xhr.open('POST', rootDirectory + '/uploadFile&filename=', true);
        xhr.send(fd);
    });
}

init();