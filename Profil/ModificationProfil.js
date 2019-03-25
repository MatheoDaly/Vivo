$(function () {
    $('#avatar').click(function () {
        $('.hidden input').css({
            visibility: 'visible',
            backgroundColor: 'white'
        });
    });

    $('.hidden input').submit(function () {

    });

});

$(function () {
    $('input[name=BtnStat]').click(function () {
        $(location).attr('href', '../Statistique/Statistique.php');
    });


});
