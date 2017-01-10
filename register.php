<?php
require_once('register.html');
session_start();
$error = 0;
if(isset($_POST['sregi']))
  {
      if(empty($_POST['lastname']))
      {
        echo "Veuillez renseigner votre Nom.<br>";
        $error += 1;
      }
      if(empty($_POST['firstname']))
      {
        echo "Veuillez renseigner votre Prenom.<br>";
        $error += 1;
      }
      if(empty($_POST['username']))
      {
        echo "Veuillez renseigner votre Pseudo.<br>";
        $error += 1;
      }
      if(strlen($_POST['username']) > 10)
      {
	echo "Votre Pseudo ne doit pas contenir plus de 10 caracteres<br>";
	$error += 1;
      }
      if(empty($_POST['password']))
      {
        echo "Veuillez renseigner votre Mot de Passe.<br>";
        $error += 1;
      }
      if (strlen($_POST['password']) > 16 && strlen($_POST['password']) < 8)
      {
        echo "Le mot de passe doit comporter entre 8 et 16 caracteres.<br>";
	$error += 1;
      }
      if(empty($_POST['confirmpassword']))
      {
        echo "Veuillez confirmer votre Mot de Passe.<br>";
	$error += 1;
      }
      if($_POST['password'] != $_POST['confirmpassword'])
      {
        echo "Les mots de passe de correspondent pas.<br>";
	$error += 1;
      }
  
if($error == 0)
      {
          $bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
          $result = $bdd->query("SELECT * FROM Users WHERE username = '". $_POST['username'] ."' ;");
          $result = $result->fetchAll();
	  if($result != false)
              {
                echo "Le Pseudo choisi existe deja !";
              }
              else
              {
                $request = $bdd->prepare('INSERT INTO Users(username, last_name, first_name, password) VALUES (?, ?, ?, ?);');
		$request->execute(array($_POST['username'], $_POST['lastname'], $_POST['firstname'], sha1($_POST['password'])));
		echo "Inscription Reussie !";
		header("refresh:2;url=index.php" );
	      }
      }
  }
      echo "</div>";
?>
