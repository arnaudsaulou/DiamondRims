<?php
// Paramètres de l'application GMP
// A modifier en fonction de la configuration


// Ce fichier doit être renommé en :
//    CONFIG.inc.php
//pour être pris en compte par l'Application

// Leslignes contenant des XXXXX doivent être modifiés

define('DBHOST', "127.0.0.1:3306"); //Adresse du serveur de la base de données
define('DBNAME', "diamondrims");
define('DBUSER', "DiamondRimsAdmin"); //Identifiant d'un utilisateur de la base de données
define('DBPASSWD', "DiamondRimsAdmin"); //Mot de passe de l'utilisateur de la base de données

define('ENV','dev'); // pour un environememnt de production remplacer 'dev' (développement) par 'prod' (production)
define('SALT',"z!#55$~ds"); //Un grain de sel pour le hachage des mots de passe
define('DBPORT',3306); // le port de la base de données

define('__ROOT__', dirname(dirname(__FILE__)));
?>
