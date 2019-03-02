<?php

function getBD(){
try
{
    return new PDO('mysql:host=localhost;dbname=vivo;charset=utf8','root','');
}
catch (Exception $e){
    die('Erreur :'.$e->getMessage());
}
    }

?>
