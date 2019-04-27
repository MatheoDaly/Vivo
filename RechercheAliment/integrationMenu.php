<?php
 session_start();
 include_once 'AccesBD_rechAl.php';
 $aliments_choisit = array();
 $i = 0;
 $j = 0;
 $nbs = null;
 foreach ($_GET as $key => $value) {
   $returnValue = preg_match('\'[0-9]*\'', $key, $nb);
   $nbs[$i]= $nb[0];
   $aliments_choisit[$i] = array(preg_replace('/[0-9]*¨/', '', $key) => $value );
   $aliments_choisit[$i]['nb'] = $nbs[$i];
   $aliments_choisit[$i]['kcal'] = 0;
   $aliments_choisit[$i]['proteine'] = 0;
   $i++;
 }
 $_SESSION['alimentC']=$aliments_choisit;
  //$_SESSION['alimentC'][0]['proteine'] = 1; //POUR MODIF UNE CASE DE LALIMENT, FAIRE BOUCLE FOR DE 0 A sizeof($_SESSION['alimentC'])
 $nom = $_SESSION['nomMenu'];
 $bd = getBD();
 $query = "INSERT INTO `menu`(`Id_Profil_Crea`, `Popularité`, `Nom`) VALUES (1,1,'$nom')";
 $bd->exec($query);
$q = "SELECT MAX(Id_Menu) AS id FROM menu";
 $req = $bd->exec($q);
$ligne=$req->fetch();
$idMenu=$ligne['id'];
$req->closeCursor();
 $i=0;
 while($i<sizeof($_SESSION['alimentC'])){
   $tempo = $_SESSION['alimentC'][$i];
   $id_alim = current($tempo); // On prend la première valeur du tableau
   //echo($id_alim);
   //$nb = $_SESSION['Recette'][$i]['nb'];
   //$data = $bd->query("SELECT * FROM aliments WHERE alim_code = $id_alim ");
   //echo("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`,`quantite`) VALUES ($idr2,$id_alim,$nb)");
   //echo("INSERT INTO `compose`(`id_menu`, `id_recette`) VALUES (1,$id_alim)");
   $bd->exec("INSERT INTO `compose`(`id_menu`, `id_recette`) VALUES ($idMenu,$id_alim)");
   //$dataEi = $bd->query("INSERT INTO `compose`(`id_menu`, `id_recette`) VALUES (1,$id_alim)");
   $i+=1;
 }
unset($_SESSION['alimentC']);
unset($_SESSION["nomMenu"]);
echo ('<meta http-equiv="refresh" content="0; URL=Choix_Menu.php">');
 //$import = $bd->query($query);
  ?>
