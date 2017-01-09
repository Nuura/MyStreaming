<?php
session_start();
require_once('chosencategories.html');
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
    echo "</div>";
  }


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

if(isset($_SESSION['pseudo'])) //Si connecté
  {
    echo "</div></div></div><div class=comment>
      <h2 class=tcomment>Commentaires</h2>
        <form action=# method=post>
          <label for=password>Vous avez vu ".$donnees[$i]['Titre']." ? Donnez votre avis sur ce film ! </label><br>
          <div class=note>
            <input name=note class=inote maxlength=2>
            </input>
            <p class=pnote>/20</p>
          </div>
          <textarea type=text autocomplete=false name=comment class=icomment></textarea><br><br>
          <input type=submit name=scomment value=Envoyer votre commentaire ! class=scomment></input><br>";
  }
  else
  {
    echo "bendo";
  }


if(isset($_POST['comment']) && isset($_POST['note']) && isset($_POST['scomment']))
  {
    if($_POST['inote'] <= '20')
      {
        $result = $bdd->prepare('INSERT INTO Comment (Movie_ID, Comment, Notes) VALUES (?, ?, ?);');
        $result->execute(array($_POST['Movie_ID'], $_POST['comment'], $_POST['note']));
        echo "Votre commentaire a bien ete envoye !</form></div></body>";
      }
      else
      {
        echo "Pour valider votre commentaire, vous devez entrer un commentaire et une note inférieur a 20";
      }
  }
?>
