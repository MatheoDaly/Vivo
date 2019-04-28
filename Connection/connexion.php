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
        <a class="navbar-brand" href="index.php">Vivo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Article/Article.php">Nos articles</a>
                </li>
                <?php if(isset($_SESSION['profil']) && !$testGene){ ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="disconnect" href="../Deconnexion.php">Deconnexion</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Inscription/inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="../Connection/connexion.php">Connexion</a>
                </li>
                <?php } ?>
                

            </ul>
            <span class="navbar-text">
                Pour une bonne santé vivez VIVO !
            </span>
        </div>
    </nav>
</header>

<body>
   <div class="text-center">
       <img src="../Image/Icon/icons8-connexion-96.png"/>
   </div>
    <h1 style="text-align:center;">Connexion</h1>
    <div class="container rounded mx-auto" style="background-color: rgba(0, 0, 0, 0.6);">
        <br>
        <div class="container bg-white rounded text-center">
            <form class="row p-2">


                <div class="col-6 rounded">
                    <p class="col-12">
                        <strong>
                            Mail :
                        </strong>
                    </p>
                    <input class="col-12 rounded form-control" type="email" id="m" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" />
                </div>
                <div class="col-6 rounded">
                    <p class="col-12">
                        <strong>
                            Mot de passe :
                        </strong>
                    </p>
                    <input class="col-12 rounded form-control" type="password" id="mdp" name="mdp" value="<?php if(isset($_COOKIE['mdp'])){echo $_COOKIE['mdp'];}?>" />
                </div>

                <p class="col-12 m-2">
                    <button class="btn btn-primary"><a href="../Inscription/inscription.php" class="text-white">S'inscrire ?</a></button>
                    <input type="button" id='submit' class="btn btn-primary" value="Se connecter ?" />
                </p>
            </form>
        </div>
        <br>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="connexion.js" type="text/javascript"></script>
</body>

</html>
