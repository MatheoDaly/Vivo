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
Donut a finir dans statitisques -> juan
Bulle js des repas et menue


Moindre carre !

*/
session_start();

$test=true;
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
    <title>Prevention <?php echo ' de '.$Profil["prenom"];?></title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="../../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="GraphiquePoids.js" type="text/javascript"></script>

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
            <h1 class="text-light">Ma prevention</h1>
            <div id="graphique" class="row bg-white rounded">
                <div class="col-8" id='graph'>
                    <canvas id="lineChart"></canvas>
                </div>
                <div class="col-4">
                    <div class="row"><span id='poidsJr'></span><br></div>
                    <div class="row">Je pese actuellement :<?php echo "<span id='poidsActuel'> ".$Profil['poids']." </span> kg"; ?> </div>
                    <div class="row">Je veux atteindre :<?php $objectif_poids=$BD->query("SELECT objectif_profil.valeur_type AS 'val'
                                            FROM objectif_profil
                                            INNER JOIN objectif ON objectif.id=objectif_profil.id_Objectif
                                            WHERE objectif.type='poids'
                                            AND objectif_profil.id_Profil=".$Profil['ID']);
                                            $val = $objectif_poids-> fetch();
                                            echo "<span id='poidsVoulu'> ".$val['val']."</span>"; $objectif_poids->closeCursor();?> kg </div>
                </div>
            </div>

            <?php $req = $BD->query("SELECT concentration.Nom AS 'Concentration',MIN(statistique.TauxCumule), article.Url AS 'ref', article.Nom AS 'article', seuil.Risque as 'Risque'
                FROM statistique
                INNER JOIN concentration ON statistique.id_Concentration= concentration.id
                INNER JOIN seuil ON seuil.Id_Concentration =  concentration.id
                INNER JOIN seuil_article ON seuil.ID= seuil_article.id_seuil
                INNER JOIN article ON seuil_article.article = article.id
                WHERE seuil.InfSup='S'
                AND seuil.Taux<statistique.TauxCumule
                AND statistique.type=2
                AND SUBDATE(NOW(), INTERVAL 7 DAY)<statistique.date
                AND statistique.ID_Profil=".$Profil['ID']."
                GROUP BY statistique.id_Concentration");
            ?>
            <h2 class="text-light">Mes exces</h2>
            <div class="row bg-white rounded">
                <div class="col-12">
                    Ce que nous remarquons que cette semaine :
                </div>
                <?php while($ligne= $req->fetch()){ ?>
                <div class="col-8">
                    <strong>
                        La concentration de <?php echo $ligne['Concentration']." : Risque eventuelle : ".$ligne['Risque']; ?>
                    </strong>
                </div>
                <div class="col-4">
                    Plus d'infos via l'article <a href="<?php echo $ligne['ref']; ?>"><?php echo $ligne['article']; ?></a>
                </div>
                <?php }$req->closeCursor();?>
            </div>

            <?php
                $req = $BD->query("SELECT concentration.Nom AS 'Concentration',MIN(statistique.TauxCumule), article.Url AS 'ref', article.Nom AS 'article', seuil.Risque as 'Risque'
                FROM statistique
                INNER JOIN concentration ON statistique.id_Concentration= concentration.id
                INNER JOIN seuil ON seuil.Id_Concentration =  concentration.id
                INNER JOIN seuil_article ON seuil.ID= seuil_article.id_seuil
                INNER JOIN article ON seuil_article.article = article.id
                WHERE seuil.InfSup='I'
                AND seuil.Taux>statistique.TauxCumule
                AND statistique.type=2
                AND SUBDATE(NOW(), INTERVAL 7 DAY)<statistique.date
                AND statistique.ID_Profil=".$Profil['ID']."
                GROUP BY statistique.id_Concentration");?>
            <!-- ######################################## Debut Manque et exces ######################################### !-->
            <h2 class="text-light">Mes manques</h2>
            <div class="row bg-white rounded">
                <div class="col-12">
                    Ce que nous remarquons que cette semaine :
                </div>
                <?php while($ligne= $req->fetch()){?>
                <div class="col-8">
                    <strong>
                        La concentration de <?php echo $ligne['Concentration']." : Risque eventuelle : ".$ligne['Risque']; ?>
                    </strong>
                </div>
                <div class="col-4">
                    Plus d'infos via l'article <a href="<?php echo $ligne['ref']; ?>"><?php echo $ligne['article']; ?></a></div>
                <?php }$req->closeCursor();?>
            </div>
        </div>
        <hr>
        <button class="col-3 btn btn-light">
            <a href="../Statistique.php">Revenir ?</a>
        </button>
    </div>



</body>


</html>
