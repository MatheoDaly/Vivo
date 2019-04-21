 <?php
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

  ?>
