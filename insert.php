<?php
/* SCript de connexion à un SGBD 
et insertion des variable d'environnement en basse

@author Sebastien POUSSE <spousse@pagesjaunes.fr>
@version 0.1
*/


//Recuperation des variables d'environnement a conserver

$ISO_DATETIME = $argv[1];


//Connexion à la base
$user = 'root';
$password = 'root';
$db = 'bitrise';
$socket = 'localhost:/Applications/MAMP/tmp/mysql/mysql.sock';

if(!$link = mysql_connect($socket, $user, $password))
    die("Erreur connexion au serveur");

if(!$db_selected = mysql_select_db($db, $link))
    die("Erreur de connexion à la DB");

//Arrivé ici la connexion à la DB est ok on procede à l'insertion
$query = "INSERT INTO test_int VALUES ('','','$ISO_DATETIME')";

if(! mysql_query($query))
    die("Erreur a l insertion");

mysql_close(); //on ferme la socket


?>