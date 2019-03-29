$(function () {
    // https://www.jqueryscript.net/lightbox/jQuery-Plugin-For-Popup-Window-with-Morphing-Button-Morph-Button.html
    $('#avatar').toggle(function () {
        $('.hidden input').css({
            visibility: 'visible',
            backgroundColor: 'white'
        });
    });

    $('.hidden form').submit(function () {
        $.post();
    });

    $('.close').click(function () {});
});
