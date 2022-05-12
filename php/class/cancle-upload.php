<?php
session_start();
include ('../../includes/config.php');
$query="SELECT * FROM `submissions` 
WHERE id_ex_r=$_SESSION[idPost] AND email_sub='$_SESSION[SESSION_EMAIL]'";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        // echo $row['file_sub'];
        unlink("./files/".$row['file_sub']);
    }
}
$query="DELETE FROM `submissions` 
WHERE id_ex_r=$_SESSION[idPost] AND email_sub='$_SESSION[SESSION_EMAIL]'";
$result=mysqli_query($conn,$query);

$_SESSION['CHECK_UPLOAD']=0;	
header("location:./detail_exercise.php");
exit();
?>