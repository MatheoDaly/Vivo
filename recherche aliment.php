<?php
include_once "includes/dbal.inc.php";
 ?>

<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="get" action="recherche aliment.php" autocomplete="off">
      Recherche:
      <input type="text" name="Alim">
  </form>
    <?php
    $bd = getDB();
    if(isset($_GET['Alim'])){
    $input = $_GET['Alim'];
    //$input = preg_replace("#[^0-9a-z]#i","",$input);
    $reponse = $bd->query("SELECT alim_nom_fr FROM aliments WHERE alim_nom_fr LIKE '%$input%'");
      while($result = $reponse->fetch()){
        echo(utf8_encode($result['alim_nom_fr']));
        echo('  ');
        /*echo'<input type="checkbox" data-type="switch">';
        echo('switch ($choix) {
          case 'value':
            // code...
            break;

          default:
            // code...
            break;
        }');*/
        //echo('<button type="button"> Choisir </button>');
      }
    $reponse-> closeCursor();

    }
    ?>
  </body>
</html>
