<?php
/* Comme on a pas le même nom de bd et que ça marche pas pour recherche aliment, j'ai pas modifié AccesBD.php, j'ai plutôt adapté avec ce bis*/
function getBD(){
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=aliments;charset=utf8','root','root');
    return $bdd;
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}
    }

?>
