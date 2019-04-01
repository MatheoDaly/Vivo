<?php
function getBD(){
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=vivo;charset=UTF8','root','root');
    return $bdd;
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}
    }

?>
