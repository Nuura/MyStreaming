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
$create = "CREATE TABLE Films (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Titre VARCHAR(100), Realisateur VARCHAR(50), Categories VARCHAR(30), Relyear DATE) ENGINE=InnoDB;
        CREATE TABLE Series (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Titre VARCHAR(100), Realisateur VARCHAR(50), Categories VARCHAR(30), maincharac VARCHAR(50), Relyear DATE) ENGINE=InnoDB;
        CREATE TABLE Users (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30), last_name VARCHAR(30), first_name VARCHAR(30), sex TINYINT, password VARCHAR(16)) ENGINE=InnoDB;
        CREATE TABLE Comment (ID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, Comment VARCHAR(200), Notes TINYINT UNSIGNED) ENGINE=InnoDB;
        INSERT INTO Users (username, last_name, first_name, sex, password) VALUES ('Nuura', 'Frost', 'Pierre', '1', 'sonyxx78');
        
        INSERT INTO Series (Titre, Realisateur, Categories, maincharac, Relyear) VALUES ('Black Mirror', 'Charlie Brooker', 'Science-Ficton', 'No Main Character', '2011-12-04'), ('Breaking Bad', 'Vince Gilligan', 'Thriller', 'Bryan Cranston, Aaron Paul', '2011-01-20');";
$bdd->exec($create);
//$bdd->exec($insert);

?>
