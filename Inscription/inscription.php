<!DOCTYPE html>
<html>

<head>
    <title>Vivo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>


<body>
    <h1>Inscription</h1>

    <form method="get" action="profil.php" autocomplete="off">
        <div>
            <div>
                <p>
                    Utilisateur :<input type="text" name="utilisateur" value="" />
                </p>
                <p>
                    Prenom :<input type="text" name="prenom" value="" />
                </p>
                <p>
                    E-mail :<input type="text" name="email" value="" />
                </p>
                <p>
                    Homme :<INPUT type="radio" name="genre" value="M" />
                </p>
                <p>
                    Femme :<INPUT type="radio" name="genre" value="F" />
                </p>
                <p>
                    Poid (kg) :<input type="number" name="poids" value="" />
                </p>
                <p>
                    Taille (cm) :<input type="number" name="taille" value="" />
                </p>
                <p>
                    Mot de passe :<input type="password" name="mdp" value="" />
                </p>
                <p>
                    Confirmation du passe :<input type="password" name="mdp2" value="" />
                </p>
            </div>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </div>
    </form>
</body>

</html>
