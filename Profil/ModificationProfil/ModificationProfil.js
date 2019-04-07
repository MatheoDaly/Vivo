    // https://www.jqueryscript.net/lightbox/jQuery-Plugin-For-Popup-Window-with-Morphing-Button-Morph-Button.html
    $(function () {
        $('#VariableProfil .submit').on("click", function () {
            $.post("ModificationProfil/ModificationProfil.php", $('#VariableProfil').serialize(), function (data) {
                alert(data);
                if (data == 1) {
                    $(location).attr('href', 'Profil.php');
                } else {
                    alert("Profil non enregistrer");
                }
            });

        });
    });
