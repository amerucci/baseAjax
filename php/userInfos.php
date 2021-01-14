<?php
    session_start();
    $id_user = $_SESSION['user']['id'];
    require_once('bdd.php');
    $sql = 'SELECT * FROM users WHERE id = :iduser';
    $infos = bdd()->prepare($sql);
    $infos->bindValue(':iduser', $id_user, PDO::PARAM_STR);
    $infos->execute();
    $infosGetted = $infos->fetch();
    $infosJson = json_encode($infosGetted);

    // On envoie
    echo $infosJson;

?>