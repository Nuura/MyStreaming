<?php
require_once ('connection.html');
session_start();
if(isset($_POST['sregi']))
  {
    $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
    $result = $bdd->query("SELECT * FROM Users WHERE username = '". $_POST['username'] ."' AND password = '". sha1($_POST['password'])."';");
    $result = $result->fetch();

    if ($result == true)
          {
	    session_start();
	    $_SESSION['pseudo'] = $_POST['username'];
            echo "Vous etes connecte ". $_SESSION['pseudo']."!";
            header("refresh:2;url=index.php" );
          }
          else
            {
              echo "Identifiants errones";
            }
    }
echo "</div>";
?>
