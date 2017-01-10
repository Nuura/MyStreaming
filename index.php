<?php
session_start();
require_once('index.html');
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
  $sql = "SELECT * FROM Films UNION SELECT * FROM Series ORDER BY RelYear DESC LIMIT 4";
  $requet = $bdd->query($sql);
  $result = $requet->fetchAll();
  echo "<div class=news><h2>Nouveautes</h2><br>";
  for($i = 0; count($result[$i]) >= $i; $i++)
  {
    echo "<div class=div>";
  if($result[$i]['Type_video'] == 'Film')
      {
        echo "<embed src=https://www.youtube.com/embed/".$result[$i]['Video_ID']."></embed>";
        echo "<img class=imgnews src=img/film/".$result[$i]['ID'].".jpg height=240>";
        echo "<h2 class=h2news>".$result[$i]['Titre']."</h2>";
        echo "<h5 class=fadenews>Type : Film </h5><br>";
      }
  if($result[$i]['Type_video'] == 'Serie')
      {
        echo "<embed src=https://www.youtube.com/embed/".$result[$i]['Video_ID']."></embed>";
        echo "<img class=imgnews src=img/serie/".$result[$i]['ID'].".jpg height=240>";
        echo "<h2 class=h2news>".$result[$i]['Titre']."</h2>";
        echo "<h5 class=fadenews>Type : Serie </h5><br>";
      }
    echo "<h5 class=fadenews>Date de Sortie : ".$result[$i]['Relyear']."</h5><br>";
    echo "<h5 class=fadenews>Realisateur : ".$result[$i]['Realisateur']." </h5><br>";
    echo "<h5 class=fadenews>Acteur : ".$result[$i]['maincharac']." </h5><br>";
    echo "<hr class=hrnews><br><br>";
    echo "<h3 class=synopsisnews>Synopsis : ".$result[$i]['Synopsis']."</h3><br>";

    echo "</div><br>";
  }
  echo "</div>";
if(isset($_POST['search']))
  {
    $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
    $sql = "SELECT * FROM Films LIKE Titre = %".$_POST['isearch']."%";
    $donnees = $bdd->execute($sql);
    var_dump($donnees);
  }
echo "<div class=footer>
      <br><a href=mailto:sanche_p@etna-alternance.net>Contact </a>
      <br><br><p class=pfooter>Copyright sanche_p  ©</p>
     </div>";
?>
