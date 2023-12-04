import './bootstrap';
import Dropzone from 'dropzone';

Dropzone.autoDiscover = false;


const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube una imagen',
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        console.log(document.querySelector('[name="image"]').value);
        if (document.querySelector('[name="image"]').value.trim()) {

            const publishedImage = {};
            publishedImage.size = 1234;
            publishedImage.name = document.querySelector('[name="imagen"]').value;

            this.emit('addedfile', publishedImage);
            this.emit('thumbnail', publishedImage, `/uploads/${publishedImage.name}`);

            publishedImage.previewElement.classList.add(
                'dz-success',
                'dz-complete'
            );
        }
    }

})


dropzone.on("success", function(file,response) {
    document.querySelector('[name="image"]').value = response.image;
})


dropzone.on("removedfile", function() {
    document.querySelector('[name="image"]').value = "";
})
