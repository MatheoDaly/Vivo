<!DOCTYPE html>
<html>

<head>
    <title>Vivo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.css" />
    <link href="../Outil/Style/Style.css" rel="stylesheet" />

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../index.html">Vivo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../Inscription/inscription.html">Inscription</a>
                </li>
            </ul>
            <span class="navbar-text">
                Pour une bonne santé vivez VIVO !
            </span>
        </div>
    </nav>
</header>

<body>
    <div id="Table" class="container rounded">
        <div class="">
            <h1>Connection</h1>
            <form class="row">

                <p class="col-6">
                    <strong>
                        Mail :
                    </strong>
                </p>
                <p class="col-6">
                    <strong>
                        Mot de passe :
                    </strong>
                </p>

                <input class="col-6 rounded" type="email" id="m" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" />
                <input class="col-6 rounded" type="password" id="mdp" name="mdp" value="<?php if(isset($_COOKIE['mdp'])){echo $_COOKIE['mdp'];}?>" />

                <p>
                    <input type="button" id='submit' class="btn btn-primary" value="Envoyer" />
                </p>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="connexion.js" type="text/javascript"></script>
</body>

</html>
