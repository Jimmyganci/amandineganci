<?php


try {
    $dns = 'mysql:host=localhost; dbname=amandineganci';
    $utilisateur = 'root';
    $mdp = '';
    // Options de connection
    $options = array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );
   
    // Initialisation de la connection
    $bdd = new PDO( $dns, $utilisateur, $mdp, $options );
}
catch ( Exception $e ) {
    echo "Connection à MySQL impossible : ", $e->getMessage();
    die();
}
?>