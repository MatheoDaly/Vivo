<?php
include_once "AccesBDbis.php";
session_start();
?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="StyleBis.css" type="text/css">
  <title></title>
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
  <div class="partie_recherche">
    <form method="get" action="recherche aliment.php" autocomplete="on" id="optionForm">
      <br/>
      <input type="text" name="Alim">
      <br/>
      Options de recherche:
      Populiarité:
      <input type="radio" name="option" value="Popularité" checked>
      Lipide (croissant):
      <input type="radio" name="option" value="Lipide">
      Calorie (croissant):
      <input type="radio" name="option" value="Calorie">
      <br/>
      <input type="submit" name="submit" value="Rechercher">
    </form>
  </div>

  <?php
  $bd = getBD();

  if(isset($_GET['submit']) || isset($_GET['Alim'])){
    if(empty($_GET['Alim'])){
      echo('<meta http-equiv="refresh" content="0;URL=recherche aliment.php">');
    }else {
      $input=$_GET['Alim'];
      //$input = preg_replace("#[^0-9a-z]#i","",$input);
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%'");
      if ($_GET['option']== "Lipide"){
        $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
      }elseif ($_GET['option']== "Calorie") {
        $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
      }

      while($result = $reponse->fetch()){
        echo($result['alim_nom_fr']);
        echo('<br />');
        echo('<div class="rechAlim">');
        echo('<form method="GET" action="ajouter.php">');
        echo('<input type="number" name="nbArt">');
        echo('<input type="submit" name="ajout" value="Ajouter à votre panier.">');
        echo('</form>');
        echo('</div>');

      }
      $reponse-> closeCursor();
    }

  }


  ?>
</body>
</html>
