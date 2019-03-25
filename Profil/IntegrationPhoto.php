<?php
if ($_FILES['icone']['error'] > 0) $erreur = "Erreur lors du transfert";

$_FILES['photo']['name']     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_photo.png).
$_FILES['photo']['type']     //Le type du fichier. Par exemple, cela peut être « image/png ».
$_FILES['photo']['size']     //La taille du fichier en octets.
$_FILES['photo']['tmp_name'] //L'adresse vers le fichier uploadé dans le répertoire temporaire.
$_FILES['photo']['error']    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
?>
