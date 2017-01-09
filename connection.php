<?php
require_once ('connection.html');
if(isset($_POST['sregi']))
  {
    $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
    $result = $bdd->query("SELECT * FROM Users;");
    $result = $result->fetchAll();
    //for ($i=0; $i < $verif; $i++)
    //  {
          if ($_POST['username'] == $result[$i]['username'] && $_POST['password'] == $result[$i]['password'])
          {
            echo "Vous etes connecte !";
          }
          else
            {
              echo "Identifiants errones";
            }
    //  }
    }
?>
