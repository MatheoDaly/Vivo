<!doctype html>
<?php
include("Outil/IsTest.php");
?>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="index.css" rel="stylesheet" type="text/css">
    <title>Vivo</title>
    <link rel="icon" type="image/png" href="Image/Icon/icons8-aliments-sains-96.png" />
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
                    <a class="nav-link active" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Article/Article.php">Nos articles</a>
                </li>
                <?php if(isset($_SESSION['profil']) && !$testGene){ ?>
                <li class="nav-item active">
                    <a class="nav-link" href="Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="disconnect" href="Deconnexion.php">Deconnexion</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="Inscription/inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Connection/connexion.php">Connexion</a>
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
    <img src="Image/head.png" class="img-responsive w-100" />
    <div class="container-fluid" style="background-color: rgb(5, 164, 180); width: 100%; margin: 0;">
       <?php 
        if(isset($_SESSION['profil']) && !$testGene){
            echo '<a href ="Profil/Profil.php">';
            echo '<div class="row padding-left">';
            echo '<img src="Image/avatar-1295406_640.png" class="img-responsive" style="margin-top: 50px;" />';
            echo '<h3 style="color: white; margin-top: 50px">Accédez à votre profil</h3>';
            echo '</div>';
        echo '</a>';
        }else{
            echo '<a href="Connection/connexion.php" style="text-decoration:none;">';
            echo '<div class="row padding-left">';
            echo '<img src="Image/avatar-1295406_640.png" class="img-responsive" style="margin-top: 50px;" />';
            echo '<h3 style="color: white; margin-top: 50px">Connectez vous à votre profil</h3>';
            echo '</div>';
            echo '</a>';  
        }
            ?>
        <div class="row justify-content-end">
            <h3 style="color: white; margin-right: 100px;">Suivez nous sur...</h3>
        </div>
        <div class="row justify-content-end">
            <div class=" col-3">
                <img src="Image/facebook.png" class="img-responsive float-left padding-right" style="width: 100%" />
            </div>
            <div class="col-3">
                <img src="Image/twitter.png" class="img-reponsive padding-right" style="width: 100%" />
            </div>
            <div class="col-3">
                <img src="Image/instagram.png" class="img-responsive padding-right" style="width: 100%" />
            </div>
        </div>
        <div class="row justify-content-sm-center">
            <a href ="Inscription/inscription.php" style="text-decoration:none;"><div class="col-6 padding-right">
                <h3 style="text-align: center; color: white">Inscrivez-vous dès maintenant !</h3>
                <h4 style="text-align: center; color: white">Une inscription rapide et garantie sans spam</h4>
                <h4 style="text-align: center; color: white">Commencez votre nouvelle vie dès aujourd'hui !</h4>
                <img src="Image/sign-up-1922238_1280.png" class="img-responsive center-div" style="width: 100%" />
                </div></a>
        </div>
    </div>
    <div class="container-fluid" style="background-image:linear-gradient(#10C4DB, #09B0C2); width: 100%; margin: 0;">
        <a href="RechercheAliment/Choix_Menu.php" style="text-decoration:none;">
        <div class="row justify-content-end">
           <div class="col-sm-6 col-xs-12 col-md-3 padding-right">
                <img src="Image/list-2389219_640.png" class="img-responsive center-div" style="margin-top: 100px; width: 70%" />
                <h3 style="text-align: center">Des menus personnalisés</h3>
                <h4 style="text-align: center; color: white">Des menus personnalisables pour chacuns !</h4>
                <h4 style="text-align: center; color: white">Choisissez vos préférences alimentaires !</h4>
                <h4 style="text-align: center; color: white">Choisissez vos objectifs de poids ! </h4>
            </div>
            </div></a>
            <a href ="RechercheAliment/CreationMenu.php" style="text-decoration:none;">
        <div class="row justify-content-start padding-left">
            <div class="col-sm-6 col-xs-12 col-md-3">
                <img src="Image/battle-3550533_640.png" class="img-responsive center-div" style="width: 70%" />
                <h3 style="text-align: center">Ou composez votre propre menu !</h3>
                <h4 style="text-align: center; color: white">Choisissez parmi un large panel d'aliments !</h4>
                <h4 style="text-align: center; color: white">Calories automatiquement calculées !</h4>
                <h4 style="text-align: center; color: white">Macro-nutriments journaliers mis à jour ! </h4>
            </div>
                </div></a>
    </div>
    <div class="container-fluid" style="background-color: #12CBE4; width: 100%; margin: 0;">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 style="text-align: center">Créez votre profil !</h3>
                <h4 style="text-align: center; color: white">N'hésitez plus, le bonheur n'attends pas !</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5">
                <img src="Image/avatar-2191932_1920.png" class="img-responsive padding-left center-div" style="width: 100%" />
            </div>
        </div>
        <div class="row justify-content-sm-center">
            <div class="col-md-4 col-xs-12">
                <h4 style="text-align: center; color: white">Inscription gratuite</h4>
                <img src="Image/shopping-1724299_640.png" class="img-responsive padding-left center-div" style="width: 50%" />
            </div>
            <div class="col-md-4 col-xs-12">
                <h4 style="text-align: center; color: white">Mettez à jour votre profil à tout moment</h4>
                <img src="Image/reload-2398777_640.png" class="img-responsive padding-left center-div" style="width: 50%" />
            </div>
            <div class="col-md-4 col-xs-12">
                <h4 style="text-align: center; color: white">Visualisez toutes vos statstiques personnelles en un clic !</h4>
                <img src="Image/gui-2311261_640.png" class="img-responsive padding-left center-div" style="width: 50%" />
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
