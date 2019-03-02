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
    <title>Statistique <?php if(isset($Profil)){
    echo ' de '.$Profil[0];
    }
        ?></title>

</head>

<body>


    <div class="d-flex flex-column justify-content-center" id="TableProfil">
        hy

    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</body>


</html>
