<?php
/*
Idée est de faire parvenir tous les aliment issu d'un historique aliment, mais il y aura un historique regime aussi, ou au boud de semaine on ne garde plus les repas recu mais la moyenne des taux de glucose, etc par semaine...

Plus effectuer quand aliment est apprecier faire qu'il passe en preferance..


*/
include("../Outil/IsTest.php");

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
    echo ' de '.$Profil["prenom"];
    }
        ?></title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../index.php">Vivo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../Profil/Profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Statistique/Statistique.php">Statistique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Inscription/inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="disconnect" href="../Connection/connexion.php">Connexion</a>
                    </li>
                    <?php
                        if(isset($_SESSION['profil']) && !$testGene){
                            echo '<li class="nav-item">';
                            echo    '<a class="nav-link" id="disconnect" href="../Deconnexion.php">Deconnexion</a>';
                            echo '</li>';
                        }
                    ?>

                </ul>
                <span class="navbar-text">
                    Pour une bonne santé vivez VIVO !
                </span>
            </div>
        </nav>
    </header>
    <div class="container d-flex flex-column justify-content-center rounded" id="TableProfil">

        <h1 class="text-light"></h1>
        <hr>
        <div class="container-fluid bg-light rounded">
            <button class="btn-light btn">
                <a href="Prevention/Prevention.php">Tu as envie de voir nos preventions personnalisés ?</a>
            </button>
            <br>
        </div>
        <hr>
        <div class="container-fluid bg-white rounded">
            <h4>Souhaites tu connaître la repartition en calories aujourd'hui ?</h4>
            <div id="Ronds" width="400" height="400" class="row">
                <canvas id="Rond" class="bg-white"></canvas>
            </div>
            <hr id="1">
            <h4>Veux-tu voir la variation de tes macronutriments, au fur et à mesure du temps ?</h4>
            <hr id="1">
            <label for="type">Mon graphique selon :</label>
            <select name='type' class="custom-select">
                <option value='1' selected>Mes repas du jours selon les heures</option>
                <option value='2'>Mes différentes concentration durant les 15 derniers jours</option>
                <option value='3'>Mes différentes concentration durant les 5 derniers semaines</option>
                <option value='4'>Mes différentes concentration durant les 6 derniers mois</option>
                <option value='5'>Mes différentes concentration durant les 5 derniers années</option>
            </select>
            <br />
            <div id="graphique" class="row bg-white">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../Outil/bootstrap-4.3.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="Graphique.js" type="text/javascript"></script>

</body>


</html>
