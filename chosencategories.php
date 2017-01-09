<?php
session_start();
require_once('chosencategories.html');
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$result = $bdd->query('SELECT Titre, Synopsis, Realisateur, Movie_ID, RelYear FROM Films JOIN Categories ON Categories.categorie_ID = Films.Movie_ID WHERE Categories.categorie_ID = '.$_GET['id'].';');
$donnees = $result->fetchAll();
for($i = 0; count($donnees[$i]) > $i; $i++)
  {
    echo "<div class=presentation><div class=contenu><img height=450 src=img/".$_GET['id'].".jpg class=affiche><div class=ecrit>";
    echo "<h2>".$donnees[$i]['Titre']."</h2><br>";
    echo "<h5 class=fade>Date de Sortie :</h5><h5 class=date>".$donnees[$i]['RelYear']."</h5><br>";
    echo "<h5 class=fade>Réalisateur : ".$donnees[$i]['Realisateur']."</h5><br>";
    echo "<p class=synopsis>".$donnees[$i]['Synopsis']."</p><br>";
  }
?>
