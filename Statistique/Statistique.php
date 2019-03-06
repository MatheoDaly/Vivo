<?php
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Statistique <?php if(isset($Profil)){
    echo ' de '.$Profil[0];
    }
        ?></title>

</head>

<body>

    <div class="d-flex flex-column justify-content-center" id="TableProfil">
        <h1>Mon graphique jean philipe !</h1>
        <div id="graphique">
            <canvas id="lineChart"></canvas>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="Graphique.js" type="text/javascript"></script>

</body>


</html>
