$('.image-link').on('click', function() {
    $('#viewImageLayerShell .pic-container').html('<img src="uploads/'+$(this).text()+'">');
    let imgSrc = $('#viewImageLayerShell .pic-container img').attr('src');
    $('#viewImageLayerShell .del-container span').attr('data-src', imgSrc). text('Удалить изображение');
    $('#viewImageLayer').show();
});

$('#viewImageLayerShell .uplshell__close-sign').on('click', function() {
    $('#viewImageLayerShell .pic-container').empty();
    $(this).parent().parent().hide();
});

$('#viewImageLayerShell .del-container .del-link').on('click', function() {
   if(confirm('Удалить файл?')) {
       removeImage($(this).attr('data-src'));
   } else {
       return false;
   }
});

function removeImage (imgSrc) {
    $.ajax({
        type: 'POST',
        cache: false,
        url: '?r=message/deleteimage',
        data: 'image='+imgSrc,
        success: function (response) {
            if(response === '1') {
                $('#viewImageLayerShell .pic-container').empty();
                $('#viewImageLayerShell .del-container span').text('');
                $('#viewImageLayerShell .response-container').html('Файл удален');
                $('[data-link="' + imgSrc + '"]').remove();
                setTimeout(() => {$('#viewImageLayerShell .response-container').html(''); $('#viewImageLayer').hide('slow'); } , 500);
            } else {
                $('#viewImageLayerShell .response-container').html(response);
            }
        }
    });
}
