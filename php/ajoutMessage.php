<?php
require_once('bdd.php');
session_start();

date_default_timezone_set('UTC');
$date =  new DateTime();
$result = $date->format('Y-m-d H:i:s');

//On verifie la méthode du formulaire
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $message = $_GET["message"];
    
    //ON écrit la requête : on insère dans la colonne message de la table message la variable $message
    $sql = 'INSERT INTO message(message, pseudo, date) VALUES (:message, :pseudo, :date);';
    
    //On prépare la requête
    $add = bdd()->prepare($sql);
    //On injecte les valeurs
    $add->bindValue(':message', $message, PDO::PARAM_STR);
    $add->bindValue(':pseudo', $_SESSION['user']['pseudo'], PDO::PARAM_STR);
    $add->bindValue(':date', $result, PDO::PARAM_STR);
    $add->execute();
    $add->debugDumpParams();
}
else{
    http_response_code(405);
    echo 'Désolé mais la méthode du formulaire n\'est pas la bonne';
}




?>