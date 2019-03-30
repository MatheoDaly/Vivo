<?php 
//https://www.inserm.fr/actualites-et-evenements/actualites/recommandations-programme-national-nutrition-sante-bonnes-pour-coeur
//http://www.sante-et-nutrition.com/
//http://www.sante-et-nutrition.com/

/*
Faire des calcul selon la motivation dite de la personne, la psychologie sur le temps (evennement), sa corpulance et ces caracteristique santé (diabete, .. quelque liste de maladie). 

https://www.sante-sur-le-net.com/nutrition-bien-etre/nutrition/besoins-energetiques/

Fonction :
Moyenne des masses gagne ou perdu
Avec intervale de confiance à exploiter
1g  = 9 calories


Ce qui reste à faire 
Fin ajax modification profil
Donut a finir dans statitisques -> juan
prevention
Article
Bulle js des repas et menue
Notion de seuil -> concentration

    
    Lien statstistique et 
    prevention -> prevision; alerte pour des taux moyens grands
    Si grands 


Idée est de faire parvenir tous les aliment issu d'un historique aliment, mais il y aura un historique regime aussi, ou au boud de semaine on ne garde plus les repas recu mais la moyenne des taux de glucose, etc par semaine...

Plus effectuer quand aliment est apprecier faire qu'il passe en preferance..

Moindre carre !

*/
session_start();

$test=false;
// Variable :
if(isset($_SESSION['profil'])){
    $Profil=$_SESSION['profil'];
} else {
    $Profil=array('ID'=>1, 'prenom'=>'Paul', 'mail'=>'Paul@jeMangeTrop.com', 'poids'=>120, 'taille'=>170, 'user'=>'GrosPaul','genre'=>'M', 'mdp'=>'CestPasDeMaFaute', 'photo'=>'NoPic', 'actualisation'=>'20-03-2019','point'=>0);
}

include('../../Outil/Php/AccesBD.php');
?>
<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../Profil/Profil.css" rel="stylesheet">
    <link href="Statistique.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- adapatation pour internet exploreur car graphique !-->
    <title>Statistique <?php if(isset($Profil)){
    echo ' de '.$Profil[1];
    }
        ?></title>

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
        <div>
            <h1>Ma prevention</h1>
            Si je remarque une baisse moyenne je peut faire une prevision d'atteinte de pois idéal dans tel nombre de jours sinon je dis que il est dans un mauvais chemin
            <div id="graphique" class="row bg-white rounded">
                <div class="col-8">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="col-4">
                    <div class="row">Mon nombre de jours avant mon poids idéal est :</div>
                    <div class="row">Je pese actuellement :<?php echo $Profil['poids']; ?> </div>
                    <div class="row">Je veux </div>
                </div>
            </div>
            <?php
            //include("../CalculTaux.php");
            $ListeConcentration = array(array("Calorie", array(1,2, 3, 3, 7)));
            //CalculTaux($Profil['ID'], $BD, 1);
            //echo json_encode(array(array("Calorie", array(1, 2, 3, 4, 5, 6, 7))));
            ?>

            <h2>Mes exces</h2>
            <div class="row bg-white rounded">
                Ce que nous remarquons :
                <div class="col-8">
                    Concentration de sel</div>
                <div class="col-4">
                    Plus d'infos via <a href="#">article</a></div>
            </div>
            <h2>Mes manques</h2>
            <div class="row bg-white rounded">
                Ce que nous remarquons :
                <div class="col-8">
                    Concentration de sel: le manque peut induire des douleur d'estomac etc..</div>
                <div class="col-4">
                    Plus d'infos via <a href="#">article</a></div>
            </div>
        </div>

    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="Graphique.js" type="text/javascript"></script>
    <script src="../../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>


</html>
