$('.image-link').on('click', function() {
    $('.upl__shell .pic-container').html('<img src="uploads/'+$(this).text()+'">');
    let imgSrc = $('.upl__shell .pic-container img').attr('src');
    $('.upl__shell .del-container span').attr('data-src', imgSrc);
    $('.upl').show();
});

$('.uplshell__close-sign').on('click', function() {
    $('.upl__shell .pic-container').empty();
    $(this).parent().parent().hide();
});
