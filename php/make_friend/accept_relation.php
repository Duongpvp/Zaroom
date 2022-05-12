<?php
    session_start();
    include ('././../../includes/config.php');
    $idSelect = $_GET['idRel'];
    echo $idSelect;
    $conn->query("UPDATE relation SET request = 0
    WHERE id = $idSelect");

    header("Location: list_request_relation.php");
    exit;
?>