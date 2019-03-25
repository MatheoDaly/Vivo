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
    } else {
    $Profil=array(1,'Paul','Paul@jeMangeTrop.com', 120, 170, 'GrosPaul','M','CestPasDeMaFaute','NoPic');
}
// Cela sert de reperage ! => $Profil = array($Profil['id'], $Profil['prenom'], $Profil['email'], $Profil['poids'], $Profil['taille'], $Profil['utilisateur'], $Profil['genre'], $Profil['mdp'], 'NoPic');
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- adapatation pour internet exploreur car graphique !-->
    <title>Statistique <?php if(isset($Profil)){
    echo ' de '.$Profil[1];
    }
        ?></title>

</head>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
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
    <!-- Attention mathéo ne modifie pas l'input !-->
    <input type="hidden" value="<?php 
                                if(isset($Profil)){echo $Profil[0];
                                }
                                ?>" name="nom" id="nom">
    <!-- Ici ca va tu peux modifier sauf id et modification/ suppression des nom de class  !-->

    <div class="d-flex flex-column justify-content-center" id="TableProfil">
        <h1>Mon graphique
        </h1>
        <hr>
        <label for="type">Mon graphique selon :</label>
        <select name='type'>
            <option value='1' selected>Mes repas du jours</option>
            <option value='2'>Mes différentes concentration durant les 15 derniers jours</option>
            <option value='3'>Mes différentes concentration durant les 5 derniers semaines</option>
            <option value='4'>Mes différentes concentration durant les 6 derniers mois</option>
            <option value='5'>Mes différentes concentration durant les 5 derniers années</option>
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
