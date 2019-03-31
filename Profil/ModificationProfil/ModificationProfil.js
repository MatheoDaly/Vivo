    // https://www.jqueryscript.net/lightbox/jQuery-Plugin-For-Popup-Window-with-Morphing-Button-Morph-Button.html
    $(function () {
        $('#VariableProfil .submit').on("click", function () {
            $.post("ModificationProfil.php", $(this).serialize(), function (data) {
                alert(data);
                if (data = "true") {
                    $(location).attr('href', 'Profil.php');
                } else {
                    alert("Profil non enregistrer")
                }
            })

        });

        $('#TelePhoto .submit').on("click", function () {
            $.post("IntegrationPhoto.php",
                $(this).serialize(),
                function (data) {
                    if (data = "true") {
                        $(location).attr('href', 'Profil.php');
                    } else {
                        alert("Profil non enregistrer")
                    }
                })

        });
    });
