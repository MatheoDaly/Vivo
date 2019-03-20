<?php
include_once "AccesBDbis.php";
session_start();
?>

    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="StyleBis.css" type="text/css">
        <title>Creation de menu</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
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
                        <a class="nav-link" href="../Profil/Profil.html">Profil</a>
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
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-10 col-lg-6 bg-dark mx-auto text-light rounded" style="padding:20px;">
                    <h1 class="border border-warning text-center">Création de menu</h1>
                    <p>Un menu représente ce que vous voulez manger à un moment précis de la journée (petit déjeuner, repas du midi, colation, etc...). Il est composé de Plats, et un plat se définit (ou non) par une recette.</p>
                    <div class="col-10 bg-light mx-auto text-dark rounded" style="padding:20px;">

                        <form method='get' action="CreationMenu.php">
                            <div class="form-group">
                                <label for="nbMenu">Veuillez indiquer le nombre de plat pour votre menu</label>
                                <input type='number' class="form-control" name='nbMenu'>
                                <input type='submit' class="btn btn-primary" name='valNbMenu'>
                            </div>
                        </form>

                        <?php
                        if(isset($_GET['nbMenu']) && isset($_GET['valNbMenu'])){
                        $i=1;
                        echo('<ul class="list-group">');
                        while($i<=$_GET['nbMenu']){
                            echo('<li class="list-group-item">');
                            echo "Recette ".$i;
                            echo('</li>');

                            $i+=1;

                        }
                        echo('</ul>');
                        }
            ?>
                    </div>
                </div>
                <div class="col-10 col-lg-5 bg-dark mx-auto text-light rounded" style="padding:20px;">
                    <h1 class="border border-warning text-center">Statistiques</h1>
                </div>
            </div>
        </div>


    </body>

    </html>
