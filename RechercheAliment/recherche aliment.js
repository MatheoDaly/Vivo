$(function () {
    $("#submit").on('click', function () {
        $.post('crea_recette_suite', {
                instructions: $('#instructions').val,
                nomRecette: $('#nomRecette').val
            },
            function (data) {
                if (data == 'check') {
                    alert(data);
                    $(location).attr('href', 'CreationMenuSuite.php')
                }
            });

    });
});
