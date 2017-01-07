<?php
require_once('register.html');
$error = 0;
    if(isset($_POST['sregi']))
      {
        echo "hello guys";
      }
      else if(!isset($_POST['lastname']))
      {
        echo "Veuillez renseigner votre Nom.";
        $error += 1;
      }
      else if(!isset($_POST['firstname']))
      {
        echo "Veuillez renseigner votre Prenom.";
        $error += 1;
      }
      else if(!isset($_POST['username']))
      {
        echo "Veuillez renseigner votre Pseudo.";
        $error += 1;
      }
      else if(strlen($_POST['username']) > 10)
      {
        echo "Votre Pseudo ne doit pas contenir plus de 10 caracteres";
      }
      else if(!isset($_POST['password']))
      {
        echo "Veuillez renseigner votre Mot de Passe.";
        $error += 1;
      }
      else if (strlen($_POST['password']) > 16 && strlen($_POST['password']) < 8)
      {
        echo "Le mot de passe doit comporter entre 8 et 16 caracteres";
      }
      else if(!isset($_POST['confirmpassword']))
      {
        echo "Veuillez confirmer votre Mot de Passe.";
        $error += 1;
      }
      else if($_POST['password'] != $_POST['confirmpassword'])
      {
        echo "Les mots de passe de correspondent pas."
      }
      else if($error > 1)
      {
        echo "Vous devez remplir tout les champs pour vous inscrire";
      }
      else
      {
          $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
          $insert = "SELECT * FROM Users";
              $verif = $insert->fetch();
          for ($i=0; $i < $verif; $i++)
          {
              if ($_POST['username'] == $verif[$i])
              {
                echo "Le Pseudo choisi existe deja !";
              }
              else
              {
                $insert = "INSERT INTO Users (username, last_name, first_name, password) VALUES ($_POST['username'], $_POST['lastname'], $_POST['firstname'], $_POST['password']);";
              }
          }

      }
?>
