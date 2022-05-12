<?php
session_start();
include('../../includes/config.php');
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../login/index.php");
    die();
}

if (isset($_POST['submit'])) {
    $valuefldr = 'files/';
    $title = $_POST['title-class'];
    echo $title;
    $content = $_POST['content-class'];
    echo $content;
    $time = date("Y-m-d H:i:s");
    $sql = "UPDATE exercise SET title_ex='$title', content_ex='$content' WHERE id_ex=$_SESSION[idEx]";
    mysqli_query($conn, $sql);
    foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['file']['name'][$key];
        $file_size = $_FILES['file']['size'][$key];
        $file_tmp = $_FILES['file']['tmp_name'][$key];
        $file_type = $_FILES['file']['type'][$key];
        $desired_dir = $valuefldr;
        $temp = 0;
        if (move_uploaded_file($file_tmp, "$desired_dir/" . $file_name)) {

            $sql = "INSERT INTO `file` (path_file,`time`) VALUES ('$file_name',NOW())";
            mysqli_query($conn, $sql);
            $file_id = mysqli_insert_id($conn);
            $sql = "INSERT INTO file_exercise (id_exercise,id_file_exercise) VALUES ($_SESSION[idEx],$file_id)";
            mysqli_query($conn, $sql);
            header("Location: ./class_in_class_teacher.php");
        } else {
            header("Location: ./class_in_class_teacher.php");
        }
    }
}header("Location: ./class_in_class_teacher.php");
?>