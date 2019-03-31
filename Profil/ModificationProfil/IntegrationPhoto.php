<?php

//https://openclassrooms.com/fr/courses/1085676-upload-de-fichiers-par-formulaire
function upload($index,$destination,$maxsize,$extensions, $id)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$id.'.'.$ext);
}


  $upload1 = upload('photo','../Image/PhotoProfil/',1048576, array('png','gif','jpg','jpeg'),$_SESSION['profil']['ID']);
   if ($upload1) {
        $ext = substr(strrchr($_FILES['photo']['name'],'.'),1);
        $BD->query("UPDATE profil SET url_photo  = '".$_SESSION['profil']['ID'].".".$ext."' WHERE id =".$_SESSION['profil']['ID']);
        $_SESSION['profil']['photo']=$_SESSION['profil']['ID'].".".$ext;
   } else {
       
       echo 'Image, non télécharger !';
   } 
?>
