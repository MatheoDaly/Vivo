<?php
include_once "AccesBD_rechAl.php";
include_once "Fonctions_alim.php";
session_start();
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Style_RechAl.css" type="text/css">
    <title>Creation de menu</title>
    <link rel="icon" type="image/png" href="../Image/Icon/icons8-aliments-sains-96.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script type="text/javascript" src="Camember.js"></script>
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
                <li class="nav-item">
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
    <br />
    <div class="container">
        <div class="row">
            <div class="col-10 col-lg-6 bg-dark mx-auto text-light rounded" style="padding:20px;">
                <h1 class="border border-warning text-center">Création de menu</h1>
                <p>Un menu représente ce que vous voulez manger à un moment précis de la journée (petit déjeuner, repas du midi, colation, etc...). Il est composé de recettes.</p>
                <div class="col-10 bg-light mx-auto text-dark rounded" style="padding:20px;">

                    <form method='get' action="CreationMenuSuite.php">
                        <div class="form-group">
                            <label for="nbMenu">Veuillez indiquer le nom de votre menu</label>
                            <input type='text' class="form-control" name='nomMenu'>
                        </div>
                        <?php
            echo("<input type='submit' class='btn btn-primary' name='valNbMenu2' value='Continuer'>"); // On valide le nombre de plats
            echo('</form>');
            echo('</ul>');
          ?>
                    </form>
                </div>
            </div>
            <div id="graph" class="col-10 col-lg-5 bg-dark mx-auto text-light rounded" style="padding:20px;">
                <h1 class="border border-warning text-center">Calories générées</h1>
                <div id="Ronds" width="400" height="400" class="row">
                    <canvas id="Rond" class="bg-white"></canvas>
                </div>
            </div>
        </div>
    </div>

    
   


</body>

</html>
