<?php 
//https://www.inserm.fr/actualites-et-evenements/actualites/recommandations-programme-national-nutrition-sante-bonnes-pour-coeur
//http://www.sante-et-nutrition.com/
//http://www.sante-et-nutrition.com/


//https://www.sante-sur-le-net.com/nutrition-bien-etre/nutrition/besoins-energetiques/

include('../Outil/Php/AccesBD.php');
$BD=GetBD();
?>
<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Profil/Profil.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- adapatation pour internet exploreur car graphique !-->
    <title>Vivo</title>
    <link rel="icon" type="image/png" href="../Image/Icon/icons8-aliments-sains-96.png" />

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
                    <a class="nav-link active" href="../Article/Article.php">Nos articles</a>
                </li>
                <?php if(isset($_SESSION['profil']) && !$testGene){ ?>
                <li class="nav-item active">
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
                    <a class="nav-link" href="../Connection/connexion.php">Connexion</a>
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
    <div class="col-10 mx-auto text-center">
        <img src="../Image/Icon/icons8-nouvelles-128.png"/>
        <h1 style="text-align:center;">Mes articles</h1>
    </div>
    <div class="container text-center rounded" id="TableProfil">
        <div class="row p-3 mx-auto">
            <?php
            $req=$BD->query("SELECT * FROM article");
            $i=0;
            while($ligne=$req->fetch()){ 
            ?>
            <div class="col-5 bg-white rounded text-center m-1 p-3">
                <a href="<?php echo $ligne["Url"]; ?>">
                    <?php echo $ligne["Nom"]; ?>
                    <img src="../Image/Article/Article<?php echo $i%2; $i++; ?>.png" style="width:150px; height:150px" alt="Article<?php echo $i%2; ?>">
                </a><br />
            </div>
            <?php } ?>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>


</html>
