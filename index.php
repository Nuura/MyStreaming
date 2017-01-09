<?php
require_once('index.html');
session_start();
if(isset($_SESSION['pseudo'])) //Si connecté
  {
    echo "<div class=account>";
    echo "<a href=disconnect.php class=bregister>Deconnection</a>";
    echo "<a href=categories.php class=bregister>Categories</a>";
    echo "</div>";
    echo "</div>";
        echo "Bonjour ".$_SESSION['pseudo'];
  }
else //Pas Connecté
  {
    echo "<div class=account>";
    echo "<a href=register.php class=bregister>Inscription</a>";
    echo "<a href=connection.php class=bconnection>Connexion</a>";
    echo "</div>";
    echo "</div>";
    echo "Vous n'êtes pas connecté ! <a href=register.php>S'inscrire ?</a> ";      
  }
?>