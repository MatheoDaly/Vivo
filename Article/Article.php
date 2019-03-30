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
    <title>Article</title>

</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="../index.html">Vivo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                </li>
            </ul>
            <span class="navbar-text">
                Pour une bonne santé vivez VIVO !
            </span>
        </div>
    </nav>
</header>

<body>


    <div class="container justify-content-center rounded" id="TableProfil">
        <div class="bg-white rounded row">
            <h2>Mes articles</h2>
        </div>
        <hr>
        <div class="row">
            <?php
            $req=$BD->query("SELECT * FROM article");
            while($ligne=$req->fetch()){ 
            ?>
            <div class="col-4 bg-white rounded">
                <a href="<?php echo $ligne["Url"]; ?>">
                    <?php echo $ligne["Nom"]; ?>
                </a><br />
                <?php if(null!=$ligne["LienSeuil"]){
                echo "Peux concerné ".$ligne["LienSeuil"];
            }?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>


</html>
