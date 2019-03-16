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
  <div class="partie_recherche">
    <form method="get" action="recherche aliment.php" autocomplete="on" id="optionForm">
      <br/>
      Recherche:
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
      Ou bien cherchez par catégorie:
      <select name="categorie" form="optionForm">
        <option value="">Sans catégorie</option>
        <option value="entrees et plats composes">Entrées et plats composés</option> <!-- il y en a 308 dans la base -->
        <option value="fruits, legumes, legumineuses et oleagineux">Fruits, légumes, légumineuses et oléagineux</option>
        <option value="produits cerealiers">Produits céréaliers</option>
        <option value="viandes, œufs, poissons">Viandes, œufs, poissons</option>
        <option value="lait et produits laitiers">Lait et produits laitiers</option>
        <option value="boissons">Boissons</option>
        <option value="produits sucrés">Produits sucrés</option>
        <option value="glaces et sorbets">Glaces et sorbets</option>
        <option value="matières grasses">Matières grasses</option>
        <option value="aides culinaires et ingrédients divers">Aides culinaires et ingrédients divers</option>
        <option value="aliments infantiles">Aliments infantiles</option> <!-- il y en a 36 dans la base -->
      </select>
      <input type="submit" name="submit" />
    </form>
  </div>

  <?php
  $bd = getBD();
  // Recherche pour les option 1 et deux
  //$bd = exec("SET NAMES 'UTF8'"); marche pas
  $categorie = $_GET['categorie'];
  if(isset($_GET['submit'])){
    if(isset($_GET['Alim'])){

    $input = $_GET['Alim'];
    //$input = preg_replace("#[^0-9a-z]#i","",$input);
    $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%'");
    if ($_GET['option']== "Lipide"){
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
    }elseif ($_GET['option']== "Calorie") {
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
    }
  }elseif (isset($_GET['categorie'])) {
      $ajoutcat = $_GET['categorie'];
      $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE groupe = $ajoutcat LIMIT 10");
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
