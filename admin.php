<?php
  session_start();
  $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
  if(isset($_POST['sregi']))
    {
      if($_POST['Type_video'] == 'Film')
      {
        $donnees = $bdd->prepare('INSERT INTO Films(Titre, Synopsis, Realisateur, Movie_ID, Type_video, Video_ID, maincharac, Relyear) VALUES (?, ?, ?, ?, ?, 
?, ?, ?);');
        $donnees->execute(array($_POST['Titre'], $_POST['Synopsis'], $_POST['Realisateur'], $_POST['Movie_ID'], $_POST['Type_video'], $_POST['Video_ID'], $_POST['maincharac'], $_POST['maincharac']));
        echo "Film Ajoute !";
      }
      if($_POST['Type_video'] == 'Serie')
      {
        $donnees = $bdd->prepare('INSERT INTO Series(Titre, Synopsis, Realisateur, Movie_ID, Type_video, Video_ID, maincharac, Relyear) VALUES (?, ?, ?, ?, ?, ?, ?, ?);');
        $donnees->execute(array($_POST['Titre'], $_POST['Synopsis'], $_POST['Realisateur'], $_POST['Movie_ID'], $_POST['Type_video'], $_POST['Video_ID'], $_POST['maincharac'], $_POST['Relyear']));
        echo "Serie Ajoute !";
      }
    }
 ?>
<html>
  <head>
      <title>VidStream</title>
      <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <div class="header">
      <div class="logo">
        <img src="vidstream.png">
      </div>
      <div class="mid">
        <input class="search" type="text" name="search" placeholder="Search..">
        <input href="#" type="submit" class="button">
      </div>
      <?php
      if(isset($_SESSION['pseudo'])) //Si connecté
        {
          echo "<div class=account>";
          echo "<p class=getlogin>Connecte en tant que ".$_SESSION['pseudo']."</p>";
          echo "<a href=disconnect.php class=bregister>Deconnection</a>";
          echo "<a href=categories.php class=bregister>Categories</a>";
          echo "<a href=admin.php class=bregister>Panel Admin<br>".$_SESSION['pseudo']."</a></div>";

          }
      ?>
    <div class="admin">
      <h3 class="h3admin">Ajout d'une serie/film</h3><br><br>
      <!-- <input class="iadmin"></input> -->
      <form action="admin.php" method="post">
        <label for="Titre">Titre :</label><br>
        <input type="text" name="Titre" class="iregi"><br><br>

        <label for="Synopsis">Synopsis</label><br>
        <input type="text" name="Synopsis" class="iregi"><br><br>

        <label for="Realisateur">Realisateur</label><br>
        <input type="text" name="Realisateur" class="iregi"><br><br>

        <label for="Movie_ID">Categorie de Film/Serie</label><br>
        <input type="text" name="Movie_ID" class="iregi"><br><br>

        <label for="Type_video">Type de contenu</label><br>
        <input type="text" name="Type_video" placeholder="Film ou Serie" class="iregi"><br><br>

        <label for="Video_ID">Lien Youtube</label><br>
        <input type="text" name="Video_ID" placeholder="Apres ?v=" class="iregi"><br><br>

        <label for="Relyear">Date de sortie</label><br>
        <input type="text" name="Relyear" placeholder="YYYY-MM-DD" class="iregi"><br><br>

        <label for="maincharac">Acteur Principaux</label><br>
        <input type="text" name="maincharac" class="iregi"><br><br>

        <input type="submit" name="sregi" value="Ajouter le contenu" class="sregi"></input>
      </form>
    </div>
  </html>
