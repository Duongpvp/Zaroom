<?php
session_start();
include ('../../includes/config.php');
if(isset($_POST['submit'])){
    $idSub=$_POST['id'];
    $score=$_POST['score'];
    echo $score;
    echo $idSub;
     $sql = "UPDATE submissions SET score=$score WHERE id_sub=$idSub";
     mysqli_query($conn, $sql);
     header("Location: ./grade.php");
}  
?>