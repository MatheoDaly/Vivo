<?php
session_start();

unset($_SESSION['Menu']);
session_destroy();
echo ('<meta http-equiv="refresh" content="0; URL=CreationMenu.php">');
 ?>
