<?php
include_once "AccesBD_rechAl.php";
include_once "Fonctions_alim.php";
session_start();
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
=======
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
>>>>>>> Stashed changes
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../style.css">
  <title>ok</title>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <div class="col-10 bg-light mx-auto text-dark rounded" id="labelName" style="padding:20px;">
<<<<<<< Updated upstream
          </div>
        </div>
        <div class="col-10 col-lg-5 bg-dark mx-auto text-light rounded" style="padding:20px;">
          <h1 class="border border-warning text-center">Statistiques</h1>
=======
>>>>>>> Stashed changes
        </div>
      </div>
      <div class="col-10 col-lg-5 bg-dark mx-auto text-light rounded" style="padding:20px;">
        <h1 class="border border-warning text-center">Statistiques</h1>
      </div>
    </div>
  </div>
  <h1 class="text-center">Nos recettes au top !</h1>
  <div class="row text-center p-3 mx-auto">
<<<<<<< Updated upstream
      <?php
      echo('<br/>');
      echo('<a href="tempo_stop.php">Annuler</a>');
      echo('<form method="GET" action="toto.php" >');
         $bd = getBD();
         $top5 = $bd->query("SELECT * FROM recette_plat LIMIT 5");
         while ( $prd_top5 = $top5->fetchObject() ){
         $avecNB1 = strval("1"."¨".$prd_top5->nom);
         echo ('<input name="');
         echo ($avecNB1);
         echo('" type="checkbox" value="');
         echo($prd_top5->Id_Recette);
         echo('" id="');
         echo($prd_top5->Id_Recette);
         echo('">');
         echo('<label for="');
         echo($prd_top5->Id_Recette);
         echo('">');
         echo($prd_top5->nom);
         echo('</label>');
         echo('<br/>');
         }
         //ATTETION !!! : le modèle de la checkbox doit suivre le schema suivant : <input type="checkbox" name="nom recette" id="id recette"><label for="id recette">nom recette</label>

      $tabali = $_SESSION['Rec_Plat'];
      for ($i=0; $i < sizeof($tabali); $i++) {
=======
    <?php
    echo('<br/>');
    echo('<a href="Choix_Aliment.php">Choisir ses aliments</a>');
    echo('<br/>');
    echo('<a href="rechercheAliment.php">Créer une recette</a>');
    echo('<br/>');
    echo('<a href="tempo_stop.php">Annuler</a>');
    echo('<form method="GET" action="toto.php" >');
    $bd = getBD();
    $top5 = $bd->query("SELECT * FROM recette_plat LIMIT 5");
    while ( $prd_top5 = $top5->fetchObject() ){
      $avecNB1 = strval("1"."¨".$prd_top5->nom);
      echo ('<input name="');
      echo ($avecNB1);
      echo('" type="checkbox" value="');
      echo($prd_top5->Id_Recette);
      echo('" id="');
      echo($prd_top5->Id_Recette);
      echo('">');
      echo('<label for="');
      echo($prd_top5->Id_Recette);
      echo('">');
      echo($prd_top5->nom);
      echo('</label>');
      echo('<a href="page_recette.php?id_recette=');
      echo($prd_top5->Id_Recette);
      echo('">');
      echo(' Voir recette ');
      echo('</a>');
      echo('<br/>');
    }
    //ATTETION !!! : le modèle de la checkbox doti suivre le schema suivant : <input type="checkbox" name="nom recette" id="id recette"><label for="id recette">nom recette</label>

    $tabali = $_SESSION['Rec_Plat'];
    for ($i=0; $i < sizeof($tabali); $i++) {
>>>>>>> Stashed changes
      $avecNB = strval($tabali[$i]['nb'])."¨".$tabali[$i]['nom'];
      echo ('<input name="');
      echo ($avecNB);
      echo('" type="checkbox" value="');
      echo($tabali[$i]['id']);
      echo('" id="');
      echo($tabali[$i]['id']);
      echo('">');
      echo('<label for="');
      echo($tabali[$i]['id']);
      echo('">');
      echo($tabali[$i]['nom']);
      echo('</label>');
<<<<<<< Updated upstream
       echo('<br/>');
        // echo $tabali[$i]['nb'];
       $avecNB = '';
      }
      echo('<input type=submit value="envoyer">');
      echo('</form>');
      ?>
    </div>
    <?php
    $bd = getBD();
        if(isset($_GET['submit1']) || isset($_GET['Menu']) ){
          if(empty($_GET['Menu'])){
            echo('<meta http-equiv="refresh" content="0;URL=CreationMenuSuite.php">');
          }else {
            $input=$_GET['Menu'];
            //$input = preg_replace("#[^0-9a-z]#i","",$input);
            $reponse = $bd->query( "SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' " );
            if ($_GET['option']== "Lipide"){
              $reponse = $bd->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
            }else if ($_GET['option']== "Calorie") {
              $reponse = $bd->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
            }
            if(!isset($_SESSION['Rec_Plat'])){
              $_SESSION['Rec_Plat'] = array();
            }
          }
          while($result = $reponse->fetch()){
            echo('<form method="GET" action="ajoutAlimInd.php">');
            echo($result['alim_nom_fr']);
            echo('<br />');
            echo('<div class="rechAlim">');
            echo('<input type="hidden" name="id_aliment" value="');
            $a = $result['alim_code'];
            echo($a);
            echo('">');
            echo('<input type="hidden" name="nom_aliment" value="');
            $nom = $result['alim_nom_fr'];
            echo($nom);
            echo('">');
            echo('<input type="number" name="nbAl">');
            echo('<input type="submit" name="choix" value="Choisir">');
            echo('</div>');
            echo('</form>');
          }
          $reponse-> closeCursor();
        }
         ?>
    <div class="partie_recherche bg-light rounded col-10 mx-auto text-center p-3">
      <form method="get" action="CreationMenuSuite.php" autocomplete="on" id="optionForm">
       <div class="form-group col-6 mx-auto">
=======
      echo('<br/>');
      // echo $tabali[$i]['nb'];
      $avecNB = '';
    }
    echo('<input type=submit value="envoyer">');
    echo('</form>');
    ?>
  </div>
  <div class="partie_recherche bg-light rounded col-10 mx-auto text-center p-3">
    <form method="get" action="CreationMenuSuite.php" autocomplete="on" id="optionForm">
      <div class="form-group col-6 mx-auto">
