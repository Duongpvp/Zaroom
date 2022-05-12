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
            .thea {
                height: 30px;
                border: 1px solid;
                border-radius: 5px;
                font-size: 15px;
                padding: 2%;
                margin-top: 7%;
                color: black;
                background-color: #E6E6E6;
                width: 80%;
            }

            .div-bt {
                width: 100%;
                height: 50px;
                margin-left: 1%;
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
            }



            .thea:hover {
                border: 3px solid;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                outline-color: rgba(255, 255, 255, 0);
                outline-offset: 15px;
                text-shadow: 1px 1px 2px #427388;
            }

            img {
                width: 20px;
                height: 20px;
            }

            #li {
                text-align: center;
                padding-top: 1%;
                width: 100%;
            }

            #li span {
                font-size: 20px;
                font-weight: bolder;
                color: black;
            }

            .file-post a {
                color: black;
            }

            .namefile:hover {
                color: blue;
            }

            .malop {
                margin-top: 8%;
                font-size: 25px;
                text-align: center;
                border-bottom: 2px solid;
                padding: 2%;
                font-weight: bolder;
                color: black;

            }

            .bt {
                font-size: 20px;
            }

            .code {
                text-shadow: 1px 1px 2px aquamarine;
            }

            .dsbaitap {
                text-shadow: 1px 1px 2px gray;
                font-size: 30px;
            }

            .title {
                color: black;
                font-size: 27px;
            }

            .title1 {
                color: black;
                font-size: 20px;
            }


            .namefile {
                color: black;
                font-size: 15px;
                padding-left: 1%;
            }

            .namefile:hover {
                box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                outline-color: rgba(255, 255, 255, 0);
                outline-offset: 15px;
                color: blue;
                text-shadow: 1px 1px 2px #427388;



            }

            .option {
                width: 25%;
                padding-left: 75%;
                display: flex;
                flex-wrap: wrap;
                flex-direction: row;
                
            }

            .ex:hover {
                /* padding: 1%; */
                font-size: 18px;
                border: 1px solid;
                
                color: black;
                text-decoration: none;

            }
            .edit:hover{
                /* margin: 1%;
                padding: 1%; */
                font-size: 18px;
                border: 1px solid;
                
                color: black;
                text-decoration: none;

            }
            .edit{
                border: 2px solid green;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                outline-color: rgba(255, 255, 255, 0);
                outline-offset: 15px;
                background-color:  green;
                color: #FFFFFF;
                border-radius: 5px;

            }

            .ex {
                border: 2px solid blue;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                outline-color: rgba(255, 255, 255, 0);
                outline-offset: 15px;
                background-color: blue;
                color: #FFFFFF;
                border-radius: 5px;
            }
            .delete:hover{
                /* margin: 1%;
                padding: 1%; */
                font-size: 18px;
                border: 1px solid;
                color: black;
                text-decoration: none;
            }
            .delete {
                border: 2px solid red;
                box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
                outline-color: rgba(255, 255, 255, 0);
                outline-offset: 15px;
                background-color: red;
                color: #FFFFFF;
                border-radius: 5px;
            }

           
        </style>
    </head>
    <div class="class-header">
        <ul style="display:flex;width:90%">
            <li><button class="button" onclick="window.location='./class_teacher.php';"><span style="font-size:20px">Trở về</span></button></li>
            <li id="li"><span class="nameCla"><?php echo $_SESSION['nameClass']; ?> </span> </li>
        </ul>
    </div>
    <div class='div-bt'>
        <div style="width:20%; margin:1% 1%"><a class="thea" href="./post.php"><span class="bt">+Thêm bài tập</span></a></div>
        <div style="width:15%;margin-top:0%;margin-left: 30%;">
            <?php
            $sql = "SELECT code FROM class where id_class = $_SESSION[idClass] ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
                while ($row = $result->fetch_assoc()) {
                    echo '<h1 class="malop"> Mã lớp: ' . '<span class="code">' . $row['code'] . '</span>' . '<h1>';
                }
            ?>
        </div>

    </div>
</body>

</html>
<?php
echo "<div class='main'>
     ";
$i = 1;
$result = $conn->query("SELECT * FROM `class`, `ex_class`,`exercise` WHERE ex_class.id_class_r=$_SESSION[idClass] 
            AND exercise.id_ex=ex_class.id_ex_r AND ex_class.id_class_r=class.id_class ORDER BY exercise.id_ex DESC");
echo "<table class='post-table' style='width:100%;'>
    
            <td id='list' style='width:20%'> 
            <h3 id='name-list'><b class='dsbaitap'>Danh sách bài tập</b><br></h3>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
                 <h4><b class='title1'>$i) $row[title_ex]</b></h4>";
        $i++;
    }
}

echo " </td>
            <td style='width:65% ;border-left:solid; border-color: gray;'>
    ";
// echo "<div class='post'>";
$result = $conn->query("SELECT * FROM `class`, `ex_class`,`exercise` WHERE ex_class.id_class_r=$_SESSION[idClass] 
            AND exercise.id_ex=ex_class.id_ex_r AND ex_class.id_class_r=class.id_class ORDER BY exercise.id_ex DESC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='main-post' >
                    <div class='title-post'>
                        <h3><b class='title'>$row[title_ex]</b></h3> ";
        $x = $row['id_ex'];
        echo "  </div>
                      
                    <div class='content-post'>
                    <div class='option'>
                <div><a class='edit'href='./edit_ex.php?idEx=$row[id_ex]'> Sửa </a></div>
                <div><a class='ex' href='./grade.php?idEx=$row[id_ex]'> Chấm điểm </a> </div>
                <div><a class='delete' href='./delete_ex.php?idEx=$row[id_ex]'>Xoá</a> </div>
            </div> 
                        $row[content_ex]
                    </div>
                    
                    <div class='file-post'>";
        $result1 = $conn->query("SELECT * FROM `exercise`,`file`,`file_exercise` WHERE file.id_file=file_exercise.id_file_exercise AND file_exercise.id_exercise = exercise.id_ex AND file_exercise.id_exercise = $x");
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $typePath = pathinfo($row1['path_file'], PATHINFO_EXTENSION);
                if ($typePath != null) {
                    switch ($typePath) {
                        case "doc":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/doc.png'> $row1[path_file]</a>";
                            break;
                        case "docx":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/doc.png'> $row1[path_file]</a>";
                            break;
                        case "xlsx":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/excel.jpg'> $row1[path_file]</a>";
                            break;
                        case "jpg":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/image.jpg'> $row1[path_file]</a>";
                            break;
                        case "png":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/image.jpg'> $row1[path_file]</a>";
                            break;
                        case "zip":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/zip.jpg'> $row1[path_file]</a>";
                            break;
                        case "rar":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/zip.jpg'> $row1[path_file]</a>";
                            break;
                        case "pdf":
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/pdf.png'> $row1[path_file]</a>";
                            break;
                        default:
                            echo "<a class='namefile' href='view_file.php?filename=$row1[path_file]'><img src='./img/default.png'> $row1[path_file]</a>";
                    }
                } else {
                    break;
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