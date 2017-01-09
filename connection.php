<?php
require_once ('connection.html');
if(isset($_POST['sregi']))
  {
    $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
    $result = $bdd->query("SELECT * FROM Users;");
    $result = $result->fetchAll();
    //for ($i=0; $i < $verif; $i++)
    //  {
          if ($_POST['username'] == $result[$i]['username'] && sha1($_POST['password']) == $result[$i]['password'])
          {
	    session_start();
	    $_SESSION['pseudo'] = $_POST['username'];
            echo "Vous etes connecte ". $_SESSION['pseudo']."!";
          }
          else
            {
              echo "Identifiants errones";
            }
    //  }
    }
echo "</div>";
?>
