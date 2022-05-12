<?php
    session_start();
    include ('../includes/config.php');
    $idClass = $_GET['idCl'];
    $idUser = $_GET['idUser'];
    $conn->query("DELETE FROM class_user 
    WHERE id_user = $idUser AND id_class=$idClass");
    header('location: ./show-class.php');
    exit();
?>