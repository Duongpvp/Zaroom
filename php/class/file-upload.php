<?php	
    session_start();
    include ('../../includes/config.php');
    if(isset($_POST['submit'])){
    $valuefldr = './files/';
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
	$file_name = $_FILES['files']['name'][$key];
	$file_size =$_FILES['files']['size'][$key];
	$file_tmp =$_FILES['files']['tmp_name'][$key];
	$file_type=$_FILES['files']['type'][$key];	
       $desired_dir= $valuefldr;
	if(move_uploaded_file($file_tmp,"$desired_dir/".$file_name))
	{
			$query="insert into submissions (file_sub,email_sub,date_sub,id_ex_r) VALUES('$file_name','$_SESSION[SESSION_EMAIL]',NOW(),$_SESSION[idPost])";
			$result=mysqli_query($conn,$query);
            
	 }
	 else
	 {
            echo "Some thing wrong";
	 }
     
	  }	
  }	  
  $_SESSION['CHECK_UPLOAD']=1;	
  header("location:./detail_exercise.php");
  exit();
?>