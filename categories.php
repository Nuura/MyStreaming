<?php
session_start();
//require_once('categories.html');
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$result = $bdd->query('SELECT Libelle, categorie_ID FROM Categories;');
$donnees = $result->fetchAll();
for($i = 0; count($donnees[$i]) >= $i; $i++)
  {
    echo "<a href=chosencategories.php?id=".$donnees[$i]['categorie_ID'].">".$donnees[$i]['Libelle']."</a><br>";
  }
?>
