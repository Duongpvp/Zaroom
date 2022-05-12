<?php
    session_start();
    include ('././../../includes/config.php');
    $idSelect = $_GET['idRel'];
    echo $idSelect;
    $conn->query("DELETE FROM relation 
    WHERE id = $idSelect");

    header("Location: list_request_relation.php");
    exit;
?>