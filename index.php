<?php
require_once('index.html');
session_start();
if(isset($_SESSION['pseudo']))
  echo "Bonjour ".$_SESSION['pseudo'];
else
  echo "Vous n'êtes pas connecté ! <a href=register.php>S'inscrire ?</a> ";
?>