<?php
/*
Idée est de faire parvenir tous les aliment issu d'un historique aliment, mais il y aura un historique regime aussi, ou au boud de semaine on ne garde plus les repas recu mais la moyenne des taux de glucose, etc par semaine...

Plus effectuer quand aliment est apprecier faire qu'il passe en preferance..


*/
session_start();
include('../Outil/Php/AccesBD.php');

// Variable :
if(isset($_SESSION['profil'])){
    $Profil=$_SESSION['profil'];
    }
//$Profil = array($Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], 'NoPic');
$cheminPhoto='../Image/PhotoProfil/';
$cheminIcon='../Image/IconProgess/';

?>
<!Doctype HTML>
<html>

<head>
    <meta charset="utf-8">
    <link href="../Outil/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Profil/Profil.css" rel="stylesheet">
    <link href="Statistique.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- adapatation pour internet exploreur du graphique !-->
    <title>Statistique <?php if(isset($Profil)){
    echo ' de '.$Profil[0];
    }
        ?></title>

</head>

<body>

    <div class="d-flex flex-column justify-content-center" id="TableProfil">
        <h1>Mon graphique
            <span id="nom">
                <?php if(isset($Profil)){
    echo $Profil[0];
    }?>
            </span></h1>
        <hr>
        <label for="type">Mon graphique selon :</label>
        <select name='type'>
            <option value='1' selected>Mes repas du jours</option>
            <option value='1'>Mes différentes concentration durant les 15 derniers jours</option>
            <option value='1'>Mes différentes concentration durant les 5 derniers semaines</option>
            <option value='1'>Mes différentes concentration durant les 6 derniers mois</option>
            <option value='1'>Mes différentes concentration durant les 5 derniers années</option>
        </select>
        <div id="graphique">
            <canvas id="lineChart"></canvas>
        </div>
        <hr>
        <div id="Ronds" width="400" height="400">
            <canvas id="Rond"></canvas>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="Graphique.js" type="text/javascript"></script>

</body>


</html>
