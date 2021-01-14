<?php

require_once('bdd.php');
session_start();

$boolean = $_GET["bool"];
$sql = 'UPDATE users SET typing = :bool WHERE id=:iduser';
$typing = bdd()->prepare($sql);
$typing->bindValue(':bool', $boolean, PDO::PARAM_STR);
$typing->bindValue(':iduser', $_SESSION['user']['id'], PDO::PARAM_STR);
$typing->execute();
$typing->debugDumpParams();