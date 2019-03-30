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
Bulle js des repas et menue


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
$BD=GetBD();
?>
<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../Profil/Profil.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- adapatation pour internet exploreur car graphique !-->
    <title>Prevention <?php 
    echo ' de '.$Profil["prenom"];
    
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
                    <a class="nav-link" href="../../index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../Profil/Profil.php">Profil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../Statistique/Statistique.php">Statistique</a>
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
            <div id="graphique" class="row bg-white rounded">
                <div class="col-8">
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="col-4">
                    <div class="row">Mon nombre de jours avant mon poids idéal est :</div>
                    <div class="row">Je pese actuellement <?php echo $Profil['poids']." kg"; ?> </div>
                    <div class="row">Je veux atteindre <?php $objectif_poids=$BD->query("SELECT objectif_profil.valeur_type AS 'val'
                                            FROM objectif_profil
                                            INNER JOIN objectif ON objectif.id=objectif_profil.id_Objectif
                                            WHERE objectif.type='poids'
                                            AND objectif_profil.id_Profil=".$Profil['ID']);
                                            $val = $objectif_poids-> fetch();
                                            echo $val['val']." kg";
                        $objectif_poids->closeCursor();
                        ?></div>
                </div>
            </div>

            <h2>Mes exces</h2>
            <div class="row bg-white rounded">
                <?php
                $req = $BD->query("SELECT statistique.Nom AS 'Concentration',MAX(statistique.TauxCumule), article.Url AS 'ref', article.Nom AS 'article', seuil.Risque as 'Risque'
                FROM statistique
                INNER JOIN seuil ON seuil.Nom = statistique.Nom
                INNER JOIN article ON seuil.Nom = article.LienSeuil
                WHERE seuil.InfSup='S'
                AND seuil.Taux<statistique.TauxCumule
                AND statistique.type=2
                AND SUBDATE(NOW(), INTERVAL 7 DAY)<statistique.date
                AND statistique.ID_Profil=".$Profil['ID']);
                while($ligne= $req->fetch()){
                    
                ?>
                Ce que nous remarquons que cette semaine :
                <div class="col-8">
                    La concentration de <?php echo $ligne['Concentration']." : Risque eventuelle de ".$ligne['Risque']; ?></div>
                <div class="col-4">
                    Plus d'infos via l'article <a href="<?php echo $ligne['ref']; ?>"><?php echo $ligne['article']; ?></a></div>
                <?php 
                }
                $req->closeCursor();
                ?>
            </div>
            <h2>Mes manques</h2>
            <div class="row bg-white rounded">
                <?php
                $req = $BD->query("SELECT statistique.Nom AS 'Concentration',MIN(statistique.TauxCumule), article.Url AS 'ref', article.Nom AS 'article', seuil.Risque as 'Risque'
                FROM statistique
                INNER JOIN seuil ON seuil.Nom = statistique.Nom
                INNER JOIN article ON seuil.Nom = article.LienSeuil
                WHERE seuil.InfSup='I'
                AND seuil.Taux>statistique.TauxCumule
                AND statistique.type=2
                AND SUBDATE(NOW(), INTERVAL 7 DAY)<statistique.date
                AND statistique.ID_Profil=".$Profil['ID']);
                while($ligne= $req->fetch()){
                    
                ?>
                Ce que nous remarquons que cette semaine :
                <div class="col-8">
                    La concentration de <?php echo $ligne['Concentration']." : Risque eventuelle de ".$ligne['Risque']; ?></div>
                <div class="col-4">
                    Plus d'infos via l'article <a href="<?php echo $ligne['ref']; ?>"><?php echo $ligne['article']; ?></a></div>
                <?php 
                }
                $req->closeCursor();
                ?>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="../../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
</body>


</html>
