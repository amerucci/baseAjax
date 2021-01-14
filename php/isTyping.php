<?php

require_once('bdd.php');
session_start();


$sql = 'SELECT * FROM users WHERE typing=1';
$typing = bdd()->prepare($sql);
$typing->execute();
//$typing->debugDumpParams();
$whoIsTyping = $typing->fetchAll();
        

        // On encode en JSON
        $whoIsTypingJson = json_encode($whoIsTyping);

        // On envoie
        echo $whoIsTypingJson;