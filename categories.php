<?php

require_once('categories.html');
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$sql = "SELECT role FROM Users WHERE username = '".$_SESSION['pseudo']."'";
$requet = $bdd->query($sql);
$result = $requet->fetch();
if(isset($_SESSION['pseudo'])) //Si connecté
  {
    echo "<div class=account>";
    echo "<p class=getlogin>Connecte en tant que ".$_SESSION['pseudo']."</p>";
    echo "<a href=disconnect.php class=bregister>Deconnection</a>";
    echo "<a href=categories.php class=bregister>Categories</a>";
    if($result['role'] == "0")
      echo "<a href=admin.php class=bregister>Panel Admin<br>".$_SESSION['pseudo']."</a>";
    echo "</div>";
    echo "</div></body>";
  }
else //Pas Connecté
  {
    echo "<div class=account>";
    echo "<a href=categories.php class=bregister>Categories</a>";
    echo "<a href=connection.php class=bconnection>Connexion</a>";
    echo "<a href=register.php class=bregister>Inscription</a>";
    echo "</div>";
    echo "</div>";
    echo "Vous n'êtes pas connecté ! <a href=register.php>S'inscrire ?</a> ";
  }
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$result = $bdd->query('SELECT Libelle, categorie_ID FROM Categories;');
$donnees = $result->fetchAll();
echo "<div class=categories>";
for($i = 0; count($donnees[$i]) >= $i; $i++)
  {
    echo "<a href=chosencategories.php?id=".$donnees[$i]['categorie_ID'].">".$donnees[$i]['Libelle']."</a><br>";
  }
echo "</div>";
?>
