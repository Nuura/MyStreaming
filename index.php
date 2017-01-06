<?php

$host = "localhost";
$root = "root";
$password = "root";
$db = "Streaming";

try {
        $bdd = new PDO("mysql:host=$host", $root, $password);
        $bdd->exec("DROP DATABASE IF EXISTS Streaming;
        CREATE DATABASE $db;");
    }
catch(PDOException $e)
{
    die("DB ERROR: ". $e->getMessage());

}
$bdd = new PDO('mysql:host=localhost;dbname=Streaming;charset=utf8', 'root', 'root');
$create = "CREATE TABLE Films (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Titre VARCHAR(100), Synopsis VARCHAR(1000), Realisateur VARCHAR(50), Categories VARCHAR(30), Relyear DATE) ENGINE=InnoDB;
        CREATE TABLE Series (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Titre VARCHAR(100), Synopsis VARCHAR(1000), Realisateur VARCHAR(50), Categories VARCHAR(30), maincharac VARCHAR(50), Relyear DATE) ENGINE=InnoDB;
        CREATE TABLE Users (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30), last_name VARCHAR(30), first_name VARCHAR(30), sex TINYINT, password VARCHAR(16)) ENGINE=InnoDB;
        CREATE TABLE Comment (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Movie_ID TINYINT UNSIGNED , Comment VARCHAR(200), Notes TINYINT UNSIGNED) ENGINE=InnoDB;
        INSERT INTO Users (username, last_name, first_name, sex, password) VALUES ('Nuura', 'Frost', 'Pierre', '1', 'sonyxx78'), ('enikart', 'Cadinot', 'Kevin', '1', 'saucisson78');  
        INSERT INTO Series (Titre, Synopsis, Realisateur, Categories, maincharac, Relyear) VALUES ('Black Mirror', 'Black Mirror est une anthologie télévisée britannique, créée par Charlie Brooker. D’abord diffusée sur Channel 4 de 2011 à 2014, elle a connu un succès international et sa troisième saison est produite par Netflix en 2016.', 'Charlie Brooker', 'Science-Ficton', 'No Main Character', '2011-12-04'), ('Breaking Bad', 'Breaking Bad ou Breaking Bad : Le Chimiste au Québec est une série télévisée américaine en 62 épisodes de 47 minutes, créée par Vince Gilligan, diffusée simultanément du 20 janvier 2008 au 29 septembre 2013 sur AMC', 'Vince Gilligan', 'Thriller', 'Bryan Cranston, Aaron Paul', '2011-01-20');
        INSERT INTO Films (Titre, Synopsis, Realisateur, Categories, Relyear) VALUES ('Insaisissable',  'Insaisissables est un film policier franco-américain de Louis Leterrier, sorti en 2013.', 'Louis Leterrier', 'Thriller', '2013-09-03'), ('Les Animaux Fantastiques', 'Les Animaux fantastiques est un film fantastique américano-britannique réalisé par David Yates, sorti en novembre 2016 au cinéma. Il s agit d une série dérivée de la saga Harry Potter qui sera suivie par quatre autres films. J. K.', 'David Yates', 'Fantastique', '2016-11-16');
        INSERT INTO Comment (Movie_ID, Comment, Notes) VALUES ('1', 'Tres bon film', '20');
        ";
$bdd->exec($create);
//$bdd->exec($insert);

?>