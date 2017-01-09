<?php
require_once ('connection.html');
if(isset($_POST['sregi']))
  {
    $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
    $insert = "SELECT * FROM Users";
    $verif = $insert->fetch();
      for ($i=0; $i < $verif; $i++)
        {
          if ($_POST['username'] == $verif['username'][$i] && $_POST['password'] == $verif['password'][$i])
          {
            echo "Vous etes connecte !";
          }
          else
            {
              echo "Identifiants errones";
            }
        }
    }
?>
