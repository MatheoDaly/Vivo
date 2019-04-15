$(function () {
    $('#ajout3').click(function () {

        alert($('#date').val());
        $.post('Choix_Menu.php', {
                test: 1
            },
            function (data) {
                if (data == "check") {
                    //$('#ajout3').animate({backgroundColor: green}, 1000);
                }
            });
        alert(creationSet());
    });
});


// reflechir a la création dynamique de clés !
function creationSet() {
    data = {};
    name = [];
    for (var i = 0; i < $('#nbtypeMenue').val(); i++) {
        name.push("date" + i);
    }

    for (var i = 0; i < $('#nbtypeMenue').val(); i++) {
        //($date, $heure, $id_menu, $id_profil)
        data.push({
            name[i]: $("#date" + i).val(),
            "heure": $("#heure" + i).val(),
            "idMenu": $("#Menu" + i).val()
        });
    }
    return data;
}

/*
("date" + toString(i)): $("#date" + i).val(),
            ("heure" + toString(i)): $("#heure" + i).val(),
            ("idMenu" + toString(i)): $("#Menu" + i).val()


*/
