<?php
session_start();

//https://openclassrooms.com/fr/courses/1085676-upload-de-fichiers-par-formulaire
function upload($index,$destination,$maxsize,$extensions, $id)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$id.$ext);
}

  $upload1 = upload('photo','../Image/PhotoProfil/',1048576, array('png','gif','jpg','jpeg'),1        /*$_SESSION['profil']['ID']*/
                   );
   if ($upload1) echo "Upload de l'icone réussi!<br />";
      else echo 'Image, non télécharger !';
?>
