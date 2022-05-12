<?php
    session_start();
    include ('../includes/config.php');
    $idClass = $_GET['idClass'];
    echo $idClass;
    
    $conn->query("DELETE FROM post_class 
    WHERE id_class_r=$idClass");
    
    $conn->query("DELETE FROM class_user 
    WHERE id_class = $idClass");

    $conn->query("DELETE FROM class 
    WHERE id_class=$idClass");

    $conn->query("DELETE FROM ex_class 
    WHERE id_class_r=$idClass");


    header('location: ./class-control.php');
    exit();
?>