<?php
require_once('bdd.php');
session_start();


//On verifie la méthode du formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $message = $_GET["message"];
    
    //ON écrit la requête : on insère dans la colonne message de la table message la variable $message
    $sql = 'INSERT INTO message(message, pseudo) VALUES (:message, :pseudo);';
    
    //On prépare la requête
    $add = bdd()->prepare($sql);
    //On injecte les valeurs
    $add->bindValue(':message', $message, PDO::PARAM_STR);
    $add->bindValue(':pseudo', $_SESSION['user']['pseudo'], PDO::PARAM_STR);
    $add->execute();
    $add->debugDumpParams();
}
else{
    http_response_code(405);
    echo 'Désolé mais la méthode du formulaire n\'est pas la bonne';
}




?>