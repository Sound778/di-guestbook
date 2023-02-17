$(document).ready(function () {
    let viewImageLayerShell = $('#viewImageLayerShell');
    let picContainer = viewImageLayerShell.find('.pic-container');
    let delContainer = viewImageLayerShell.find('.del-container');
    let responseContainer = viewImageLayerShell.find('.response-container');

    $('.image-link').on('click', function () {
        picContainer.html('<img src="uploads/' + $(this).text() + '">');
        let imgSrc = picContainer.find('img').attr('src');
        delContainer.find('span').attr('data-src', imgSrc).text('Удалить изображение');
        viewImageLayerShell.parent().show();
    });

    viewImageLayerShell.find('.uplshell__close-sign').on('click', function () {
        picContainer.empty();
        viewImageLayerShell.parent().hide();
    });

    delContainer.find('.del-link').on('click', function () {
        if (confirm('Удалить файл?')) {
            removeImage($(this).attr('data-src'));
        } else {
            return false;
        }
    });

    function removeImage(imgSrc) {
        $.ajax({
            type: 'POST',
            cache: false,
            url: '?r=message/deleteimage',
            data: 'image=' + imgSrc,
            success: function (response) {
                if (response === '1') {
                    picContainer.empty();
                    delContainer.find('span').text('');
                    responseContainer.html('Файл удален');
                    $('[data-link="' + imgSrc + '"]').remove();
                    setTimeout(() => {
                        responseContainer.html('');
                        viewImageLayerShell.parent().hide('slow');
                    }, 500);
                } else {
                    responseContainer.html(response);
                }
            }
        });
    }
});
