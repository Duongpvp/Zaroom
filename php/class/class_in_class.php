<?php
session_start();
include('../../includes/config.php');
if (isset($_GET['idClass'])) {
    $_SESSION['idClass'] = $_GET['idClass'];
    $_SESSION['nameClass'] = $_GET['nameCla'];
}
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='{$_SESSION['SESSION_ID']}'");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $id_user = $row['id'];
    $email = $row['email'];
}
$sql = "SELECT * FROM `relation` WHERE r_to = '$email' AND request = 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo $_SESSION['nameClass']; ?></title>
        <link rel="stylesheet" href="../../chat_dversion/css/style.css" />
        <link rel="stylesheet" href="./style.css" />

        <style>
            .options {
                font-weight: bolder;
                text-align: center;
            }

            .options span {
                padding: 0.5%;
                font-size: 20px;
                border-radius: 10px;
            }

            .options a {
                text-decoration: none;
                color: black;
            }

            .options span:hover {
                background-color: azure;
            }

            img {
                width: 20px;
                height: 20px;
            }

            .file-post a {
                color: black;
            }

            .file-post a:hover {
                color: red;
            }

            .mau {
                color: black;
                text-shadow: 0 0 10px gray;


            }

            .mau-a {
                color: white;
                text-shadow: 0 0 30px white;


            }

        </style>

    </head>
    <div class="class-header" style="margin-bottom:2%;">
        <ul style="display:flex;width:95%">
            <li><button class="button" onclick="window.location='./class.php';"><span style="font-size:20px">Trở về</span></button></li>
            <li id="li"><span class="nameCla"><?php echo $_SESSION['nameClass']; ?> </span> </li>
        </ul>
    </div>
    <div class='options'>
        <a href="./class_in_class.php"><span class="mau" style="text-decoration-line:underline;font-size:30px">Tin tức</span></a>
        <a href="./everyone.php"><span class="mau" style="font-size:30px">Mọi người</span></a>
    </div>

</body>

</html>
<?php
echo "<div class='main'>
     ";
$i = 1;
$result = $conn->query("SELECT * FROM `class`, `ex_class`,`exercise` WHERE ex_class.id_class_r=$_SESSION[idClass] 
            AND exercise.id_ex=ex_class.id_ex_r AND ex_class.id_class_r=class.id_class ORDER BY exercise.id_ex DESC");
echo "<table class='post-table' style='width:100% ;'>
    
            <td id='list' > 
            <h3 id='name-list'><b class='mau' style='font-size:30px'>Danh sách bài tập</b><br></h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
                 <h4><b style='font-size:20px;color:black;'>$i) $row[title_ex]</b></h4>";
    }
}

echo " </td>
            <td style='width:80% ;border-left:solid; border-color: gray;'>
    ";
// echo "<div class='post'>";
$result = $conn->query("SELECT * FROM `class`, `ex_class`,`exercise` WHERE ex_class.id_class_r=$_SESSION[idClass] 
            AND exercise.id_ex=ex_class.id_ex_r AND ex_class.id_class_r=class.id_class ORDER BY exercise.id_ex DESC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='main-post'>
                    <div class='title-post'>
                        <a href='detail_exercise.php?idPost=$row[id_ex]'><h3><b style='font-size:25px;color:black;'>$row[title_ex]</b></h3></a>";
        $x = $row['id_ex'];
        echo "</div>
                    <div class='content-post'>
                       <p style='font-size:20px;color:black'> $row[content_ex] </p>
                    </div>
                    <div class='file-post'>";
        $result1 = $conn->query("SELECT * FROM `exercise`,`file`,`file_exercise` WHERE file.id_file=file_exercise.id_file_exercise AND file_exercise.id_exercise = exercise.id_ex AND file_exercise.id_exercise = $x");
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $typePath = pathinfo($row1['path_file'], PATHINFO_EXTENSION);
                if ($typePath != null) {
                    switch ($typePath) {
                        case "doc":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/doc.png'> $row1[path_file]</a>";
                            break;
                        case "docx":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/doc.png'> $row1[path_file]</a>";
                            break;
                        case "xlsx":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/excel.jpg'> $row1[path_file]</a>";
                            break;
                        case "jpg":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/image.jpg'> $row1[path_file]</a>";
                            break;
                        case "png":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/image.jpg'> $row1[path_file]</a>";
                            break;
                        case "zip":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/zip.jpg'> $row1[path_file]</a>";
                            break;
                        case "rar":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/zip.jpg'> $row1[path_file]</a>";
                            break;
                        case "pdf":
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/pdf.png'> $row1[path_file]</a>";
                            break;
                        default:
                            echo "<a style='padding:0.5%;font-size:18px;color:black' href='view_file.php?filename=$row1[path_file]'><img src='./img/default.png'> $row1[path_file]</a>";
                    }
                }
            }
        }
        echo "</div>
                </div>
            
            ";
    }
    //echo "</div>
    echo "</td>";
    echo "</div></table>";
}
?>