>>>>>>> Stashed changes
        <input type="text"  class="form-control" name="Menu" placeholder="Laissez-vous guider par vos envies !">
      </div>
      <div class="form-check">
        <input type="radio" name="al" value="Aliment">
        <input type="radio" name="re" value="Recette">
        <p>Options de recherche : </p>
        <label class="form-ckeck-label" for="popularite">Popularité : </label>
        <input class="form-check-label" type="radio" name="option" id = "popularite"value="Popularité" checked>
        <label class="form-ckeck-label" for="calorie">Calorie (croissant) : </label>
        <input type="radio" name="option" id="calorie"value="Calorie">
      </div>
<<<<<<< Updated upstream
        <input type="submit" class="btn btn-primary" name="submit" value="Rechercher">
      </form>
    </div>
    <div class="bg-dark text-light col-10 mx-auto rounded p-3 mt-3">
=======
      <input type="submit" class="btn btn-primary" name="submit1" value="Rechercher">
    </form>
  </div>
  <div class="bg-dark text-light col-10 mx-auto rounded p-3 mt-3">
>>>>>>> Stashed changes
    <h2 class="text-center m-3">Quelque chose vous intéresse ?</h2>
    <?php


    if(isset($_GET['submit']) && isset($_GET['al']) && isset($_GET['Menu'])){
      echo($_GET['Menu']);
      if(empty($_GET['Menu'])){
        echo('<meta http-equiv="refresh" content="0;URL=CreationMenuSuite.php">');
      }else {
        $input=$_GET['Menu'];
        //$input = preg_replace("#[^0-9a-z]#i","",$input);
        $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%'");
        if ($_GET['option']== "Lipide"){
          $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
        }elseif ($_GET['option']== "Calorie") {
          $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
        }

<<<<<<< Updated upstream


=======
>>>>>>> Stashed changes
        $_SESSION['Rec_Plat']=array();

        //  DEPLACEMENT DE CHOIX_ALIMENT.php
        $bd = getBD();
        if(isset($_GET['submit1']) || isset($_GET['Menu']) ){

          if(empty($_GET['Menu'])){
            echo('<meta http-equiv="refresh" content="0;URL=CreationMenuSuite.php">');
          }else {
            $input=$_GET['Menu'];
            //$input = preg_replace("#[^0-9a-z]#i","",$input);
            $reponse = $bd->query( "SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' " );



            if ($_GET['option']== "Lipide"){
              $reponse = $bd->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
            }else if ($_GET['option']== "Calorie") {
              $reponse = $bd->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
            }

            if(!isset($_SESSION['Rec_Plat'])){
              $_SESSION['Rec_Plat'] = array();
            }
          }

          while($result = $reponse->fetch()){
            echo('<form method="GET" action="ajoutAlimInd.php">');
            echo($result['alim_nom_fr']);
            echo('<br />');
            echo('<div class="rechAlim">');
            echo('<input type="hidden" name="id_aliment" value="');
            $a = $result['alim_code'];
            echo($a);
            echo('">');
            echo('<input type="hidden" name="nom_aliment" value="');
            $nom = $result['alim_nom_fr'];
            echo($nom);
            echo('">');
            echo('<input type="number" name="nbAl">');
            echo('<input type="submit" name="choix" value="Choisir">');

            echo('</div>');
            echo('</form>');
          }
          $reponse-> closeCursor();
        }

        //  DEPLACEMENT DE CHOIX_ALIMENT.php
        while($result = $reponse->fetch()){
          echo('<form method="GET" action="CreationMenuSuite.php">');
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
    //////////////////////////////////////////////////////////////////////////////////////
    elseif (isset($_GET['submit']) && isset($_GET['re'] && isset($_GET['Menu']))) {
      echo($_GET['Menu']);
      if(empty($_GET['Menu'])){
        echo('<meta http-equiv="refresh" content="0;URL=CreationMenuSuite.php">');
      }else {
        $input=$_GET['Menu'];
        //$input = preg_replace("#[^0-9a-z]#i","",$input);
        $reponse = $bd->query("SELECT nom FROM recette_plat WHERE nom LIKE '%$input%'");
        if ($_GET['option']== "Lipide"){
          $reponse = $bd->query("SELECT nom FROM recette_plat WHERE nom LIKE '%$input%' ORDER BY Lipides_g100g");
        }elseif ($_GET['option']== "Calorie") {
          $reponse = $bd->query("SELECT nom FROM recette_plat WHERE nom LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
        }
        $_SESSION['Rec_Plat']=array();

        //  DEPLACEMENT DE CHOIX_ALIMENT.php

<<<<<<< Updated upstream
    ?>
      </div>
  <script src="app.js">

=======

        $bd = getBD();
        if(isset($_GET['submit1']) || isset($_GET['Menu']) ){

          if(empty($_GET['Menu'])){
            echo('<meta http-equiv="refresh" content="0;URL=CreationMenuSuite.php">');
          }else {
            $input=$_GET['Menu'];
            //$input = preg_replace("#[^0-9a-z]#i","",$input);
            $reponse = $bd->query( "SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' " );



            if ($_GET['option']== "Lipide"){
              $reponse = $bd->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
            }else if ($_GET['option']== "Calorie") {
              $reponse = $bd->query("SELECT * FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
            }

            if(!isset($_SESSION['Rec_Plat'])){
              $_SESSION['Rec_Plat'] = array();
            }
          }

          while($result = $reponse->fetch()){
            echo('<form method="GET" action="ajoutAlimInd.php">');
            echo($result['alim_nom_fr']);
            echo('<br />');
            echo('<div class="rechAlim">');
            echo('<input type="hidden" name="id_aliment" value="');
            $a = $result['alim_code'];
            echo($a);
            echo('">');
            echo('<input type="hidden" name="nom_aliment" value="');
            $nom = $result['alim_nom_fr'];
            echo($nom);
            echo('">');
            echo('<input type="number" name="nbAl">');
            echo('<input type="submit" name="choix" value="Choisir">');

            echo('</div>');
            echo('</form>');
          }
          $reponse-> closeCursor();
    }
    ?>
  </div>
  <script src="app.js">

>>>>>>> Stashed changes
  </script>
</body>
