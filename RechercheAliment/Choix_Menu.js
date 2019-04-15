$(document).ready(function () {
    $('#ajout3').click(function () {
        $.post('Planification.php',
            $('#EnvoieMenue').serialize(),
            function (data) {
                alert(data); //$('#ajout3').animate({backgroundColor: green}, 1000);
                if (data == "check") {}
            });

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
            'name': $("#date" + i).val(),
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
