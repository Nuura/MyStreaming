<?php
session_start();
require_once('chosencategories.html');
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$sql = "SELECT role FROM Users WHERE username = '".$_SESSION['pseudo']."'";
$requet = $bdd->query($sql);
$result = $requet->fetch();

if(isset($_SESSION['pseudo'])) //Si connecté
  {
    echo "<div class=account>";
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
  }
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$result = $bdd->query('SELECT Titre, Synopsis, Realisateur, Movie_ID, Type_video, RelYear FROM Films JOIN Categories ON Categories.categorie_ID = Films.Movie_ID WHERE Categories.categorie_ID = '.$_GET['id'].';');
$sresult = $bdd->query('SELECT ID, Titre, Synopsis, Realisateur, Movie_ID, Type_video, RelYear FROM Series JOIN Categories ON Categories.categorie_ID = Series.Movie_ID WHERE Categories.categorie_ID = '.$_GET['id'].';');
$donnees = $result->fetchAll();
$sdonnees = $sresult->fetchAll();
echo "<div class=presentation><div class=contenu>";
for($i = 0; count($donnees[$i]) > $i; $i++)
  {
    echo "<img height=450 src=img/film/".$_GET['id'].".jpg class=affiche><div class=ecrit>";
    echo "<h2>".$donnees[$i]['Titre']."</h2><br>";
    echo "<h5 class=fade>Date de Sortie :</h5><h5 class=date>".$donnees[$i]['RelYear']."</h5><br>";
    echo "<h5 class=fade>Réalisateur : ".$donnees[$i]['Realisateur']."</h5><br>";
    echo "<p class=synopsis>".$donnees[$i]['Synopsis']."</p><br>";
    echo "</div>";
  }
for($i = 0; count($sdonnees[$i]) > $i; $i++)
  {
echo "<img height=450 src=img/serie/".$sdonnees[$i]['ID'].".jpg class=affiche><div class=ecrit>";
echo "<h2>".$sdonnees[$i]['Titre']."</h2><br>";
echo "<h5 class=fade>Date de Sortie :</h5><h5 class=date>".$sdonnees[$i]['RelYear']."</h5><br>";
echo "<h5 class=fade>Réalisateur : ".$sdonnees[$i]['Realisateur']."</h5><br>";
echo "<p class=synopsis>".$sdonnees[$i]['Synopsis']."</p><br>";
echo "</div>";
}

if(isset($_SESSION['pseudo'])) //Si connecté
  {
    echo "</div></div></div><div class=comment>
      <h2 class=tcomment>Commentaires</h2>
        <form action=# method=post>
          <label for=password>Vous l'avez deja vu ? Donnez votre avis sur ce film ! </label><br>
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
    echo "<h2 class=tcomment>Vous devez vous connecter pour pouvoir envoyer un commentaire !</h2>";
  }


if(isset($_POST['comment']) && isset($_POST['note']) && isset($_POST['scomment']))
  {
    if($_POST['note'] <= 20)
      {
        $result = $bdd->prepare('INSERT INTO Comment (Movie_ID, Comment, Notes, Relyear) VALUES (?, ?, ?, ?);');
        $result->execute(array($_POST['Movie_ID'], $_POST['comment'], $_POST['note'], NOW()));
        echo "Votre commentaire a bien ete envoye !</form></div></body>";
      }
      else
      {
        echo "Pour valider votre commentaire, vous devez entrer un commentaire et une note inférieur a 20";
      }
  }
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$request = $bdd->query('SELECT Comment, Notes FROM Comment WHERE Movie_ID ='.$_GET['id'].' ORDER BY Relyear DESC;');
$result = $request->fetchAll();

for($i = 0; count($result[$i]); $i++)
echo $result[$i]['Comment'];
echo $result[$i]['Notes'];
?>
