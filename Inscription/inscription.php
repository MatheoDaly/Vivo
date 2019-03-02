<!DOCTYPE html>
<html>

<head>
    <title>Vivo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../Outil/Style/Style.css" rel="stylesheet">
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div id="TableProfil" class="d-flex flex-column justify-content-center rounded">
        <h1>Inscription</h1>

        <form method="get" action="profil.php">
            <div>
                <p>
                    Utilisateur :<br><input type="text" name="utilisateur" placeholder="Jean Denis" />
                </p>
                <p>
                    Prenom :<br><input type="text" name="prenom" placeholder="monMail@mail.com" />
                </p>
                <p>
                    E-mail :<br><input type="email" name="email" />
                </p>

                <div class="d-flex justify-content-center align-content-center">
                    Homme :<INPUT type="radio" name="genre" value="M" />
                    Femme :<INPUT type="radio" name="genre" value="F" />
                </div>

                <p>
                    Poid (kg) :<br><input type="number" name="poids" placeholder="70 kg" />
                </p>
                <p>
                    Taille (cm) : <br><input type="number" name="taille" placeholder="170 cm" />
                </p>
                <p>
                    Mot de passe :<br><input type="password" name="mdp" />
                </p>
                <p>
                    Confirmation du passe :<br><input type="password" name="mdp2" value="" />
                </p>
                <p>
                    <input type="submit" value="Envoyer" class="btn btn-primary" />
                </p>
            </div>
        </form>
    </div>
</body>

</html>
