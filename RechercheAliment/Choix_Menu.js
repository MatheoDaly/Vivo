$(function () {
    $('#ajout3').click(function () {

        alert($('#date').val());
        $.post('Choix_Menu.js',
            $('#ajoutMenue').serialize(),
            function (data) {
                if (data == "check") {
                    //$('#ajout3').animate({backgroundColor: green}, 1000);
                }
            });
    });
});

function creationSet() {
    data = {};
    for (var i = 0; i < $('#nbtypeMenue')) {
        //($date, $heure, $id_menu, $id_profil)
        data.push({

        });
    }
    return data;
}
