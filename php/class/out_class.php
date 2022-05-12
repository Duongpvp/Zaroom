<?php
    session_start();
    include ('../../includes/config.php');
    $idClass = $_GET['idCla'];
    $idUser = $_GET['idUser'];
    #echo $idClass;
    #echo $idUser;

    $conn->query("DELETE FROM ex_class WHERE id_class_r = $idClass");

    $conn->query("DELETE FROM class_user WHERE id_user = $idUser AND id_class=$idClass");

    header("Location: class.php");
    exit;
?>