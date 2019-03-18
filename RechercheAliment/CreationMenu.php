<?php
include_once "AccesBDbis.php";
session_start();
?>

<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="StyleBis.css" type="text/css">
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>
  <h3>Créer votre menu</h3>
  <p>Un menu représente ce que vous voulez manger à un moment précis de la journée (petit déjeuné, repas du midi, colation, etc...). Il est composé de Plat et un
    plat se défini (ou non) par une recette</p>
  <br/>
  <p>Veuillez indiquer le nombre de plat pour votre menu</p>
  <form method='get' action="CreationMenu.php">
    <input type='number' name='nbMenu'>
    <input type='submit' name='valNbMenu'>
    </form>

    <?php
     if(isset($_GET['nbMenu']) && isset($_GET['valNbMenu'])){
       $i=1;
       echo('<ul>');
       while($i<=$_GET['nbMenu']){
         echo('<li>');
         echo "Recette";
         echo($i);
         echo('<button type="button">');
         echo "Définir";
         echo('</button>');
         echo('</li>');

         $i+=1;

       }
       echo('</ul>');
     }
     ?>


</body>
</html>
