<?php
session_start();
include ('../../includes/config.php');
 $idFile = $_GET['idFile'];
 echo $idFile;
 $conn->query("DELETE FROM file_exercise WHERE id_file_exercise=$idFile");
 $conn->query("DELETE FROM `file` WHERE id_file=$idFile");
 header("Location: edit_ex.php");
exit;
?>