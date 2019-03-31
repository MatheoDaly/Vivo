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
  <br/>
  <div class="container">
    <div class="row">
      <div class="col-10 col-lg-6 bg-dark mx-auto text-light rounded" style="padding:20px;">
        <h1 class="border border-warning text-center">Création de menu</h1>
        <p>Un menu représente ce que vous voulez manger à un moment précis de la journée (petit déjeuner, repas du midi, colation, etc...). Il est composé de Plats, et un plat se définit (ou non) par une recette.</p>
        <div class="col-10 bg-light mx-auto text-dark rounded" style="padding:20px;">

          <form method='get' action="CreationMenuSuite.php">
            <div class="form-group">
              <label for="nbMenu">Veuillez indiquer le nombre de plat pour votre menu</label>
              <input type='number' class="form-control" name='nbRP'>

            </div>


            <?php

            //print_r($_SESSION['Menu']);

              //global $n;
              //echo('<form method="get" action="CreationMenu.php">');
              echo("<input type='submit' class='btn btn-primary' name='valNbMenu2' value='Continuer'>"); // On valide le nombre de plats
              echo('</form>');
              echo('</ul>');

            //if(isset($_GET['valNbMenu2'])){
            //  echo('<meta http-equiv="refresh" content="0; URL=CreationMenuSuite.php">');
            //}

              /*while($res = $data->fetch()){
                echo($res['nom']);
                echo('<a href="page_recette.php?id_recette=');
                echo($res['Id_Recette']);
                echo('">');
                echo(' Voir recette');
                echo('</a>');
              }
              echo('<br/>');
              echo('<a href="Choix_Aliment.php">Choisir ses aliments</a>');
              echo('<br/>');
              echo('<a href="recherche aliment.php">Créer une recette</a>');
              echo('<a href="tempo_stop.php">stop</a>');
              */



            ?>
          </form>
        </div>
      </div>
      <div class="col-10 col-lg-5 bg-dark mx-auto text-light rounded" style="padding:20px;">
        <h1 class="border border-warning text-center">Statistiques</h1>
      </div>
    </div>
  </div>


</body>

</html>
