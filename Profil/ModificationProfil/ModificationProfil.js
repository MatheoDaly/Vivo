    // https://www.jqueryscript.net/lightbox/jQuery-Plugin-For-Popup-Window-with-Morphing-Button-Morph-Button.html
    $(function () {
        $('#VariableProfil').on("submit", function () {
            $.post("ModificationProfil.php", $(this).serialize(), function (data) {
                if (data = "Ok") {
                    $(location).attr('href', 'Profil.php');
                } else {
                    alert("Profil non enregistrer")
                }
            })

        });

        $('#TelePhoto').on("submit", function () {
            $.post("IntegrationPhoto.php", $(this).serialize(), function (data) {
                if (data = "Ok") {
                    $(location).attr('href', 'Profil.php');
                } else {
                    alert("Profil non enregistrer")
                }
            })

        });
    });
