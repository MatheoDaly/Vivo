//-------------------------------Partie evennement

$(function () {

    $('#submit').on('click', function () {
        // detail name et id : user/p/m/poids/t/mdp1
        var mdp = $('#mdp');
        var mail = $('#m');
        if (verifier(mdp) && verifier(mail)) { // si tous les inputs sont remplit
            // verifier la correspondance -> transformer en fonction
            $.post("verification.php",
                $('form').serialize(),
                function (data) {
                    if (data == 'Connecter') {
                        //redirection vers profil
                        alert('Vous etes connecter !');
                        $(location).attr('href', '../Profil/Profil.php');
                    } else if (data == 'Non inscrit') {
                        alert("Vous n'avez aucun compte chez nous");
                        $(location).attr('href', '../Inscription/Inscription.php');
                    } else if (data == 'Mauvais mdp') {
                        alert("Mauvais mot de passe");
                    } else {
                        alert('Connexion compromise');
                    }

                }
            );

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
