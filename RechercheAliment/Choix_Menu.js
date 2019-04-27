$(document).ready(function () {
    $('#ajout3').click(function () {
        $.post('Planification.php',
            $('#EnvoieMenue').serialize(),
            function (data) {
                alert(data); //$('#ajout3').animate({backgroundColor: green}, 1000);
                if (data == 1) {
                    alert('Votre menu a bien été enregistré');
                } else {
                    alert("Votre menu n'a pas été enregistré");

                }
            });

    });
});
