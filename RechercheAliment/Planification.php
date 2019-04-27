<?php
//include_once "../Outil/PHP/AccesBD.php";
include_once "AccesBD_rechAl.php";
$BD =getBD();
if(isset($_POST["nbtypeMenue"])){
    $add =0;
    //($date, $heure, $id_menu, $id_profil)
    for($i=0; $_POST["nbtypeMenue"]>$i; $i++){
        if (isset($_POST['date'.((string)$i)])&&isset($_POST['heure'.((string)$i)])&&isset($_POST['Menu'.((string)$i)])){
            $add=ajouter($_POST['date'.((string)$i)], $_POST['heure'.((string)$i)], $_POST['Menu'.((string)$i)],1, $BD);
        }
    }
}
echo $add;
//--------------------------------------------Partie fonction

function ajouter($date, $heure, $id_menu, $id_profil,$BD){

$q = "INSERT INTO menu_profil(date, heure, id_menu, id_profil) VALUES ('".$date."','".$heure."', '".$id_menu."', '".$id_profil."');";
$BD = getBD();
$BD->query($q);
return 1;
}


?>
