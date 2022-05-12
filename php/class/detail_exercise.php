
<?php
session_start();
include ('../../includes/config.php');
if(isset($_GET['idPost'])){
$_SESSION['idPost']=$_GET['idPost'];}
// $query="SELECT FROM `submissions` 
// WHERE id_ex_r=$_SESSION[idPost] AND email_sub='$_SESSION[SESSION_EMAIL]'";
// $result=mysqli_query($conn,$query);
// if($result->num_rows >0){
//     }
//     else{$_SESSION['CHECK_UPLOAD']=0;}
$result = $conn->query("SELECT * FROM `class`, `ex_class`,`exercise` WHERE exercise.id_ex=$_SESSION[idPost] 
            AND exercise.id_ex=ex_class.id_ex_r AND ex_class.id_class_r=class.id_class");
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['title_ex'];?></title>
    <link rel="stylesheet" href="../../chat_dversion/css/style.css" />
    <link rel="stylesheet" href="./style.css" />

    <style>
        td{
            border-radius: 7px;
            border-color: gray;
            padding: 2%;
        }
        #d1{
            width: 75%;
            
        }
        .upload{
            width: 100%;
            min-height: 180px;
            box-shadow: 1px 1px 10px 3px gray;
            border-radius: 7px;
            padding: 5% 0 0 0;
            text-align: center;
        }
        .d-title{
            border-bottom: solid;
            color: black;
            font-size: 20px;
        }
        .d-title1{
            text-align: center;
            color: black;
            font-size: 20px;
        }
        .d-title p{
            font-size: 15px;
            font-style: italic;
        }
        #sub{
            text-align: center;
            margin-top: 4%;
        }
        #sub button{
            width: 80%;
            height: 27px;
            background-color: black;
            color: white;
            font-size: 15px;
            font-weight: bold;
            border-radius: 5px;
            text-align: center;
            box-shadow: 1px 1px 10px 3px gray;
        }
        #sub button:hover{
            background-color: whitesmoke;
            color: black;
        }
        .file{
            text-align: center;
            margin: 10% 0;
        }
        .file button{
            width: 80%;
            height: 50px;
            box-shadow: 1px 1px 10px 3px gray;
            font-size: 15px;
            border-radius: 5px;
            border-color: gray;
        }
        .file button:hover{
            background-color: #b7b7b7;
            width: 85%;
            height: 60px;
        }
        #file_temp{
            text-align: center;
            margin-top: 2%;
        }
        .btn-btn[type=file] {
            width: 95%;
            font-size: 12px;
            font-style: italic;
        }

        .btn-btn[type=submit]{
            background-color: #b7b7b7;
            padding: 1%;
            margin: -4% 0 4% 0;
            box-shadow: 1px 1px 10px 3px gray;
            font-size: 15px;
            border-radius: 5px;
        }
        .btn-btn[type=submit]:hover{
            background-color: white;
            padding: 2%;
            box-shadow: 1px 1px 10px 3px gray;
            font-size: 15px;
            border-radius: 5px;
        }
    </style>
    
</head>
<body>
    <div class="class-header">
        <ul style="display:flex;">   
            <li><button class="button" onclick="window.location='./class_in_class.php';"><span>Trở về</span></button></li>
        </ul>
    </div>

    <script>
        function submitex(){
            window.location="./upexer.php";
        }
    </script>
    
</body>
</html>
<?php
    $result = $conn->query("SELECT * FROM `submissions` WHERE id_ex_r=$_SESSION[idPost] AND email_sub = '$_SESSION[SESSION_EMAIL]'");
    $score = 0;
    $num = 0;
    $num_score =0;
     if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){$score=$score+$row['score'];
            $num++;
        }$num_score = $score/$num;}
        

    $result = $conn->query("SELECT * FROM `class`, `ex_class`,`exercise` WHERE exercise.id_ex=$_SESSION[idPost] 
    AND exercise.id_ex=ex_class.id_ex_r AND ex_class.id_class_r=class.id_class");
    echo "<table style='width:98%';><td id='d1'>";
    if($result->num_rows > 0){
        
        while($row=$result->fetch_assoc()){
            echo"
         <div class='d-title'><h4><b>$row[title_ex]<br></b></h4><p>Điểm: $num_score</p></div>
        
        <div class='content-post'>
            $row[content_ex]
        </div>";
    }
     $result = $conn->query("SELECT * FROM `submissions` WHERE id_ex_r=$_SESSION[idPost] AND email_sub = '$_SESSION[SESSION_EMAIL]'");
    $score = 0;
    $num = 0;
         echo "</td><td id='d2'><div class='upload'>
             <div class='d-title1'><h4><b>Bài tập của bạn</b></h4></div>";
     if($result->num_rows > 0){
        $_SESSION['CHECK_UPLOAD']=1;
        while($row=$result->fetch_assoc()){
            echo "<div id='file_temp' style='width: 90%;height: fit-content;padding:1% 3%; font-style:italic; font-size:13px;'><p style='overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100%;'>$row[file_sub]</p></div>";
            $score=$score+$row['score'];
            $num++;
        }
        $num_score = $score/$num;
    }else{$_SESSION['CHECK_UPLOAD']=0;}
    // }else{
    //     echo" <script>
    //                 document.getElementById('file_temp').style.display = 'none';
    //             </script>";
    // }
    if($_SESSION['CHECK_UPLOAD']==1){
        echo' <style>
        #cancle-file{ display:block}
        #up-file{display:none}
    </style>';}
    else{
            echo' <style>
                #cancle-file{ display:none}
                #up-file{display:block}
            </style>';
        }
echo"<div class='file'><form action ='./file-upload.php' id='up-file' method='post' enctype='multipart/form-data'>
    <input type='file' value='ádas' class='btn-btn' name='files[]' multiple><br>
    <input type='submit' class='btn-btn' id='sub' name='submit' value='Nộp bài'>
</form></div>";
echo"<div class='cancle-file'><form action ='./cancle-upload.php' class='btn-btn' id='cancle-file' method='post' enctype='multipart/form-data'>
    <input type='submit' class='btn-btn' id='sub' name='submit' value='Hủy nộp bài'>
</form></div>";
    // echo"<div id='sub' onclick='submitex()'><button>Nộp bài</button>
           echo" </div>";
}
    
?>
