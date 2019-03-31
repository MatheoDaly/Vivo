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
        <p>Un menu représente ce que vous voulez manger à un moment précis de la journée (petit déjeuner, repas du midi, colation, etc...). Il est composé de recettes.</p>
        <div class="col-10 bg-light mx-auto text-dark rounded" style="padding:20px;">

          <form method='get' action="CreationMenuSuite.php">
            <div class="form-group">
              <label for="nbMenu">Veuillez indiquer le nombre de recettes pour votre menu</label>
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
  
  <h1 class="text-center">Nos recettes au top !</h1>
<div class="row text-center p-3 mx-auto">
 <?php
    $bd = getBD();
    $top5 = $bd->query("SELECT * FROM recette_plat LIMIT 5");
    $i = 1;
    while($ligne = $top5 ->fetch()){
        if($i == 1){
            echo '<div class="col-2 bg-primary text-light p-3 mx-auto m-2  rounded">';
        }else if($i ==2){
            echo '<div class="col-2 bg-info text-light p-3 mx-auto m-2 rounded">';
        }else if($i ==3){
            echo '<div class="col-2 bg-light p-3 m-2 mx-auto rounded">';
        }else if($i ==4){
            echo '<div class="col-2 bg-secondary text-light mx-auto p-3 m-2 rounded">';
        }else if($i ==5){
            echo '<div class="col-2 bg-dark text-light mx-auto p-3 m-2 rounded">';
        }
        echo '#'.$i;
        echo('<form method="GET" action="CreationMenu.php">');
        echo('<div class="form-group"><label for ="nbMenu">'.$ligne['nom'].'</label><input type="number" class="form-control" name="nbMenu" placeholder="Combien en voulez-vous ?"></div>');
        echo('<input type="submit" class="btn btn-primary" name="ajout2" value="Choisir"></form></div>');
        $i++;
    }
    $top5 ->CloseCursor();
 ?>
</div>
  <div class="partie_recherche bg-light rounded col-10 mx-auto text-center p-3">
    <form method="get" action="Choix_Menu.php" autocomplete="on" id="optionForm">
     <div class="form-group col-6 mx-auto">
      <input type="text"  class="form-control" name="Menu" placeholder="Laissez-vous guider par vos envies !">
    </div>
    <div class="form-check">
        <p>Options de recherche : </p>
      <label class="form-ckeck-label" for="popularite">Popularité : </label>
      <input class="form-check-label" type="radio" name="option" id = "popularite"value="Popularité" checked>
        <label class="form-ckeck-label" for="calorie">Calorie (croissant) : </label>
      <input type="radio" name="option" id="calorie"value="Calorie">
    </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Rechercher">
    </form>
  </div>
    <div class="bg-dark text-light col-10 mx-auto rounded p-3 mt-3">
    <h2 class="text-center m-3">Quelque chose vous intéresse ?</h2>
  <?php


  if(isset($_GET['submit']) || isset($_GET['Menu'])){
    if(empty($_GET['Menu'])){
      echo('<meta http-equiv="refresh" content="0;URL=Choix_Menu.php">');
    }else {
      $input=$_GET['Menu'];
      //$input = preg_replace("#[^0-9a-z]#i","",$input);
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%'");
      if ($_GET['option']== "Lipide"){
        $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
      }elseif ($_GET['option']== "Calorie") {
        $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
      }
      $_SESSION['Rec_Plat']=array();
      while($result = $reponse->fetch()){
        echo('<form method="GET" action="Choix_Aliment.php">');
        echo('<div class="form-group col-3 border border-warning p-2 rounded"><label for ="nbMenu">'.$result['alim_nom_fr'].'</label><input type="number" class="form-control" name="nbMenu" placeholder="Combien en voulez-vous ?"></div>');
        echo('<input type="submit" class="btn btn-primary" name="ajout2" value="Choisir">');
        if(isset($_SESSION['Rec_Plat'])){
          ajoutAlimInd($result['alim_nom_fr']);
        }else{
          $_SESSION['Rec_Plat']= $result['alim_nom_fr'];
        }
        echo('</form>');

      }
      $reponse-> closeCursor();
    }
  }

  ?>
    </div>


</body>

</html>
