/*
function openImageWindow(src) {
    let image = new Image();
    image.src = src;
    let width = image.width;
    let height = image.height;
    window.open(src,"Image","width=" + width + ",height=" + height);
}*/
$('.image-link').on('click', function() {
    $('.upl__shell .pic-container').html('<img src="uploads/'+$(this).text()+'">');
    $('.upl').show();
});

$('.uplshell__close-sign').on('click', function() {
    $('.upl__shell .pic-container').empty();
    $(this).parent().parent().hide();
});
