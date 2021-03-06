<?php
include_once "AccesBD_rechAl.php";
include_once "Fonctions_alim.php";
session_start();
?>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Style_RechAl.css" type="text/css">
    <title>Vivo</title>
    <link rel="icon" type="image/png" href="../Image/Icon/icons8-aliments-sains-96.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../index.php">Vivo</a>
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
    <div class="partie_recherche">
        <form method="get" action="Choix_Aliment.php" autocomplete="off" id="optionForm">
            <br />
            <input type="text" name="Alim">
            <br />
            Options de recherche:
            Populiarité:
            <input type="radio" name="option" value="Popularité" checked>
            Lipide (croissant):
            <input type="radio" name="option" value="Lipide">
            Calorie (croissant):
            <input type="radio" name="option" value="Calorie">
            <br />
            <input type="submit" name="submit" value="Rechercher">
        </form>
        <a href="CreationMenuSuite.php">Retour</a>
    </div>

    <?php
    $bd = getBD();
    if(isset($_GET['submit']) || isset($_GET['Alim']) ){

    if(empty($_GET['Alim'])){
      echo('<meta http-equiv="refresh" content="0;URL=CreationMenuSuite.php">');
    }else {
      $input=$_GET['Alim'];
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
print_r($_SESSION['Rec_Plat']);
echo('Vous avez choisi');
echo('<br/>');
$i=0;
while($i<sizeof($_SESSION['Rec_Plat'])){
  $panier = $_SESSION['Rec_Plat'][$i]['nom'];
  echo $panier;
  echo('<br/>');
  $i=$i+1;
}



  ?>
    <a href="CreationMenuSuite.php">Valider</a>
</body>

</html>
