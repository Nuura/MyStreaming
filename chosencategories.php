<?php
session_start();
//require_once('chosencategories.html');
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$result = $bdd->query('SELECT Titre, Synopsis, Realisateur, Movie_ID, RelYear FROM Films JOIN Categories ON Categories.categorie_ID = Films.Movie_ID WHERE Categories.categorie_ID = '.$_GET['id'].';');
$donnees = $result->fetchAll();
for($i = 0; count($donnees[$i]) > $i; $i++)
  {
    echo $donnees[$i]['Titre']."<br>";
    echo $donnees[$i]['Synopsis']."<br>";
    echo $donnees[$i]['Realisateur']."<br>";
    echo $donnees[$i]['RelYear']."<br>";
  }
?>