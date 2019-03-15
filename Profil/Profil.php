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
    <link href="Profil.css" rel="stylesheet">
    <title><?php if(isset($Profil)){
    echo $Profil[0];
    }
        ?></title>

</head>

<body>


    <div class="d-flex flex-column justify-content-center rounded" id="TableProfil">

        <div class="independant"><img class="independant" src="../Image/<?php if(isset($Profil[7]) && $Profil[7]!='NoPic')
{
            echo $cheminPhoto.$Profil[7];
} else {
    echo $cheminPhoto.'avatar-1295406_640.png';
}
    ?>" alt="profil"></div>

        <!-- introduction !-->

        <div class="d-flex flex-fill bg-white justify-content-between" id="intro">
            <div class="col-sm-5">Profil : didier de la compté des pres jolie
                <br> il a 29 ans et il est pas très beau... desolé didier</div>
            <div class="col-sm-4">Ajout de logo
            </div>
            <div class="col-sm-3 d-flex flex-column">
                <div>
                    <strong>Objectif perdre 50 kg
                    </strong>
                </div>
                <div class="d-flex flex-column">
                    <div class="row">
                        <img class="col-md-6 icon" name="ordi" src="../Image/mac-1784459_640.png" alt="mac">
                        <h2 class="col-md-6">
                            Ordi
                        </h2>
                    </div>
                </div>

            </div>
        </div>

        <!--  Intermediare !-->
        <div>
            <div>
                <input type="button" class="btn btn-primary" id="BtnStat" value="Consultation de mes statistiques">
            </div>
        </div>
        <hr>
        <!-- menue  personnaliser des profil !-->

        <div class="independant"><img class="independant" src="../Image/food-304597_640.png"></div>

        <!-- Programation des menue !-->
        <div id="ProgMenue" class="d-flex justify-content-between SousImg">
            <div>Menue perso
            </div>
            <div> Yollo
            </div>
        </div>


    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="ProfilMenue.js" type="text/javascript"></script>
    <script src="ModificationProfil.js" type="text/javascript"></script>

</body>


</html>
