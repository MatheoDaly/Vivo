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
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
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
   <div class="partie_recherche bg-light rounded col-10 mx-auto text-center p-3">
    <form method="get" action="rechercheAliment.php" autocomplete="on" id="optionForm">
    <img src="../Image/Icon/icons8-ingr%C3%A9dients-96.png" class="w-30"/>
       <h2>Recherchez un Aliment !</h2>
     <div class="form-group col-6 mx-auto">
      <input type="text"  class="form-control" name="Alim" placeholder="Laissez-vous guider par vos envies !">
      </div>
      <div class="form-check">
        <p>Options de recherche : </p>
      <label class="form-ckeck-label" for="popularite">Popularité : </label>
      <input class="form-check-label" type="radio" name="option" id = "popularite"value="Popularité" checked>
      <label class="form-ckeck-label" for="calorie">Lipides (croissant) : </label>
      <input type="radio" name="option" id="calorie"value="Lipide">
      <label class="form-ckeck-label" for="calorie">Calorie (croissant) : </label>
      <input type="radio" name="option" id="calorie"value="Calorie">
        </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Rechercher">
    </form>
  </div>

  <div class="bg-dark text-light col-10 mx-auto rounded p-3 mt-3">
    <h2 class="text-center m-3">Quelque chose vous intéresse ?</h2>

    <?php
  $bd = getBD();

  if(isset($_GET['submit']) || isset($_GET['Alim'])){
    if(empty($_GET['Alim'])){
      echo('<meta http-equiv="refresh" content="0;URL=rechercheAliment.php">');
    }else {
      $input=$_GET['Alim'];
      //$input = preg_replace("#[^0-9a-z]#i","",$input);
      $reponse = $bd->query("SELECT aliments.alim_nom_fr, aliments.alim_code, regime.Nom FROM regime,regime_profil, profil, aliments, regime_sans_aliment
                            WHERE regime_profil.id_Profil=profil.id
                            AND regime_profil.id_Regime=regime.id
                            AND profil.id = 1
                            AND regime_sans_aliment.id_Regime = regime.id
                            AND regime_sans_aliment.id_Aliment = aliments.alim_code
                            AND alim_nom_fr LIKE '%$input%'");
      if ($_GET['option']== "Lipide"){
        $reponse = $bd->query("SELECT aliments.alim_nom_fr, aliments.alim_code, regime.Nom FROM regime,regime_profil, profil, aliments, regime_sans_aliment
                                WHERE regime_profil.id_Profil=profil.id
                                AND regime_profil.id_Regime=regime.id
                                AND profil.id = 1
                                AND regime_sans_aliment.id_Regime = regime.id
                                AND regime_sans_aliment.id_Aliment = aliments.alim_code
                                AND alim_nom_fr LIKE '%$input%' ORDER BY Lipides_g100g");
      }elseif ($_GET['option']== "Calorie") {
        $reponse = $bd->query("SELECT aliments.alim_nom_fr, aliments.alim_code, regime.Nom FROM regime,regime_profil, profil, aliments, regime_sans_aliment
                                WHERE regime_profil.id_Profil=profil.id
                                AND regime_profil.id_Regime=regime.id
                                AND profil.id = 1
                                AND regime_sans_aliment.id_Regime = regime.id
                                AND regime_sans_aliment.id_Aliment = aliments.alim_code
                                AND alim_nom_fr LIKE '%$input%' ORDER BY Energie_Règlement_UE_N°_11692011_kcal100g");
      }

      if(!isset($_SESSION['Recette'])){
        $_SESSION['Recette'] = array();
      }

      while($result = $reponse->fetch()){
        echo '<div class="row"><div class="col-6">';
        echo('<form method="GET" action="ajoutAlimRecette.php">');
        echo('<div class="form-group col-6 border border-warning p-2 rounded"><label for ="nbAlim">'.$result['alim_nom_fr'].'</label><input type="number" class="form-control" name="nbAlim" placeholder="Combien en voulez-vous ?"></div>');
        $nom = $result['alim_nom_fr'];
        echo('<input type="hidden" name="nom_aliment" value="');
        echo($nom);
        echo('">');
        $id_al = $result['alim_code'];
        echo('<input type="hidden" name="id_aliment" value="');
        echo($id_al);
        echo('">');
        echo('<input type="submit" class="btn btn-primary" name="ajout2" value="Choisir pour la recette">');
        echo('</form></div>');
        echo '<div class="col-6">';
        $regime = $bd ->query('SELECT DISTINCT regime.Nom, regime.urlRegime FROM regime_sans_aliment, regime WHERE regime_sans_aliment.id_Aliment ='.$result['alim_code'].' AND regime.id = regime_sans_aliment.id_Regime');
        while($ligne = $regime ->fetch()){
            echo '<img src="../Image/Regime/'.$ligne['urlRegime'].'">';
            echo $ligne['Nom'];
        }
         echo '</div></div>' ;
          $regime->closeCursor();
      }
      $reponse-> closeCursor();

    }

  }
    ?>
    <div class ="row">
    <div class="col-5 m-1">
    <form action="crea_recette_suite.php" method="get">
        <?php
  echo('<input type="text" class = "form-control" name="nomRecette" id="nomRecette" placeholder="Nom de la recette">');
  ?>
        <textarea name="instructions"  class="form-control"rows="10" id="instructions" cols="85">
 Composer votre recette:
        </textarea>
        <input type='submit' class = "btn btn-primary" value='Valider la recette'>
    </form>
        </div>
        <div class="col-5 m-1">
    <?php
  if (isset($_SESSION['Recette'])){
  
  echo('Vous avez choisit : ');
  echo '<ul class="list-group text-dark">';
  $i=0;
  while($i<sizeof($_SESSION['Recette'])){
    $panier = $_SESSION['Recette'][$i]['nom'];
    $poids = $_SESSION['Recette'][$i]['nb'];
    echo '<li class="list-group-item">'.$panier.' ('.$poids.' g)<img src="../Image/Icon/icons8-approbation-48.png" class="w-5"/></li>';
    $i=$i+1;
  }
      echo '</ul>';
  }      
            
    if(!empty($_SESSION['Recette'])){
        echo'<form method="GET" action="videPanier.php">';
        echo'<button class="btn btn-info">Vider mon panier</button>';
        echo'</form>';
    }
    ?>
        </div>
      </div>
    <a href="CreationMenuSuite.php">Retour</a>
    </div>
    <script src="../Outil/JS/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="rechercheAliment.js" type="text/javascript"></script>

</body>

</html>
