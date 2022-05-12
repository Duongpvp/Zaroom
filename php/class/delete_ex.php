<?php
session_start();
include ('../../includes/config.php');
 $idEx = $_GET['idEx'];
// $query = mysqli_query($conn, "SELECT * FROM ex_class WHERE id_ex_r=$idEx");
// if (mysqli_num_rows($query) > 0) {
//     $row = mysqli_fetch_assoc($query);
//     $idClass = $row['id_class_r'];
// }
$conn->query("DELETE FROM ex_class WHERE id_ex_r=$idEx");

$query = mysqli_query($conn, "SELECT * FROM file_exercise WHERE id_exercise=$idEx");
if (mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_assoc($query)){
        $conn->query("DELETE FROM `file_exercise` WHERE id_file_exercise=$row[id_file_exercise]");
        $conn->query("DELETE FROM `file` WHERE id_file=$row[id_file_exercise]");
        
    }
}

$conn->query("DELETE FROM exercise WHERE id_ex=$idEx");
header("Location: class_in_class_teacher.php");
exit;
?>