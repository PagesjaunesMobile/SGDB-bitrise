<?php
/* Script to insert data into a distant database.
Database support : MYSQL
Comming soon : POSTGRES etc...

@author Sebastien POUSSE <spousse@pagesjaunes.fr>
@version 0.3

CREATE TABLE `bitrise_deploy` (
  `Id` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `BundleVersion` varchar(6) NOT NULL,
  `BundleBuild` varchar(12) NOT NULL,
  `GitBranch` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/


//Getting all env cariables to save
$SGBD_DB_TARGET = $argv[1]; //get DB TARGET type
$PJ_BUNDLE_VERSION = $argv[2]; //bundle version
$PJ_BUNDLE_BUILD_NUMBER = $argv[3]; //get the build number
$BITRISE_GIT_BRANCH = $argv[4]; //bitrise git branch

$table_name = "bitrise_deploy";

//prepared query
$query = "INSERT INTO $table_name VALUES ('',CURRENT_TIMESTAMP,'$PJ_BUNDLE_VERSION','$PJ_BUNDLE_BUILD_NUMBER','$BITRISE_GIT_BRANCH')";

//Take the good DB adapter
if($SGBD_DB_TARGET == "MYSQL") {
 //Database connexion
 $user = 'spousse';
 $password = '';
 $db = 'spousse';
 
 $url = "";
 
 if(!$link = mysql_connect($url, $user, $password))
     die("[!] Problem to connect to database");

 if(!$db_selected = mysql_select_db($db, $link))
     die("  [!] Problem to select database");

 if(! mysql_query($query))
    die("   [!] Problem to insert query");

 mysql_close();
} else { 
    echo "Warning : You don't have choose a database system in your step.yml";   
}//endif


?>