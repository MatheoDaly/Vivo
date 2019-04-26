<?php
include_once "AccesBD_rechAl.php";
include_once "Fonctions_alim.php";
session_start();
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Style_RechAl.css" type="text/css">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
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
        <a href="CreationMenuSuite.php">Retour</a>
<?php
  $id = $_GET['id_aliment'];
  $bd=getBD();
  $line = $bd->query("SELECT * FROM Recette_Plat WHERE Id_Recette = $id");
  $res = $line->fetch();
  echo($res['nom']);
  echo('<br/>');
  echo($res['instructions']);
  echo('<br/>');
  echo('Apport calorique:');
  echo($res['kcal']);
  echo('kcal');
  echo('<br/>');
  // Maintenant on va chercher les ingrédients
  $query = "SELECT * FROM aliments,est_ingredient_de,recette_plat WHERE recette_plat.Id_Recette = $id AND alim_code = id_aliment AND est_ingredient_de.id_recette = recette_plat.Id_Recette ";
  $line2 = $bd->query($query);
  while($res2 = $line2->fetch()){
    echo($res2['alim_nom_fr']);
  }
  //$res-> closeCursor();
 ?>


</body>

</html>
