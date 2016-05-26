<?php
/* SCript de connexion à un SGBD 
et insertion des variable d'environnement en basse

@author Sebastien POUSSE <spousse@pagesjaunes.fr>
@version 0.1
*/

$servername = "ip_of_remote_server";
$username = "username";
$password = "password";
$database - "birirse";

$mysqli = new mysqli($servername, $username, $password, $database, 3306);

//on tente de se connecter à la base
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//si la connexion est bonne on fait l'insertion
if (!$mysqli->query("INSERT INTO test(id) VALUES (1), (2), (3)")) {
    echo "Echec lors de l'insertion : (" . $mysqli->errno . ") " . $mysqli->error;
}

?>