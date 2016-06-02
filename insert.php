<?php
/* Script to insert data into a distant database.
Database support : MYSQL
Comming soon : POSTGRES etc...

@author Sebastien POUSSE <spousse@pagesjaunes.fr>
@version 0.2
*/


//Getting all env cariables to save
$SGBD_DB_TARGET - $argv[2]; //get DB TARGET type
$ISO_DATETIME = $argv[3];


//prepared query
$query = "INSERT INTO test_int VALUES ('','','$ISO_DATETIME')";

//Take the good DB adapter
if($SGBD_DB_TARGET == "MYSQL") {
 //Database connexion
 $user = 'root';
 $password = 'root';
 $db = 'bitrise';
 $socket = 'localhost:/Applications/MAMP/tmp/mysql/mysql.sock';

 if(!$link = mysql_connect($socket, $user, $password))
     die("[!] Problem to connect to database");

 if(!$db_selected = mysql_select_db($db, $link))
     die("  [!] Problem to select database");

 if(! mysql_query($query))
    die("   [!] Problem to insert query");

 mysql_close();
} //endif


?>