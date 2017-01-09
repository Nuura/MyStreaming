<?php
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$result = $bdd->query("SELECT Libelle FROM Categories;");
$donnees = $bdd->fetch($result);

for($i = 0; $donnees > $i; $i++)
  {
    echo $donnees[$i];
  }
?>
