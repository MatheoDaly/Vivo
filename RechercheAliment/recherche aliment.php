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
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#">Vivo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Statistique</a>
        </li>
      </ul>
      <span class="navbar-text">
        Pour une bonne santé vivez VIVO !
      </span>
    </div>
  </nav>

  <form method="get" action="recherche aliment.php" autocomplete="off">
    <br/>
    Recherche:
    <input type="text" name="Alim">
    Options de recherche:
    Populiarité:
    <input type="radio" name="option" value="Popularité" checked>
    Lipide (croissant):
    <input type="radio" name="option" value="Lipide">
    Calorie (croissant):
    <input type="radio" name="option" value="Calorie">
  </form>

  <?php
  $bd = getBD();
  if(isset($_GET['Alim'])){
    $input = $_GET['Alim'];
    //$input = preg_replace("#[^0-9a-z]#i","",$input);
    $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%'");
    if ($_GET['option']== "Lipide"){
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
    }elseif ($_GET['option']== "Calorie") {
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
    }
    while($result = $reponse->fetch()){
      echo(utf8_encode($result['alim_nom_fr']));
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
  echo('<div class="creaRecette">');
  echo('Composer votre recette: ');
  echo('<form method="POST" action="planification.html" id="instr">');
  echo('<textarea name="instructions" form="instr" rows="4" cols="85">');
  echo('Composer votre recette: ');
  echo('</textarea>');
  echo('</form>');
  echo('</div>');
  ?>
</body>
</html>
