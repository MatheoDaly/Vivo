 <?php
 session_start();
 include_once 'AccesBD_rechAl.php';
 $aliments_choisit = array();
 $i = 0;
 $j = 0;
 $nbs = null;

 foreach ($_GET as $key => $value) {
   $returnValue = preg_match('\'[0-9]*\'', $key, $nb, PREG_UNMATCHED_AS_NULL);
   $nbs[$i]= $nb[0];
   $aliments_choisit[$i] = array(preg_replace('/[0-9]*¨/', '', $key) => $value );
   $aliments_choisit[$i]['nb'] = $nbs[$i];
   $aliments_choisit[$i]['kcal'] = 0;
   $aliments_choisit[$i]['proteine'] = 0;
   $i++;
 }
 $_SESSION['alimentC']=$aliments_choisit;
  //$_SESSION['alimentC'][0]['proteine'] = 1; //POUR MODIF UNE CASE DE LALIMENT, FAIRE BOUCLE FOR DE 0 A sizeof($_SESSION['alimentC'])
 print_r($_SESSION['alimentC']);

 $nom = $_SESSION['nomMenu'];
 echo($nom);
 $bd = getBD();
 $query = "INSERT INTO `menu`(`Id_Menu`, `Id_Profil_Crea`, `Popularité`, `Nom`) VALUES (2,1,1,$nom)";
 echo($query);
 print_r($_SESSION['alimentC']);
 $i=0;
 while($i<sizeof($_SESSION['alimentC'])){
   echo('test');
   $id_alim = $_SESSION['alimentC'][$i][0];
   //echo($id_alim);
   //$nb = $_SESSION['Recette'][$i]['nb'];
   //$data = $bd->query("SELECT * FROM aliments WHERE alim_code = $id_alim ");
   //echo("INSERT INTO `est_ingredient_de`(`id_recette`, `alim_code`,`quantite`) VALUES ($idr2,$id_alim,$nb)");
   echo("INSERT INTO `compose`(`id_menu`, `id_recette`) VALUES (1,$id_alim)");
   //$dataEi = $bd->query("INSERT INTO `compose`(`id_menu`, `id_recette`) VALUES (1,$id_alim)");
   $i+=1;
 }
 //$import = $bd->query($query);
  ?>