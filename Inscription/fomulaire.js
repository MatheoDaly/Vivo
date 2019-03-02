//-------------------------------Partie evennement

$(function () {
    // on prend de prendre directement un element sans devoir appele document

    $('#mdp1').keyup(function () {
        if ($(this).val().length < 8) {
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'
            });
        } else {
            $(this).css({ // on rend le champ vert
                borderColor: 'green',
                color: 'green'
            });
        }
    });

    $('#mdp2').keyup(function () {
        if ($(this).val() != $('#mdp1').val()) {
            // afficher le mdp est mauvais d'jack! La pickette jack...
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'
            });
        } else {
            // le mdp est good !
            $(this).css({ // on rend le champ vert
                borderColor: 'green',
                color: 'green'
            });
        }
    });

    $('form').on('submit', function () {
        // a remplir lorsque le formulaire est fait
        var mdp = $('mdp');
        var mdp = $('mdp');
        var mdp = $('mdp');
        var mdp = $('mdp');

        if (verifier(mdp) && verifier(mdp)) { // si tous les inputs sont remplit

        }
    });

});


//---------------------------------------------Fonction à appeler---------------------------
function verifier(selecteur) {
    if ($(selecteur).val() != "") {
        return true;
    } else {
        return false;
    }
}


//prevoir autocomplétion
