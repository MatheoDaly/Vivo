<!DOCTYPE html>
<html>

<head>
    <title>Vivo</title>
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="../Outil/Style/Style.css" rel="stylesheet">
    <link href="inscription.css" rel="stylesheet">
</head>


<body>
    <div id="TableProfil" class="d-flex flex-column justify-content-center rounded">
        <h1>Inscription</h1>
        <hr>

        <form method="post" action="../Profil/Profil.php">
            <div>
                <p>
                    <label for="utilisateur">
                        Utilisateur :
                    </label><input id="user" type="text" name="utilisateur" placeholder="Jean Denis" />
                </p>
                <p>
                    <label for="prenom">
                        Prenom :
                    </label>
                    <input id="p" type="text" name="prenom" placeholder="Jean" />
                </p>
                <p>
                    <label for="email">
                        Email :
                    </label>
                    <input id="m" type="email" name="email" placeholder="monMail@mail.com" />
                </p>

                <div class="d-flex justify-content-center align-content-center">
                    Homme :<INPUT type="radio" name="genre" value="M" checked />
                    Femme :<INPUT type="radio" name="genre" value="F" />
                </div>

                <p>
                    <label for="poids">
                        Poids
                    </label><input id="poids" type="number" name="poids" placeholder="70 kg" />
                </p>
                <p>
                    <label for="taille">
                        Taille :
                    </label><input id="t" type="number" name="taille" placeholder="170 cm" />
                </p>
                <p>
                    <label for="mdp1">
                        Mot de passe :
                    </label><input id="mdp1" type="password" name="mdp" />
                </p>
                <p>
                    <label for="mdp2">
                        Mot de passe à confirmer :
                    </label>
                    <input id="mdp2" type="password" name="mdp2" value="" />
                </p>
                <p>
                    <input type="button" id="submit" value="Envoyer" class="btn btn-primary" />
                </p>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="fomulaire.js" type="text/javascript"></script>
</body>

</html>
