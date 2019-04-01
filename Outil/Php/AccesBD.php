<?php
function getBD(){
$i=2;
if($i==1){
    try{
        return new PDO('mysql:host=localhost;dbname=vivo;charset=utf8','root','');
    }

    catch (Exception $e){
        die('Erreur :'.$e->getMessage());
    }
}
    else{
        try{
            return new PDO('mysql:host=localhost;dbname=vivo;charset=utf8','root','root');
        }

        catch (Exception $e){
            die('Erreur :'.$e->getMessage());
        }
    }
}


?>
