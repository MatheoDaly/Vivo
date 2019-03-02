//-------------------------------Partie evennement

$(function () {
    // detail id : user/p/m/poids/t/mdp1
    // detail name : prenom/utilisateur/email/genre/poids/taille/mdp/mdp2


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

    $('#submit').on('click', function () {
        // detail name et id : user/p/m/poids/t/mdp1
        var mdp = $('#mdp1');
        var taille = $('#t');
        var prenom = $('#p');
        var mail = $('#m');
        var poids = $('#poids');
        var user = $('#user');
        if (verifier(mdp) && verifier(taille) && verifier(prenom) && verifier(mail) && verifier(poids) &&
            verifier(user) && (mdp.val().length > 8)) { // si tous les inputs sont remplit
            // verifier la correspondance -> transformer en fonction
            $.post("Reception.php",
                $('form').serialize(),
                function (data) {
                    if (data == 'Inscrit') {
                        //redirection vers profil
                        alert('Vous etes inscrit !');
                        $(location).attr('href', '../Profil/Profil.php');
                    } else if (data == 'Existe') {
                        alert("Inscription compromise, vous avez un profil !");
                        $(location).attr('href', '../Connection/connexion.php');
                    } else {
                        alert('Inscription compromise');
                    }

                }
            )

        } else {
            alert('veuillez remplir les champs correctement !');
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
