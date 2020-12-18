<?php

// On vérifie la méthode utilisée
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On est en GET
    // On vérifie si on a reçu un id
    if(isset($_GET['lastId'])){
        // On récupère l'id et on le nettoie
        $lastId = (int)strip_tags($_GET['lastId']);

        // On se connecte à la base
        require_once('bdd.php');

        // On écrit la requête
        $sql = 'SELECT * FROM message WHERE id > '. $lastId.' ORDER BY id ASC;';

        // On exécute la requête
        $query =  bdd()->query($sql);
        //$query->debugDumpParams();
        // On récupère les données
        $messagesssss = $query->fetchAll();
        

        // On encode en JSON
        $messagesJson = json_encode($messagesssss);

        // On envoie
        echo $messagesJson;
        session_start();
        $idsession = $_SESSION['user']['pseudo'];
        

        // On encode en JSON
        $idsessionJson = json_encode($idsession);




    }
}else{
    // Mauvaise méthode
    http_response_code(405);
    echo json_encode(['message' => 'Mauvaise méthode']);
}